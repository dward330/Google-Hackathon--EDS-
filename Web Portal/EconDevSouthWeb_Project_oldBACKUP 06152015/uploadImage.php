<?php

echo "First Post Value: " . $_POST["names"] . "<br><br>";

$target_dir = dirname(__FILE__) . "/imageUploads/";

if (isset($_FILES["Image"]["name"])){
	echo "Image did reach the web server <br><br>";
}
else{
	echo "Image DID Not properly reach the web server <br><br>";
}

$target_file = $target_dir . basename($_FILES["Image"]["name"]);

echo "Target Filepath: " . $target_file . "<br><br>";

echo "Temporary Location: " . $_FILES["Image"]["tmp_name"] . "<br><br>";

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

echo "Image Filetype: " . $imageFileType . "<br><br>";
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["Image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . "." . "<br><br>";
        $uploadOk = 1;
        
        if(move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file)) {
			echo "Image is upload" . "<br><br>";
		} 
		else{
    		echo "Image is not Upload" . "<br><br>";
		}

    } else {
        echo "File is not an image." . "<br><br>";
        $uploadOk = 0;
    }
?>