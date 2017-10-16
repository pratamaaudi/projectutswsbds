<?php
session_start();
include './class/koneksi.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
 
    </head>
    <body>
        <div class="container">
        <h4>PROFIL AKTIF</h4>

        <form
            action="map.php"
            method="post">

            <input 
                type="hidden"
                name="jenis"
                value="profile">

            <select 
                class="form-control"
                name="profile">

                <?php generate_combobox_profile($conn) ?>

            </select>

            </br>

            <button class="btn btn-success">LOAD</button>

        </form>
        </br>
    </div>
        

        <hr>

        
<div class="container" style="background-color: cyan;">
    <h1><b>TAMBAH PROFILE<b></h1>
        <form style="background: cyan;" 
            action="class/insert.php"
            method="post">

            <input
                type="hidden"
                name="jenis"
                value="profile">

            <h4>Nama Profil</h4>
            <input class="form-control" 
                type="text"
                name="nama"
                required="">

            <br>
            <div class="radio">
           <h4> <input  
                type="radio" 
                name="map" 
                value="bing" 
                checked=""> Bing </h4>
            </div>
            <div class="radio">
           <h4> <input 
                type="radio" 
                name="map" 
                value="osm"> OSM </h4>
            </div>
            <br>

            <h3>Set Titik Tengah dan Zoom Default</h3><br>
            <h4>Titik X :</h4>

            <input class="form-control" 
                type="text" 
                name="x" 
                placeholder ="koordinat X"
                required="">

            <br>
           <h4> Titik Y :</h4>
            <input class="form-control" 
                type="text" 
                name="y" 
                placeholder ="koordinat Y"
                required="">

            <br>
           <h4> Zoom :</h4>
            <input class="form-control" 
                   type="number" 
                name="zoom" 
                placeholder ="zoom"
                required="">

            <br><br>
            <button class="btn btn-success">SAVE</button>

        </form>
</div>


        <?php //debug_profile($_SESSION['profile']); ?>
    </body>
</html>

<?php

function generate_combobox_profile($conn) {
    $sql = "SELECT * FROM profile";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['id'] == $_SESSION['profile']) {
                ?>
                <option selected value="<?php echo $row['id']; ?>"> <?php echo $row['nama']; ?> </option>
                <?php
            } else {
                ?>
                <option value="<?php echo $row['id']; ?>"> <?php echo $row['nama']; ?> </option>
                <?php
            }
        }
    }
}

function debug_profile($profile) {
    echo 'ini halaman profile';
    echo '</br>';
    echo 'profile : ' . $profile;
    echo '</br>';
}
?>
