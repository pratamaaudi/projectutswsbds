<html lang="en">
    <head>
        <link rel="stylesheet" href="../openlayers4/css/ol.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <script src="../openlayers4/build/ol.js" type="text/javascript"></script>    
        <title>Project WSBD Gan</title>

        <!--        load database-->
        <?php
        include_once ("class/koneksi.php");
        ?>

    </head>
    <body>
        <div class="row" style="margin: 10px; height: 7%">

            <div class="col-sm-4"><h2>My Map</h2></div>

            <div class="col-sm-2">
                <form action="map.php" method="post">
                    <input class="btn" type="submit" name="osm" value="osm">
                </form>
            </div>

            <div class="col-sm-2">
                <form action="map.php" method="post">
                    <input class="btn" type="submit" value="bing" name="bing">
                </form>
            </div>

            <div class="col-sm-4">
                <form action="setting.php" method="post">
                    <button class="btn btn-primary" type="submit" style="float: right"><img src="asset/gear.png" style="width: 30px; height: 50%"></button>
                </form>
            </div>
        </div>

        <div class="container-fluid" style="height: 89%; width: 100%;">
            <div id="map" class="map"></div>
        </div>


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
    </body>
</html>
