<?php
$title = "Story Mosaic";
include 'common/config.php';
include 'common/header.php';
include 'common/functions.php';
$dialogs = $_GET['dialogs'];
$descriptions = $_GET['descriptions'];
if ($dialogs=="no"&&$descriptions=="no") {
	$page_break=8;
	$style="margin: 10px;";
} else if (($dialogs=="yes"&&$descriptions=="no")||($dialogs=="no"&&$descriptions=="yes")) {
	$page_break=6;
	$style="margin: 5px 10px;";
	$dialog_style = "height: 100px;";
} else if ($dialogs=="yes"&&$descriptions=="yes") {
	$page_break=4;
	$style = "margin: 10px 10px;";
	$dialog_style="height: 120px;";
}
$sql = "SELECT * FROM `story_images` WHERE `sort_order`!='9999' ORDER BY sort_order ASC";
$result = mysql_query($sql);
$count = mysql_num_rows($result);
$total_pages = $count/6;
$project = "Proyecto Mercator";
$today = date('m\/d\/Y');
$page_header = "<div id='story_project_header'>
	Project: <b>{$project}</b> - 
	Date: <b>{$today}</b></div>";
?>
<body>
	<ul id="myList" class="myList">
<?php
	$j = 1;
	$page = "1";
	$h = "1";
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$id = $row['id'];
		$name = $row['name'];
		$description = nl2br($row['description']);
		$source_name = $row['source_name'];
		$project = $row['project'];
		$scene = $row['scene'];
		$shot = $row['shot'];
		$dialog = nl2br($row['dialog']);
		$sort_order = $row['sort_order'];
		$basedir = "upload/storyboard/";
		$md5 = md5($source_name);
		$project_dir = strtolower($project);
		$project_dir = str_replace(" ", "_", $project_dir);
		$project_dir = $basedir.$project_dir."/";
		$path1 = $project_dir.substr($md5, 0, 1)."/";
		$path2 = $path1.substr($md5, 0, 2)."/";
		$img = $path2.$name;
?>
		<li id="item_<? echo $id; ?>" style="<? echo $style; ?>">
			<img src="<? echo $img; ?>" />
			<p>
<? 
			echo "Scene: <b>{$scene}</b> - Shot: <b>{$shot}</b>";
?>
			</p>
			<span class="dialog" id="dialog_<? echo $j; ?>" style="display: <? if($dialogs=="no") { echo "none"; } else { echo "block"; } ?>; <? echo $dialog_style; ?>">
				<? echo $dialog; ?>
			</span>
			<span class="description" id="description_<? echo $j; ?>" style="display: <? if($descriptions=="no") { echo "none"; } else { echo "block"; } ?>;<? echo $dialog_style; ?>">
				<? echo $description; ?>
			</span>
		</li>
<?
		if($page==$page_break) {
			echo "<DIV style='page-break-after:always'></DIV>";
			$page=0;
		}
		$page++;
		$j++;
	}
?>
	</ul>
<?
include 'common/footer.php';
?>
