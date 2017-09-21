<?php
session_start();
include './class/koneksi.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
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

        <hr>

        <h4>TAMBAH PROFILE</h4>

        <form
            action="class/insert.php"
            method="post">

            <input
                type="hidden"
                name="jenis"
                value="profile">

            Nama Profil :<br>
            <input
                type="text"
                name="nama">

            <br>
            <input 
                type="radio" 
                name="map" 
                value="bing"> bing

            <input 
                type="radio" 
                name="map" 
                value="osm"> osm

            <br>
            Set Titik Tengah dan Zoom Default<br>
            Titik X :<br>

            <input 
                type="text" 
                name="x" 
                placeholder ="koordinat X">

            <br>
            Titik Y :<br>

            <input 
                type="text" 
                name="y" 
                placeholder ="koordinat Y">

            <br>
            Zoom :<br>

            <input 
                type="text" 
                name="zoom" 
                placeholder ="zoom">

            <br><br>
            <button class="btn btn-success">SAVE</button>

        </form>



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
