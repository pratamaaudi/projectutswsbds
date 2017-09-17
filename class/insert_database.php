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

function insert_layer_polygon($nama_layer, $stroke, $fill, $alpha, $profile, $conn) {
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

function hitung_data_layer($profile, $conn) {
    $sql = "SELECT COUNT(layer)as hasil FROM layer INNER JOIN profile WHERE profile.id='$profile'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $hasil = $row['hasil'];
        }
    }
    return $hasil;
}

?>