<?php
session_start();
include_once './koneksi.php';
include_once './insert_database.php';
if (!is_dir("../layer/" . $_SESSION["profile"] . "/")) {
    mkdir("../layer/" . $_SESSION["profile"] . "/");
}
$target_dir = "../layer/" . $_SESSION["profile"] . "/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1; //not used yet
$fileType = pathinfo($target_file, PATHINFO_EXTENSION);
$jenis = $_POST["jenis"];


// Check if submit button clicked
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

    if ($jenis == 'point') {
        $maptype = $_POST["maptype"];
        if ($maptype == 'icon') {
            $target_icon = "../asset/";
            $target_file2 = $target_icon . basename($_FILES["uploadicon"]["name"]);
            $fileType2 = pathinfo($target_file2, PATHINFO_EXTENSION);
            if ($fileType2 != "jpg" && $fileType2 != "png" && $fileType2 != "jpeg") {
                echo "Sorry, icon extention not allowed.";
                $uploadOk = 0;
            }
        }
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

            switch ($jenis) {
                case 'point':
                    $maptype = $_POST["maptype"];
                    if ($maptype == 'icon') {
                        if (move_uploaded_file($_FILES["uploadicon"]["tmp_name"], $target_file2)) {
                            insert_layer_point_icon(basename($_FILES["fileToUpload"]["name"]), basename($_FILES["uploadicon"]["name"]), $_SESSION["profile"], $conn);
                            echo "The file " . basename($_FILES["uploadicon"]["name"]) . " has been uploaded.";
                        }
                    } else {
                        $fill = $_POST['fill'];
                        $hex = $fill;
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        $rgb = "$r,$g,$b";
                        insert_layer_point(basename($_FILES["fileToUpload"]["name"]), $rgb, $_SESSION["profile"], $conn);
                        echo 'insert layer point';
                    }
                    break;
                case 'line' :
                    $stroke = $_POST["stroke"];
                    insert_layer_line(basename($_FILES["fileToUpload"]["name"]), $stroke, $_SESSION["profile"], $conn);
                    echo 'insert layer line';
                    break;
                case 'polygon':
                    if ($_POST["warna"] == 'static') {
                        $fill = $_POST["fill"];
                        $stroke = $_POST["stroke"];
                        $alpha = $_POST["alpha"];
                        $hex = $fill;
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        $rgb = "$r,$g,$b";

                        insert_layer_polygon_static(basename($_FILES["fileToUpload"]["name"]), $stroke, $rgb, $alpha, $_SESSION["profile"], $conn);
                        echo 'insert layer poligon statis';
                    } else if ($_POST["warna"] == 'tricolor') {
                        $fill1 = $_POST["fill1"];
                        $fill2 = $_POST["fill2"];
                        $fill3 = $_POST["fill3"];
                        $batas1 = $_POST["batas1"];
                        $batas2 = $_POST["batas2"];
                        $field = $_POST["field"];

                        insert_layer_polygon_tricolor(basename($_FILES["fileToUpload"]["name"]), $fill1, $fill2, $fill3, $batas1, $batas2, $field, $_SESSION["profile"], $conn);
                        echo 'insert layer polygon tricolor';
                    }
                    echo 'insert layer polygon';
                    break;
            }

//            if ($jenis == 'point') {
//                
//            } else if ($jenis == 'line') {
//                
//            } else if ($jenis == 'polygon') {
//                
//            } else {
//                insert_layer(basename($_FILES["fileToUpload"]["name"]), '1', '2', $conn);
//            }

            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            header('Location: ../map.php');
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>