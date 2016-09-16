<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $section_title; ?></title>
	<meta http-equiv="Contet-Type" content="text/html; charset=UTF-8" />
		<?php 
		if (isset($_GET['printable'])) {
			$stylesheet = "styles_print.css";
			$stylemedia = "print";
			$print = 1;
		} else {
			$stylesheet = "styles.css";
			$stylemedia = "screen";
			$print = 0;
		}
			echo "<link rel='stylesheet' type='text/css' href='css/{$stylesheet}' media='{$stylemedia}'/>";
			echo "<link rel='shortcut icon' href='favicon.ico' />";
		?>
	<script src="common/js_functions.js" type="text/javascript"></script>
	<script src="common/prototype.js" type="text/javascript"></script>
	<script src="common/scriptaculous.js" type="text/javascript"></script>

</head>
<?php
if ($langL=="") {
	$langL = "en";
}
$include = "locales/".$langL.".php";
include $include;
?>
<body onLoad="setTimeout('time();',5000);">
