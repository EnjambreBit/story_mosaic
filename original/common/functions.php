<?php
function today() {
	date('m\/d\/Y');
}
// Parser functions

/**
 *
 * @get text between tags
 *
 * @param string $tag The tag name
 *
 * @param string $html The XML or XHTML string
 *
 * @param int $strict Whether to use strict mode
 *
 * @return array
 *
 */
function getTextBetweenTags($tag, $html)
{
    /*** a new dom object ***/
    $dom = new domDocument;
    @$dom->loadHTML($html);


    /*** discard white space ***/
    $dom->preserveWhiteSpace = false;

    /*** the tag by its tag name ***/
    $content = $dom->getElementsByTagname($tag);

    /*** the array to return ***/
    $out = array();
    foreach ($content as $item)
    {
        /*** add node value to the out array ***/
        $out[] = $item->nodeValue;
    }
    /*** return the results ***/
    return $out;
}

// Debug & Cleaning
function thumbnailer($id) {
	$sql = "SELECT * FROM `referencias` WHERE `id`='$id' LIMIT 1";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$shaname = $row['shaname'];
	$tmp_path = "upload/tmp/";
	$path = "upload/references/";
	$img = $path.$shaname;
	$size = getimagesize($img);
	$mime = ltrim(substr($size['mime'], -4),"/");
	if (!$mime) {
		echo "<b>Is not an image, erasing</b><br>";
		exec("rm $img");
	} else {
		$width = $size['0'];
		$height = $size['1'];
		$t_path = "upload/references/thumbs/";
		$t_width = 200;
		$aspect = $width / $height;
		$t_height = round($t_width / $aspect);
		$t_name = $t_path."t_".$shaname;
		$params = "";
		$thumb = "convert -thumbnail ".$t_width."x".$t_height." ".$img." ".$t_name;
		if (!file_exists($t_name)) {
			echo "{$mime} - <b>NO EXISTE</b> Creando thumb...<br>";
			exec ($thumb);
		} else {
			echo "{$mime} - el thumbnail ya existe, skipping<br>";
		}
	}
}

function debug_clean_tags() {
	$sql = "SELECT * FROM `tags`";
	$result = mysql_query($sql) or die("colgueti");
	$total_tags = mysql_num_rows($result);
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$t_id = $row['id'];
		$tag = $row['tag'];
		$t_count = $row['count'];
		$sql2 = "SELECT * FROM `referencias` WHERE `tags` LIKE '%$tag%'";
		$result2 = mysql_query($sql2) or die("se murio");
		$count = mysql_num_rows($result2); // Contamos las que estan en uso en referencias
		if ($t_count !=$count) { // Si el count de los tags no es igual al conteo de referencias en uso, lo igualamos
			$t_count = $count;
			$update = "UPDATE `tags` SET `count`='$t_count' WHERE `id`='$t_id' LIMIT 1";
			mysql_query($update) or die("Fallo el update");
			echo " <b><font color='#FFFF00'>tags cleaned...</font></b>";
		}
	}
}
// Gets tags and count number from the tags database
function tag_info() {
	$result = mysql_query("SELECT * FROM tags GROUP BY tag ORDER BY count DESC");
	while($row = mysql_fetch_array($result)) {
		$arr[$row['tag']] = $row['count'];
	}
	ksort($arr);
	return $arr;
}

// Generates the tag cloud
function tag_cloud() { 
	$min_size = 12;
	$max_size = 30;
	
	$min_col = 50;
	$max_col = 255;
	
	$tags = tag_info();
	$minimum_count = min(array_values($tags));
	$maximum_count = max(array_values($tags));
	$spread = $maximum_count - $minimum_count;
	if($spread == 0) {
		$spread = 1;
	}
	$cloud_html = '';
	$cloud_tags = array();
	foreach ($tags as $tag => $count) {
		if ($count != "0") {
			$size = $min_size + ($count - $minimum_count) * ($max_size - $min_size) / $spread;
			$colsize = floor($min_col + ($count - $minimum_count) * ($max_col - $min_col) / $spread);
			$red = $colsize;
			
			$color = "rgb({$red},{$red},0)";
			
			/*
			if (($size >= "12") && ($size <= "14")) {
				$color = "rgb({$red},{$red},0)";
			} else if (($size >= "14") && ($size <= "18")) {
				$color = "rgb(0,{$red},0)";
			} else if ($size == "30") {
				$color = "rgb(0,255,0)";
			}
*/
			$cloud_tags[] = '<a style="text-align: justify; color: '.$color.'; font-size: '. floor($size) . 'px'. '" class="tag_cloud" href="search_references.php?s=' . $tag. '" title="\'' . $tag . '\' returned a count of ' . $count . ' - size: '.floor($size).' - Colsize: '.$colsize.'">'
. htmlspecialchars(stripslashes($tag)) . '</a>';
		}
	}
	$cloud_html = join("\n", $cloud_tags) . "\n";
	return $cloud_html;
}

// Converts special characters to HTML code
function quitar($mensaje) { 
	$mensaje = str_replace("<","&lt;",$mensaje);
	$mensaje = str_replace(">","&gt;",$mensaje);
	$mensaje = str_replace("\'","'",$mensaje);
	$mensaje = str_replace('\"',"&quot;",$mensaje);
	$mensaje = str_replace("\\\\","\\",$mensaje);
	return $mensaje;
}

// Get status text from status id
function status2name($id) {
	if ($id=="") {
		$status_name = "All";
	} else	if ($id=="0") {
		$status_name = "Completed";
	} else if ($id=="1") {
		$status_name = "Unfinished";
	} 
	return $status_name;
}

// Gets the username from the id
function get_username_from_id($id)  {
	$result = mysql_query("SELECT `username` FROM `users` WHERE `id`='{$id}' LIMIT 1");
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	$username = $row['username'];
	return $username;
}

function todo_summary($id) {
	$result_total = mysql_query("SELECT * FROM `todo` WHERE `recipient`='$id'") or die("Failed trying to retrieve to-do list for user {$id}");;
	$result_incomplete = mysql_query("SELECT * FROM `todo` WHERE `recipient`='$id' AND `status`='1'") or die("Failed trying to retrieve to-do list for user {$id}");;
	$total = mysql_num_rows($result_total);
	$incomplete = mysql_num_rows($result_incomplete);
	if (!$total) {
		echo "<b><font color='#00FF00'>You have no tasks at all, you lucky bastard!</font></b>";
	} else {
		echo "You have <b><font color='#FFFF00'>{$incomplete}</font></b> <a href='view_todo.php?status=1'>unfinished</a> tasks from a total of <b><font color='#FFFF00'>{$total}</font></b>";
	}
}

// Get category name from id
function catid2name($id) {
	$result = mysql_query("SELECT * FROM `todo_cats` WHERE `id`='$id' LIMIT 1") or die("Error trying to retrieve cat_name");
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	$category = $row['cat_name'];
	return $category;
}

// Creates dropdown menu with todo categories
function select_todo_cat() {
	echo "<option value='0' selected>------</option>";
	$sql = "SELECT * from `todo_cats` ORDER BY `cat_name` ASC";
	$result = mysql_query($sql);
	$counter = mysql_num_rows($result);
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$id = $row['id'];
		$category = $row['cat_name'];
		echo "<option value='{$id}'>{$category}</option>";
	}
}

// Creates dropdown menu with the users
function select_recipient($recipient_id) {
	$sql = "SELECT * from `users` ORDER BY `username` ASC";
	$result = mysql_query($sql);
	$counter = mysql_num_rows($result);
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$id = $row['id'];
		if ($id == $recipient_id) {
			$selected = "selected";
		} else {
			$selected ="";
		}
		$username = $row['username'];
		echo "<option value='{$id}' {$selected}>{$username}</option>";
	}
}

// Displays floating notes_body
function display_notes($idUserL) {
	$sql = "SELECT * FROM `notes` WHERE `active`='1' AND `target_id`='$idUserL'";
	echo "<br><br>{$sql}<br>";
	$result = mysql_query($sql);
	$counter = mysql_num_rows($result);
	$today = date("m\/d\/Y");
	$now = date("H:i");
	//$today = "08/21/2008";
	//$now = "20:30";
	echo "<div width='100%' align='center'><div id='notes'>";
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$id = $row['id'];
		$creator_id = $row['creator_id'];
		$target_id = $row['target_id'];
		$date = $row['date'];
		$time = $row['time'];
		$repeat_day = $row['repeat_day'];
		$repeat_hour = $row['repeat_hour'];
		$notes = $row['notes'];
		if ($repeat_day==0 && $repeat_hour==0) { // Don't repeat Daily nor Hourly
			$note_case=1;
		} else if ($repeat_day==0 && $repeat_hour==1) { // Don't repeat Daily, but repeat every hour
			$note_case=2;
		} else if ($repeat_day==1 && $repeat_hour==0) { // Repeat Daily, but not every hour
			$note_case=3;
		} else if ($repeat_day==1 && $repeat_hour==1) { // Repeat Daily, every hour
			$note_case=4;
		}
		// Case 1
		switch ($note_case) {
			case "1":
			if ($date==$today && $time==$now) {
					$show_note = "{$date} - {$time}<br>{$notes}<br><hr>";
				} else {
					$show_note ="";
			}
				break;
			case "2":
				break;
			case "3":
				break;
			case "4":
				if ($date==$today && $time==$now) {
					$show_note = "{$date} - {$time}<br>{$notes}<br><hr>";
				} else {
					$show_note ="";
				}
				break;
		}
		echo $show_note;
	}
	echo "</div></div>";
}
?>