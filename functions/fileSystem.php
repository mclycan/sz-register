<?php
	function upload($file,$filePath){
		$error = $file['error'];
		switch ($error){
			case 0:
				echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    			echo "Type: " . $_FILES["file"]["type"] . "<br />";
    			echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
   			 	echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

				$filename = $file['name'];
				$fileTemp = $file['tmp_name'];
				$destination = $filePath."/".$filename;
				move_uploaded_file($fileTemp,$destination);
				echo "Stored in: " . $filePath . $_FILES["file"]["name"];
				return "upload_success";
			case 1:
				return "php.ini_upload_max_filesize";
			case 2:
				return "form_MAX_FILE_SIZE";
			case 3:
				return "part_upload";
			case 4:
				return "no_file";
				}
		}

?>