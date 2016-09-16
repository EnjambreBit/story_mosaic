<?php
//$ip = "192.168.2.115";
$title = "Story Mosaic";
include 'common/config.php';
include 'common/header.php';

	$max = 9999; //amount of articles per page. change to what to want
	$p = $_GET['p'];
	if(empty($p)) {
		$p = 1;
	}
	$limits = ($p - 1) * $max; 

	// Query
$sql = "SELECT * FROM `story_images` WHERE `sort_order`!='9999' ORDER BY sort_order ASC";
	
	$total_sql = mysql_query($sql);
	$totalres = mysql_num_rows($total_sql);

//the total number of pages (calculated result), math stuff...
	$totalpages = ceil($totalres / $max); 
	$result = mysql_query("SELECT * FROM `story_images` WHERE `sort_order`!='9999' ORDER BY sort_order ASC LIMIT $limits,$max");
	

$sql0 = "SELECT * FROM `story_images` WHERE `sort_order`='9999'";
$result_total = mysql_query("SELECT * FROM `story_images`");

$result0 = mysql_query($sql0);
$total = mysql_num_rows($result_total);
$count = mysql_num_rows($result);
$count0 = mysql_num_rows($result0);
$total_pages = $count/6;

?>
<div id="wrapper">
	<br>
<?
/*
	echo "<div id='pagination'>";
	if ($p!=1) {
		$l=$p-1;
		echo "<a href='story_mosaic.php?p=$l'>Anterior </a>| ";
	} else {
		echo "<font style='color: rgb(120,120,200);'>Anterior</font>| ";
	}
	for($i = 1; $i <= $totalpages; $i++){ 
		//this is the pagination link
		if ($i == $p) {
			$color = "color: rgb(255,255,255);";
		} else {
			$color = "color: rgb(0,0,0);";
		}
		echo "<a href='story_mosaic.php?p=$i'><font style='{$color}'> [$i] </font></a>";
	}
	if ($p!=$totalpages) {
		$l=$p+1;
		echo " |<a href='story_mosaic.php?p=$l'> Siguiente</a>";
	} else {
		echo " |<font style='color: rgb(120,120,200);'> Siguiente</font> ";
	}
	echo "</div>";
*/
?>
	<form method="POST" action="story_sort.php">
		<div id="story_menu">
			<p>
			Total stills: <b><? echo $total; ?></b> - 
			Used: <b><? echo $count; ?></b> - 
			Dialogs: <a id="switch_dialogs" href="#" onclick="javascript: displayDialogs();">Off</a> - 
			Descriptions: <a id="switch_descriptions" href="#" onclick="javascript: displayDescriptions();">Off</a> - 
			<input class="mini_button" type="submit" id="submit" value="Save" /> 
			</p>
			<span id="printable" class="printable">
				Printables: 
				<a href="story_mosaic_print.php?printable=yes&dialogs=no&descriptions=no" target="_blank">Stills Only</a> |
				<a href="story_mosaic_print.php?printable=yes&dialogs=yes&descriptions=no" target="_blank">Stills w/Dialogs</a> |
				<a href="story_mosaic_print.php?printable=yes&&dialogs=no&descriptions=yes" target="_blank">Stills w/Descriptions</a> |
				<a href="story_mosaic_print.php?printable=yes&dialogs=yes&descriptions=yes" target="_blank">Complete</a>
			</span>
		</div>
		<div id="group0" class="section0" style="z-index: 1000;">
			<h3 class="handleBin">
				Bin | 
				<small>Stills on bin: <b id="on_bin"><? echo $count0; ?></b></small>
			</h3>
			<ul id="myBin" class="myBin">
<?php
				$a = 1;
				while ($row0 = mysql_fetch_array($result0, MYSQL_ASSOC)) {
					$id = $row0['id'];
					$name = $row0['name'];
					$description = nl2br($row0['description']);
					$source_name = $row0['source_name'];
					$project = $row0['project'];
					$scene = $row0['scene'];
					$shot = $row0['shot'];
					$dialog = nl2br($row0['dialog']);
					$sort_order = $row0['sort_order'];
					$basedir = "upload/storyboard/";
					$md5 = md5($source_name);
					$project_dir = strtolower($project);
					$project_dir = str_replace(" ", "_", $project_dir);
					$project_dir = $basedir.$project_dir."/";
					$path1 = $project_dir.substr($md5, 0, 1)."/";
					$path2 = $path1.substr($md5, 0, 2)."/";
					$img = $path2.$name;
?>
					<li id="item_<? echo $id; ?>">
						<img src="<? echo $img; ?>" />
						<p>
							Scene: <b id='scene_edit'><? echo $scene; ?></b> - 
							Shot: <b id='shot_edit'><? echo $shot; ?></b> - 
							<a href="story_edit_still.php?id=<? echo $id; ?>">Edit</a>
						</p>
						<span class="dialog" id="dialog_<? echo $j; ?>" style="display: none;">
							<? echo $dialog; ?>
						</span>
						<span class="description" id="description_<? echo $j; ?>" style="display: none;">
							<? echo $description; ?>
						</span>
					</li>
<?
					$a++;
				}
?>
			</ul>
		</div>

		<div id="listNewOrder" style="display: none;"></div>

		<div id="page">
			<ul id="myList" class="myList">
<?php
				$j = 1;
				$page = "1";
				while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
					$id = $row['id'];
					$name = $row['name'];
					$description = nl2br($row['description']);
					$source_name = $row['source_name'];
					$project = $row['project'];
					$scene = $row['scene'];
					if ($scene=="") { $scene="NA"; } else { $scene=$scene; }
					$shot = $row['shot'];
					if($shot=="") { $shot="NA"; } else { $shot=$shot; }
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
					<li id="item_<? echo $id; ?>">
						<img src="<? echo $img; ?>" />
						<p>
							Scene: <b id='scene_edit_<? echo $j; ?>'><? echo $scene; ?></b> - 							<script>
								new Ajax.InPlaceEditor($('scene_edit_<? echo $j; ?>'),
								'story_ajax_editor.php?id=<? echo $id; ?>&type=scene', {
									submitOnBlur: true, 
									okButton: true, 
									cancelLink: true,
									formId: 'scene_edit_<? echo $j; ?>',
									okText: 'Ok',
									cancelText: 'Cancel'
								});
							</script>
							Shot: <b id='shot_edit_<? echo $j; ?>'><? echo $shot; ?></b> 
							<script>
								new Ajax.InPlaceEditor($('shot_edit_<? echo $j; ?>'),
								'story_ajax_editor.php?id=<? echo $id; ?>&type=shot', {
									submitOnBlur: true, 
									okButton: true, 
									cancelLink: true,
									formId: 'shot_edit_<? echo $j; ?>',
									okText: 'Ok',
									cancelText: 'Cancel'
								});
							</script>
						</p>
						<span class="dialog" id="dialog_<? echo $j; ?>" style="display: none;">
							<? echo $dialog; ?>
						</span>
						<script>
						new Ajax.InPlaceEditor($('dialog_<? echo $j; ?>'), 
						'story_ajax_editor.php?id=<? echo $id; ?>&type=dialog', {
							rows:3,
							submitOnBlur: true, 
							okButton: true, 
							cancelLink: true,
							formId: 'dialog_<? echo $j; ?>',
							okText: 'Ok',
							cancelText: 'Cancel'
						});
</script>
						<span class="description" id="description_<? echo $j; ?>" style="display: none;">
							<? echo $description; ?>
						</span>
						<script>
						new Ajax.InPlaceEditor($('description_<? echo $j; ?>'), 
						'story_ajax_editor.php?id=<? echo $id; ?>&type=description', {
							rows:3,
							submitOnBlur: true, 
							okButton: true, 
							cancelLink: true,
							formId: 'description_<? echo $j; ?>',
							okText: 'Ok',
							cancelText: 'Cancel'
						});
</script>
					</li>
<?
					$j++;
				}
?>
			</ul>
		</div>
		<div id="show_menu" style="position: absolute; top:2px; left: 2px; float: left; display: none;">
			<small>
				<a href="#" onclick="Element.show('group0'); Element.hide('show_menu'); Element.show('top_menu_container'); Element.show('statusbar'); Element.show('story_menu');">Show Menu</a> | 
				<a href="javascript:print();">Print</a>
			</small>
		</div>
	</form>
</div>
<script type="text/javascript" language="javascript">
	sections = ['myBin','myList'];
	function getGroupOrder() {
		var sections = document.getElementsByClassName('section');
		var alerttext = '';
		for(var i=0;i < sections.length;i++) {
			alert(Sortable.sequence(sections[i]));
			var sectionID = sections[i].id;
			var order = Sortable.serialize(sectionID);
			alerttext += sectionID + ': ' + Sortable.sequence(sections[i]) + '\n';
		}
		return false;
	}
	
	Sortable.create('myList',{
		ghosting:false, 
		constraint:false, 
		//hoverclass:'over',
		dropOnEmpty:true,
		containment: sections,
		onChange:
		function(element){
			var totElement = <? echo $count; ?>;
			var newOrder = Sortable.serialize(element.parentNode);
			var BinOrder = Sortable.serialize('myBin');
			var newInput = "<input id='data' name='data' type='hidden' value='"+newOrder+"'/>";
			var binInput = "<input id='dataBin' name='dataBin' type='hidden' value='"+BinOrder+"'/>";
			$('listNewOrder').innerHTML = newInput+binInput;
		}
	});

	Sortable.create('myBin',{
		ghosting:false, 
		constraint:false, 
		//hoverclass:'over',
		dropOnEmpty:true,
		containment:sections,
		onChange:
		function(element){
			var totElement = <? echo $count; ?>;
			var newOrder = Sortable.serialize('myList');
			var BinOrder = Sortable.serialize(element.parentNode);
			var newInput = "<input id='data' name='data' type='hidden' value='"+newOrder+"'/>";
			var binInput = "<input id='dataBin' name='dataBin' type='hidden' value='"+BinOrder+"'/>";
			$('listNewOrder').innerHTML = newInput+binInput;
		}
	});

 new Draggable('group0',{scroll:window,zindex:1000,handle:'handleBin',});

	function displayDialogs() {
		$('switch_dialogs').innerHTML=($('switch_dialogs').innerHTML!='Off') ? 'Off' : '<b>On</b>';
		var totStills = <? echo $count; ?>+1;
		for(i=1; i<totStills; i++) {
			var element = "dialog_"+i;
			$(element).toggle();
		}
	}

	function displayDescriptions() {
		$('switch_descriptions').innerHTML=($('switch_descriptions').innerHTML!='Off') ? 'Off' : '<b>On</b>';
		var totStills = <? echo $count; ?>+1;
		for(i=1; i<totStills; i++) {
			var element = "description_"+i;
			$(element).toggle();
		}
	}
</script>

<?
include 'common/footer.php';
?>
