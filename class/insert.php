<?php

include './koneksi.php';
include './insert_database.php';

insert_setting($_POST['x'], $_POST['y'], $_POST['zoom'], $_POST['map'], $conn);
insert_profile($_POST['nama'], $conn);

header('Location: ../map.php');
//debug_upload_profile($_POST['nama'], $_POST['map'], $_POST['x'], $_POST['y'], $_POST['zoom']);

function debug_upload_profile($nama, $map, $x, $y, $zoom) {
    echo 'ini upload profile';
    echo '</br>';
    echo 'nama : ' . $nama;
    echo '</br>';
    echo 'map : ' . $map;
    echo '</br>';
    echo 'x : ' . $x;
    echo '</br>';
    echo 'y : ' . $y;
    echo '</br>';
    echo 'zoom : ' . $zoom;
    echo '</br>';
}

?>
