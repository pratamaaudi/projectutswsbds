<?php

include_once './koneksi.php';
include_once './insert_database.php';
$target_dir = "../layer/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1; //not used yet
$fileType = pathinfo($target_file, PATHINFO_EXTENSION);
$jenis = $_POST["jenis"];
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

            if ($jenis == 'point') {
                $fill = $_POST["fill"];
                insert_layer_point(basename($_FILES["fileToUpload"]["name"]), $fill, '1', $conn);
                echo 'insert layer point';
            } else if ($jenis == 'line') {
                $stroke = $_POST["stroke"];
                insert_layer_line(basename($_FILES["fileToUpload"]["name"]), $stroke, '1', $conn);
                echo 'insert layer line';
            } else if ($jenis == 'polygon') {
                $fill = $_POST["fill"];
                $stroke = $_POST["stroke"];
                $alpha = $_POST["alpha"];
                insert_layer_polygon(basename($_FILES["fileToUpload"]["name"]), $stroke, $fill, $alpha, '1', $conn);
                echo 'insert layer polygon';
            } else {
                insert_layer(basename($_FILES["fileToUpload"]["name"]), '1', '2', $conn);
            }
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
//            header('Location: ../map.php');
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>