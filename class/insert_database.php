<?php

function insert_layer($nama_layer, $profile, $tipe, $conn) {
    $urutan = hitung_data_layer('1', $conn) + 1;

    $query = "INSERT INTO `layer` ("
            . "`stroke`, "
            . "`rgb`, "
            . "`alpha`, "
            . "`layer`, "
            . "`tipe`, "
            . "`urutan`, "
            . "`profile_id`) VALUES ("
            . "'#ffffff', "
            . "'0,0,255', "
            . "'1', "
            . "'$nama_layer', "
            . "'$tipe', "
            . "'$urutan', "
            . "'$profile')";
    $result = mysqli_query($conn, $query);
}

function insert_layer_point($nama_layer, $fill, $profile, $conn) {
    $urutan = hitung_data_layer($profile, $conn) + 1;

    $query = "INSERT INTO `layer` ("
            . "`rgb`, "
            . "`alpha`, "
            . "`layer`, "
            . "`tipe`, "
            . "`urutan`, "
            . "`profile_id`) VALUES ("
            . "'$fill', "
            . "'1', "
            . "'$nama_layer', "
            . "'point', "
            . "'$urutan', "
            . "'$profile')";
    $result = mysqli_query($conn, $query);
}

function insert_layer_line($nama_layer, $stroke, $profile, $conn) {
    $urutan = hitung_data_layer($profile, $conn) + 1;

    $query = "INSERT INTO `layer` ("
            . "`stroke`, "
            . "`layer`, "
            . "`tipe`, "
            . "`urutan`, "
            . "`profile_id`) VALUES ("
            . "'$stroke', "
            . "'$nama_layer', "
            . "'line', "
            . "'$urutan', "
            . "'$profile')";
    $result = mysqli_query($conn, $query);
}

function insert_layer_polygon_static($nama_layer, $stroke, $fill, $alpha, $profile, $conn) {
    $urutan = hitung_data_layer($profile, $conn) + 1;

    $query = "INSERT INTO `layer` ("
            . "`stroke`, "
            . "`rgb`, "
            . "`alpha`, "
            . "`layer`, "
            . "`tipe`, "
            . "`urutan`, "
            . "`profile_id`) VALUES ("
            . "'$stroke', "
            . "'$fill', "
            . "'$alpha', "
            . "'$nama_layer', "
            . "'polygon', "
            . "'$urutan', "
            . "'$profile')";
    $result = mysqli_query($conn, $query);
}

function insert_layer_polygon_tricolor($nama_layer, $fil1l, $fil12, $fil13, $batas1, $batas2, $field, $profile, $conn) {
    $urutan = hitung_data_layer($profile, $conn) + 1;

    $query = "INSERT INTO `layer` ("
            . "`rgb`, "
            . "`rgb2`, "
            . "`rgb3`, "
            . "`layer`, "
            . "`tipe`, "
            . "`urutan`, "
            . "`profile_id`, "
            . "`batas1`, "
            . "`batas2`, "
            . "`field`) VALUES ("
            . "'$fil1l', "
            . "'$fil12', "
            . "'$fil13', "
            . "'$nama_layer', "
            . "'polygon_tricolor', "
            . "'$urutan', "
            . "'$profile', "
            . "'$batas1', "
            . "'$batas2', "
            . "'$field')";
    $result = mysqli_query($conn, $query);
}

function insert_layer_point_icon($nama_layer, $nama_icon, $profile, $conn) {
    $urutan = hitung_data_layer($profile, $conn) + 1;

    $query = "INSERT INTO `layer` ("
            . "`layer`, "
            . "`icon`, "
            . "`tipe`, "
            . "`urutan`, "
            . "`profile_id`) VALUES ("
            . "'$nama_layer', "
            . "'$nama_icon', "
            . "'point_icon', "
            . "'$urutan', "
            . "'$profile')";
    $result = mysqli_query($conn, $query);
}

function insert_profile($nama, $conn) {
    $id_setting = ambil_id_setting($conn);

    $query = "INSERT INTO `profile` ("
            . "`nama`, "
            . "`setting_id`) "
            . "VALUES ("
            . "'$nama', "
            . "'$id_setting');";
    $result = mysqli_query($conn, $query);
}

function insert_setting($x, $y, $zoom, $map, $conn) {
    $query = "INSERT INTO `setting` ("
            . "`x`, "
            . "`y`, "
            . "`zoom`, "
            . "`map`, "
            . "`popup`, "
            . "`field_popup`) "
            . "VALUES ("
            . "'$x', "
            . "'$y', "
            . "'$zoom', "
            . "'$map', "
            . "'0', "
            . "'');";
    $result = mysqli_query($conn, $query);
}

function hitung_data_layer($profile, $conn) {
    $sql = "SELECT COUNT(layer) as hasil FROM layer WHERE profile_id = '$profile'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $hasil = $row['hasil'];
        }
    }
    return $hasil;
}

function ambil_id_setting($conn) {
    $sql = "SELECT id FROM `setting` ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $hasil = $row['id'];
        }
    }
    return $hasil;
}

?>