<?php

function file_upload($target_dir, $input_name, $max_size, $formats_allowed_array)
{
	$target_file = $target_dir . "/" . basename($_FILES[$input_name]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	$error_arr = array();

	// Check if file already exists
	/*if (file_exists($target_file)) {
		    $error_arr[ $_FILES[$input_name]["name"]] = $_FILES[$input_name]["name"];
		    $uploadOk = 0;
		}*/

	// Check file size
	if ($_FILES[$input_name]["size"] > $max_size) {
		$error_arr[] = "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if (
		$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif"
	) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$error_arr[] = "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES[$input_name]["tmp_name"], $target_file)) {
			return $_FILES[$input_name]["name"];
		} else {
			$error_arr[] = "Sorry, there was an error uploading your file.";
		}
	}
	return $error_arr;
}
