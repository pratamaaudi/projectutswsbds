<?php
include_once 'class/koneksi.php';

$sql = "SELECT * FROM setting where id = 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>

        <form 
            action="class/update.php" 
            method="post" 
            enctype = "multipart/form-data">

            <input
                type="hidden"
                name="jenis"
                value="general"/>

            <h3>Map Bing / OSM</h3>

            <?php if ($row['map'] == 'bing') { ?>
                <input 
                    type="radio" 
                    name="map" 
                    value="bing"
                    checked> bing

                <input 
                    type="radio" 
                    name="map" 
                    value="osm"> osm
                <?php } else {
                    ?>
                <input 
                    type="radio" 
                    name="map" 
                    value="bing"> bing

                <input 
                    type="radio" 
                    name="map" 
                    value="osm"
                    checked> osm
                    <?php
                }
                ?>
            <br>
            <br>

            <h3>Set Titik Tengah dan Zoom Default</h3>
            Titik X :<br>

            <input 
                type="text" 
                name="x" 
                placeholder ="koordinat X"
                value="<?php echo $row['x']; ?>">

            <br>
            Titik Y :<br>

            <input 
                type="text" 
                name="y" 
                placeholder ="koordinat Y"
                value="<?php echo $row['y']; ?>">

            <br>
            Zoom :<br>

            <input 
                type="text" 
                name="zoom" 
                placeholder ="zoom"
                value="<?php echo $row['zoom']; ?>">

            <br> <br>

            <h3>POP UP</h3>

            <input 
                type="checkbox" 
                name="onoff" 
                value="ON">On

            <br>
            Layer :<br>
            <select>
                <?php generate_combo_box($conn); ?>
            </select>

            <br>

            Kolom field:<br>

            <input 
                type="text" 
                name="field">

            <br><br>

            <input 
                type="submit" 
                value="Submit" 
                name="submit">

        </form>

        <?php
    }
}

function generate_combo_box($conn) {
    $sql = "SELECT * FROM `layer` WHERE profile_id = 1 ORDER BY urutan";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option>' . $row['layer'] . '</option>';
        }
    }
}
?>

