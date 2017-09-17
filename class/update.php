<?php

include_once './koneksi.php';
include_once './update_database.php';

$jenis = $_POST["jenis"];

if ($jenis == 'general') {
    $map = $_POST["map"];
    $x = $_POST["x"];
    $y = $_POST["y"];
    $zoom = $_POST["zoom"];
    update_setting_general($x, $y, $zoom, $map, '1', $conn);
} else if ($jenis == 'urutan') {
    debug_if_urutan();
    $urutan = array();
    $id_layer = array();
    $sql = "SELECT * FROM layer";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($urutan, $_POST['urutan' . $row['id']]);
            array_push($id_layer, $_POST['id_layer' . $row['id']]);
        }
    }
    //debug_array_urutan($urutan);
    $duplikat = cek_duplikasi_array($urutan);
    debug_duplikat($duplikat);
    if ($duplikat == false) {
        $i = 0;
        foreach ($urutan as $id => $isi) {
            //debug_sinkronisasi_array($id_layer, $i);
            //debug_foreach_urutan($id, $isi);
            update_urutan_layer($isi, $id_layer[$i], "1", $conn);
            //debug_foreach($i);
            $i++;
        }
    }
}

header('Location: ../map.php');

function cek_duplikasi_array($array) {
    if (count(array_unique($array)) < count($array)) {
        return true;
    } else {
        return false;
    }
}

function debug_if_urutan() {
    echo 'update urutan';
    echo'</br>';
}

function debug_array_urutan($urutan) {
    print_r($urutan);
    echo'</br>';
}

function debug_duplikat($duplikat) {
    if ($duplikat == true) {
        echo 'ada yang sama';
        echo'</br>';
    } else {
        echo 'tidak ada yang sama';
        echo'</br>';
    }
}

function debug_foreach_urutan($id, $isi) {
    echo 'id = ' . $id . ' isi = ' . $isi;
    echo'</br>';
}

function debug_sinkronisasi_array($id_layer, $i) {
    echo $id_layer[$i] . '</br>';
}

function debug_foreach($i){
    echo 'data ke '.$i.' berhasil dimasukkan';
}

?>