<?php
	function upload($file,$filePath){
		$error = $file['error'];
		switch ($error){
			case 0:
				$filename = $file['name'];
				$fileTemp = $file['tmp_name'];
				$destination = $filePath."/".$filename;
				move_uploaded_file($fileTemp,$destination);
				return "upload success";
			case 1:
				return "php.ini upload_max_filesize";
			case 2:
				return "form MAX_FILE_SIZE";
			case 3:
				return "part upload";
			case 4:
				return "no file";
				}
		}

?>