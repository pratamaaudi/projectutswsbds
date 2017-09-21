<?php

function update_setting_general($x, $y, $zoom, $map, $popup, $field_popup, $profile, $conn) {
    $setting_id = get_id_setting($profile, $conn);

    $query = "UPDATE `setting` SET "
            . "`x` = '$x', "
            . "`y` = '$y', "
            . "`zoom` = '$zoom', "
            . "`map` = '$map', "
            . "`popup` = '$popup', "
            . "`field_popup` = '$field_popup' "
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

function update_layer_polygon($stroke, $rgb, $alpha, $id_layer, $profile_id, $conn) {
    $query = "UPDATE `layer` SET "
            . "`stroke` = '$stroke', "
            . "`rgb` = '$rgb', "
            . "`alpha` = '$alpha' WHERE "
            . "`layer`.`id` = $id_layer AND "
            . "`layer`.`profile_id` = $profile_id;";
    $result = mysqli_query($conn, $query);
}

function get_id_setting($profile, $conn) {
    $sql = "SELECT setting.id FROM profile INNER JOIN `setting` ON profile.setting_id = setting.id WHERE profile.id = $profile";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $hasil = $row['id'];
        }
    }
    return $hasil;
}

?>