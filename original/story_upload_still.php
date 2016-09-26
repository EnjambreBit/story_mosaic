<?php
$title = "Story Mosaic";
include 'common/config.php';
include 'common/header.php';
?>
<?php
	if (isset($_POST['upload'])) {
		$type = substr($_FILES["userfile"]["type"], 6, 4);
		$name = $_POST['name'];
		$name = str_replace(" ", "_", $name);
		$name = $name.".".$type;
		$project = $_POST['project'];
		$scene = $_POST['scene'];
		$shot = $_POST['shot'];
		$description = htmlentities($_POST['description']);
		$dialog = htmlentities($_POST['dialog']);
		$filename = basename($_FILES['userfile']['name']);
		$source_name = $filename;
		$tmp_dir = "upload/tmp/";
		$basedir = "upload/storyboard/";
		$upload_tmp_file = $tmp_dir.basename($_FILES['userfile']['name']);
		$md5 = md5($filename);
		$project_dir = strtolower($project);
		$project_dir = str_replace(" ", "_", $project_dir);
		$project_dir = $basedir.$project_dir."/";
		$path1 = $project_dir.substr($md5, 0, 1)."/";
		$path2 = $path1.substr($md5, 0, 2)."/";
		$final_destination = $path2;
		$new_name = $final_destination.$name.".".$type;
		$date = date("m\/d\/Y");
		$time = date("H:i");
		//$user = $usernameL;
		$user = "digitalh";
		$list = "";
		$sort_order = "9999";


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

		$sql = "INSERT INTO `story_images` (`id`, `name`, `description`, `source_name`, `sha1`, `date`, `time`, `user`, `project`, `scene`, `shot`, `dialog`, `filetype`, `list`, `sort_order`) VALUES (NULL, '$name', ' $description' , '$source_name' , '$sha1', '$date', '$time', '$user', '$project', '$scene', '$shot', '$dialog', '$type','$list','$sort_order')";
		mysql_query($sql) or die("Error al tratar de ingresar el still a la base de datos");

// Debug
		echo "
<h3><a href='story_upload_still.php'>Agregar Otra</a></h3>
<b>--- Debug ---</b><br>
<br>
name: {$name}<br>
project: {$project}<br>
scene: {$scene}<br>
shot: {$shot}<br>
description: {$description}<br>
dialog: {$dialog}<br>
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
this is the image<br>
<img src='{$new_name}' />
";

	} else {
// The Forms
?>
<div id="wrapper">
	<?php //include 'common/top_menu.php'; ?>
	<?php
	$query_p = "SELECT * FROM `projects`";
	$result_p = mysql_query($query_p);
	?>
	<div id="content">
		<div id="content_area">
		<form method="post" action="" enctype="multipart/form-data">
			<input type="hidden" name="upload">
			<fieldset>
				<legend>Upload Still</legend>
				<p>
					<label for="userfile">Source File:</label><br>
					<input type="hidden" name="MAX_FILE_SIZE" value="300000">
					<input type='file' name='userfile' id="userfile">
				</p>
				<p>
					<label for="name">Name</label><br>
					<input id="name" size="30" name="name" type="text" tabindex="2">
				</p>
				<p>
					<label for="project">Project</label><br>
					<select id="project" name="project" tabindex="3">
					<?php
					while ($row = mysql_fetch_array($result_p, MYSQL_ASSOC)) {
						$pid = $row['id'];
						$project_name = $row['project_name'];
					?>
					<option value="<?php echo $project_name; ?>"><?php echo $project_name; ?></option>
					<?php
					}
					?>
				</select>
				</p>
				<p>
					<label for="scene">Scene</label><br>
					<input id="scene" size="5" name="scene" type="text" tabindex="4">
				</p>
				<p>
					<label for="shot">Shot</label><br>
					<input id="shot" size="5" name="shot" type="text" tabindex="5">
				</p>
				<p>
					<label for="description">Description</label><br>
					<textarea id="description" rows="5" cols="40" name="description" tabindex="6"></textarea>
				</p>
				<p>
					<label for="dialog">Dialog</label><br>
					<textarea id="dialog" rows="5" cols="40" name="dialog" tabindex="7"></textarea>
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
