<?php
	function upload($file,$filePath){
		$error = $file['error'];
		switch ($error){
			case 0:
				$filename = $file['name'];
				$fileTemp = $file['tmp_name'];
				$destination = $filePath."/".$filename;
				move_uploaded_file($fileTemp,$destination);
				return "文件上传成功";
			case 1:
				return "上传附件超过了php.ini中upload_max_filesize选项限制的值";
			case 2:
				return "上传附件的大小超过了form表单MAX_FILE_SIZE选项限制的值";
			case 3:
				return "附件只有部分上传";
			case 4:
				return "没有选择上传附件";
				}
		}

?>