<?php
include_once './koneksi.php';
include_once './update_database.php';

$jenis = $_POST["jenis"];

if($jenis=='general'){
    $map = $_POST["map"];
    $x = $_POST["x"];
    $y = $_POST["y"];
    $zoom = $_POST["zoom"];
    update_setting_general($x, $y, $zoom, $map,'1', $conn);
    header('Location: ../map.php');
}
?>