<?php
ob_start();
$title = "TMP";
$location = "test_drag.php";
include 'common/config.php';

if(isset($_POST['data'])) {
	$dataBin = $_POST['dataBin'];
	$data = $_POST['data'];
	//echo "dataBin: {$dataBin}<br><br>data: {$data}";
	
	parse_str($_POST['dataBin']);
	for ($a=0; $a<count($myBin); $a++) {
		$sql2 = "UPDATE `story_images` SET `sort_order`='9999' WHERE `id`='$myBin[$a]' LIMIT 1";
		echo "<br>".$sql2;
		mysql_query($sql2) or die('Fail 2');
	}
	parse_str($_POST['data']);
	for ($i=0; $i<count($myList);  $i++) {
		//$list = $_POST['list'];
		$sql = "UPDATE `story_images` SET `sort_order`='$i' WHERE `id`='$myList[$i]' LIMIT 1";
		echo "<br>".$sql;
		mysql_query($sql) or die('Fail!');
	}
}
header("Location: story_mosaic.php");
ob_flush();

?>