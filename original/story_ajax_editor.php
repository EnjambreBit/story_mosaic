<?php
include 'common/config.php';
  if( isset($_REQUEST["value"]) )
  {
	$type = $_GET['type'];  
	$id = $_GET['id'];
	$str = $_REQUEST["value"];
	if ($type=="scene") {
		$set_what = "scene";
	} else if ($type=="shot") {
		$set_what = "shot";
	} else if ($type=="dialog") {
		$set_what = "dialog";
	} else if ($type=="description") {
		$set_what = "description";
	}
	$sql = "UPDATE `story_images` SET `$set_what`='$str' WHERE `id`='$id' LIMIT 1";
	mysql_query($sql);
	echo $str;
	mysql_close();
  }
?>
