<?php
include_once './koneksi.php';
include_once './insert_database.php';
$target_dir = "../layer/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1; //not used yet
$fileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 3097152) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($fileType != "geojson" && $fileType != "kml") {
        echo "Sorry, extention not allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            insert_layer(basename($_FILES["fileToUpload"]["name"]),'1','2',$conn);
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            header('Location: ../map.php');
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>