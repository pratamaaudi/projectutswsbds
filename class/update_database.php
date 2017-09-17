<?php

function update_setting_general($x, $y, $zoom, $map, $setting_id, $conn) {
    $query = "UPDATE `setting` SET "
            . "`x` = '$x', "
            . "`y` = '$y', "
            . "`zoom` = '$zoom', "
            . "`map` = '$map' "
            . "WHERE `setting`.`id` = $setting_id;";
    $result = mysqli_query($conn, $query);
}

function update_urutan_layer($urutan, $id_layer, $profile_id, $conn) {
    $query = "UPDATE `layer` SET "
            . "`urutan` = '$urutan' WHERE "
            . "`layer`.`id` = $id_layer AND "
            . "`layer`.`profile_id` = $profile_id;";
    $result = mysqli_query($conn, $query);
}

function update_layer_point($rgb, $id_layer, $profile_id, $conn) {
    $query = "UPDATE `layer` SET "
            . "`rgb` = '$rgb' WHERE "
            . "`layer`.`id` = $id_layer AND "
            . "`layer`.`profile_id` = $profile_id;";
    $result = mysqli_query($conn, $query);
}

function update_layer_line($stroke, $id_layer, $profile_id, $conn) {
    $query = "UPDATE `layer` SET "
            . "`stroke` = '$stroke' WHERE "
            . "`layer`.`id` = $id_layer AND "
            . "`layer`.`profile_id` = $profile_id;";
    $result = mysqli_query($conn, $query);
}

?>