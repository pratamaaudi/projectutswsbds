<?php
session_start();
include_once './koneksi.php';
include_once './update_database.php';

$jenis = $_POST["jenis"];

switch ($jenis) {
    case 'general':
        $map = $_POST["map"];
        $x = $_POST["x"];
        $y = $_POST["y"];
        $zoom = $_POST["zoom"];
        $popup = 0;
        if (isset($_POST["popup"])) {
            $popup = 1;
        }
        $field_popup = $_POST["field_popup"];
        update_setting_general($x, $y, $zoom, $map, $popup, $field_popup, $_SESSION["profile"], $conn);
// debug_update_general($x, $y, $zoom, $map, $popup, $field_popup);
        break;
    case 'urutan':
        //debug_if_urutan();
        $urutan = array();
        $id_layer = array();
        $profile = $_SESSION['profile'];
        $sql = "SELECT * FROM `layer` WHERE profile_id = '$profile'";
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
                update_urutan_layer($isi, $id_layer[$i], $_SESSION["profile"], $conn);
                //debug_foreach($i);
                $i++;
            }
        }
        break;
    case 'layer':
        $id = $_POST["id"];
        $tipe = $_POST["tipe"];
        if ($tipe == 'point') {
            $rgb = $_POST["rgb"];
            update_layer_point($rgb, $id, $_SESSION["profile"], $conn);

            //debug_update_layer_point($rgb);
        } else if ($tipe == 'line') {
            $stroke = $_POST["stroke"];
            update_layer_line($stroke, $id, $_SESSION["profile"], $conn);

            //debug_update_layer_line($stroke);
        } else if ($tipe == 'polygon') {
            $stroke = $_POST["stroke"];
            $rgb = $_POST["rgb"];
            $alpha = $_POST["alpha"];
            update_layer_polygon($stroke, $rgb, $alpha, $id, $_SESSION["profile"], $conn);

            //debug_update_layer_polygon($stroke, $rgb, $alpha);
        }

        debug_update_layer($id, $tipe);
        break;
    case 'profile':
        
        break;
}

header('Location: ../map.php');

function cek_duplikasi_array($array) {
    if (count(array_unique($array)) < count($array)) {
        return true;
    } else {
        return false;
    }
}

function debug_update_general($x, $y, $zoom, $map, $popup, $field_popup) {
    echo 'update general';
    echo'</br>';
    echo 'x = ' . $x;
    echo'</br>';
    echo 'y = ' . $y;
    echo'</br>';
    echo 'zoom = ' . $zoom;
    echo'</br>';
    echo 'map = ' . $map;
    echo'</br>';
    echo 'popup = ' . $popup;
    echo'</br>';
    echo 'field popup = ' . $field_popup;
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

function debug_foreach($i) {
    echo 'data ke ' . $i . ' berhasil dimasukkan';
}

function debug_update_layer($id, $tipe) {
    echo 'edit layer </br>';
    echo 'id = ' . $id . ' </br>';
    echo 'tipe = ' . $tipe . ' </br>';
}

function debug_update_layer_point($rgb) {
    echo 'edit layer point </br>';
    echo 'rgb : ' . $rgb . '</br>';
}

function debug_update_layer_line($stroke) {
    echo 'edit layer line </br>';
    echo 'stroke : ' . $stroke . '</br>';
}

function debug_update_layer_polygon($stroke, $rgb, $alpha) {
    echo 'edit layer polygon </br>';
    echo 'stroke : ' . $stroke . '</br>';
    echo 'rgb : ' . $rgb . '</br>';
    echo 'alpha : ' . $alpha . '</br>';
}

?>