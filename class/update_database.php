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

?>