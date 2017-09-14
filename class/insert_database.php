<?php

function insert_layer($nama_layer, $profile, $tipe, $conn) {
    $urutan = hitung_data_layer($conn) + 1;

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

function hitung_data_layer($conn) {
    $sql = "SELECT COUNT(layer)as hasil FROM layer";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $hasil = $row['hasil'];
        }
    }
    return $hasil;
}

?>