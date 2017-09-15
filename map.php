<html lang="en">
    <head>
        <link rel="stylesheet" href="../openlayers4/css/ol.css" type="text/css">
        <script src="../openlayers4/build/ol.js" type="text/javascript"></script>    
        <title>Project WSBD Gan</title>

        <!--        load database-->
        <?php
        include_once ("class/koneksi.php");
        ?>

    </head>
    <body>
        <h2>My Map</h2>
        <div id="map" class="map"  style="height: 70%; width: 100%;"></div>
        <script type="text/javascript">
            var map = <?php
        if (isset($_POST['osm'])) {
            echo "'osm'";
        } else if (isset($_POST['bing'])) {
            echo "'bing'";
        } else {
            echo "'osm'";
        }
        ?>


//generate layer sesuai database layer
<?php
$sql = "SELECT * FROM `layer` WHERE 1 ORDER BY urutan";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        include 'layer_setting.php';
    }
}
?>
            if (map == "bing") {
<?php include ("bing.php"); ?>
            } else if (map == "osm") {
<?php include ("osm.php"); ?>
            }
        </script>

        <form action="map.php" method="post">
            <input type="submit" name="osm" value="osm">
        </form>
        <form action="map.php" method="post">
            <input type="submit" value="bing" name="bing">
        </form>
        <?php include ("upload.php"); ?>
    </body>
</html>
