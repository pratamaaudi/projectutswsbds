<?php
session_start();
include_once 'class/koneksi.php';

$profile = $_SESSION['profile'];
$sql = "SELECT * FROM profile INNER JOIN `setting` ON profile.setting_id = setting.id WHERE profile.id = $profile";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
<div class="container">
        <form 
            action="class/update.php" 
            method="post" 
            enctype = "multipart/form-data">

            <input
                type="hidden"
                name="jenis"
                value="general"/>

            <h2>Map Bing / OSM</h2>

            <div class="radio">
            <?php if ($row['map'] == 'bing') { ?>
              <h4>  <input 
                    type="radio" 
                    name="map" 
                    value="bing"
                    checked> Bing </h4>
            </div>

            <div class="radio">
               <h4> <input 
                    type="radio" 
                    name="map" 
                    value="osm"> OSM </h4>
            </div>
                <?php } else {
                    ?>
            <div class="radio">
               <h4> <input 
                    type="radio" 
                    name="map" 
                    value="bing"> Bing </h4>
            </div>

            <div class="radio">
               <h4> <input 
                    type="radio" 
                    name="map" 
                    value="osm"
                    checked> OSM </h4>
            </div>
                    <?php
                }
                ?>
            <br> <hr>

            <h2>Set Titik Tengah dan Zoom Default</h2> <br>
            
           <h4> Titik X :</h4>
            <input class="form-control
                type="text" 
                name="x" 
                placeholder ="koordinat X"
                value="<?php echo $row['x']; ?>">

            <br>
           <h4> Titik Y :</h4>
            <input class="form-control
                type="text" 
                name="y" 
                placeholder ="koordinat Y"
                value="<?php echo $row['y']; ?>">

            <br>
           <h4> Zoom :</h4>

            <input class="form-control
                type="text" 
                name="zoom" 
                placeholder ="zoom"
                value="<?php echo $row['zoom']; ?>">

            <br>  <hr>

            <h3>POP UP</h3>
            
            <?php if ($row['popup'] == 1) { ?>
            <div class="checkbox">
               <h4> <input 
                    type="checkbox" 
                    name="popup" 
                    value="true"
                    checked=""> ON </h4>
            </div>
                <?php } else {
                    ?>
            <div class="checkbox">
               <h4> <input 
                    type="checkbox" 
                    name="popup" 
                    value="OFF"> ON </h4>
            </div>
                    <?php
                }
                ?>


            <br>

           <h4> Kolom field:</h4>
            <input class="form-control
                type="text" 
                name="field_popup"
                value="<?php echo $row['field_popup']; ?>">

            <br>

            <input class="button btn-primary" 
                type="submit" 
                value="Submit" 
                name="submit">

        </form>
</div>
        <?php
    }
}
?>

