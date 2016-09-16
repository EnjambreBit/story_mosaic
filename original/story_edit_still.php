<?php
$title = "Story Mosaic";
include 'common/config.php';
include 'common/header.php';
?>
<?php
	if (isset($_POST['update'])) {
		//$type = substr($_FILES["userfile"]["type"], 6, 4);
		$id = $_POST['id'];
		//$name = $_POST['name'];
		//$name = str_replace(" ", "_", $name);
		//$name = $name.".".$type;
		$project = $_POST['project'];
		$scene = $_POST['scene'];
		$shot = $_POST['shot'];
		$description = $_POST['description'];
		$dialog = $_POST['dialog'];
		$sort_order = $_POST['sort_order'];
		//$filename = basename($_FILES['userfile']['name']);
		//$source_name = $filename;
		//$tmp_dir = "upload/tmp/";
		//$basedir = "upload/storyboard/";
		//$upload_tmp_file = $tmp_dir.basename($_FILES['userfile']['name']);
		//$md5 = md5($filename);
		//$project_dir = strtolower($project);
		//$project_dir = str_replace(" ", "_", $project_dir);
		//$project_dir = $basedir.$project_dir."/";
		//$path1 = $project_dir.substr($md5, 0, 1)."/";
		//$path2 = $path1.substr($md5, 0, 2)."/";
		//$final_destination = $path2;
		//$new_name = $final_destination.$name.".".$type;
		$date = date("m\/d\/Y");
		$time = date("H:i");
		//$user = $usernameL;
		$user = "digitalh";
		
		
		/*
		// First check if the file exists
		if (file_exists($new_name)) {
			echo "Ya existe un archivo con ese nombre. Chequear, mostrar, preguntar y eso es lo que falta. Por ahora no te dejo subir la imagen";
			die();
		} 
		
		// Check if project directory exists
		if (!file_exists($project_dir)) {
			$project_dir_status = "Didn't Exist, created.";
			mkdir($project_dir, 0755);
		} else {
			$project_dir_status = "Exists!";
		}
		
		// Check for subfolders
		if (!file_exists($path1)) {
			$path1_status = "Didn't Exist, created.";
			mkdir($path1, 0755);
		} else {
			$path1_status = "Exists!";
		}
		// Check if final destination exists
		if (!file_exists($final_destination)) {
			$final_destination_status = "Didn't Exist, created";
			mkdir($final_destination, 0755);
		} else {
			$final_destination_status = "Exists";
		}
*/
	/*
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $upload_tmp_file)) {
			$sha1 = sha1($upload_tmp_name); // Get the Sha1sum of the downloaded file
			$original_name = $upload_tmp_file;
			$old = umask(0);
			chmod($upload_tmp_file, 0666);
			umask($old);
			if ($old != umask()) { 
				die ("Problemas de permisos"); 
			}
			rename($original_name, $new_name);
			
		} else {
			echo "Error al subir el archivo";
		}
	*/
		$sql = "UPDATE `story_images` SET `project`='$project', `scene`='$scene', `shot`='$shot', `description`='$description', `dialog`='$dialog', `sort_order`='$sort_order', `date`='$date', `time`='$time', `user`='$user' WHERE `id`='$id' LIMIT 1";
		mysql_query($sql) or die("Error al tratar de ingresar el still a la base de datos");
		
// Debug		
		echo "
<h3><a href='story_upload_still.php'>Agregar Otra</a></h3>
<b>--- Debug ---</b><br>
<br>
id: {$id}<br>
name: {$name}<br>
project: {$project}<br>
scene: {$scene}<br>
shot: {$shot}<br>
description: {$description}<br>
dialog: {$dialog}<br>
sort_order: {$sort_order}<br>
filename: {$filename}<br>
md5: {$md5}<br>
tmp_dir: {$tmp_dir}<br>
basedir: {$basedir}<br>
upload_tmp_file: {$upload_tmp_file}<br>
project_dir: {$project_dir} - {$project_dir_status}<br>
path1: {$path1} - {$path1_status}<br>
final_destination: {$final_destination} - {$final_destination_status}<br>
type: {$type}<br>
new_name: {$new_name}<br>
sql: {$sql}<br>
<hr>
<h2>Updated!</h2>
";
		
	} else {
if (!isset($_GET['id'])) {
	echo "<br><h2>You can't access this page directly, sorry<h2>";
	die();
}
	$id = $_GET['id'];
// Query and show The Form
$sql = "SELECT * FROM `story_images` WHERE `id`='$id' LIMIT 1";
$result = mysql_query($sql);
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$name = $row['name'];
$project = $row['project'];
$scene = $row['scene'];
$shot = $row['shot'];
$description = $row['description'];
$dialog = $row['dialog'];
$source_name = $row['source_name'];
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
<div id="wrapper">
	<?php //include 'common/top_menu.php'; ?>
	<div id="content">
		<div id="content_area">
		<form method="post" action="" enctype="multipart/form-data">
			<input type="hidden" name="update" />
			<input type="hidden" name="id" value="<? echo $id; ?>" />
			<fieldset>
				<legend>Edit Still</legend>
				<p valign="top">
					<img src="<? echo $img; ?>" style="border: 1px solid black; width: 300px;"/>
					<input type="text" name="sort_order" id="sort_order" size="2" tabindex="1" value="<? echo $sort_order; ?>">
					Id: <?echo $id; ?>
				</p>
				<p>
					<label for="userfile">Change Image:</label><br>
					proximamente
					<? /*
					<input type="hidden" name="MAX_FILE_SIZE" value="300000">
					<input type='file' name='userfile' id="userfile">
*/ ?>
				</p>
				<p>
					<label for="name">Name</label><br>
					<? echo $name; ?> 			</p>
				<p>
					<label for="project">Project</label><br>
					<input id="project" size="30" name="project" type="text" tabindex="3" value="<? echo $project; ?>"> 
				</p>
				<p>
					<label for="scene">Scene</label><br>
					<input id="scene" size="5" name="scene" type="text" tabindex="4" value="<? echo $scene; ?>"> 
				</p>
				<p>
					<label for="shot">Shot</label><br>
					<input id="shot" size="5" name="shot" type="text" tabindex="5" value="<? echo $shot; ?>"> 
				</p>
				<p>
					<label for="description">Description</label><br>
					<textarea id="description" rows="5" cols="40" name="description" tabindex="6"><? echo $description; ?></textarea> 
				</p>
				<p>
					<label for="dialog">Dialog</label><br>
					<textarea id="dialog" rows="5" cols="40" name="dialog" tabindex="7"><? echo $dialog; ?></textarea> 
				</p>
				<p>   
					<input type="submit" name="submit" value="Upload">
				</p>
			</fieldset>   
		</form>
		</div>
	</div>
</div>
<?php
}
include 'common/footer.php';
?>