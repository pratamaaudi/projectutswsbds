<html lang="en">
    <head>
        <link 
            rel="stylesheet" 
            href="../openlayers4/css/ol.css" 
            type="text/css">

        <script 
            src="../openlayers4/build/ol.js" 
            type="text/javascript">
        </script>    

        <title>Project WSBD Gan</title>

        <!--        load database-->
        <?php
        include_once ("class/koneksi.php");
        include 'class/plugin.php';
        ?>

    </head>
    <body>

        <div 
            class="row" 
            style="margin: 10px; height: 7%">

            <div class="col-sm-4"><h2>My Map</h2></div>

            <div class="col-sm-2">
                <form 
                    action="map.php" 
                    method="post">

                    <input 
                        class="btn" 
                        type="submit" 
                        name="osm" 
                        value="osm">

                </form>
            </div>

            <div class="col-sm-2">
                <form 
                    action="map.php" 
                    method="post">

                    <input 
                        class="btn" 
                        type="submit" 
                        value="bing" 
                        name="bing">

                </form>
            </div>

            <div class="col-sm-4">
                <form 
                    action="setting.php" 
                    method="post">

                    <button 
                        class="btn btn-primary" 
                        type="submit" 
                        style="float: right">

                        <img 
                            src="asset/gear.png" 
                            style="
                            width: 30px; 
                            height: 50%">

                    </button>
                </form>
            </div>
        </div>

        <div 
            class="container-fluid" 
            style="height: 70%; width: 100%;">

            <div 
                id="map" 
                class="map">     
            </div>
        </div>

        <div 
            class="container" 
            style="
            margin-top: 10px;
            background: blue;">

            <h4 style="color: white">LEGEND</h4>

            <?php generate_legend_button($conn); ?>


        </div>

        <script type="text/javascript">

            var map;
<?php
load_map_database($conn);

override_map();

load_layer_setting($conn);
?>
            if (map == "bing") {
<?php include ("bing.php"); ?>
            } else if (map == "osm") {
<?php include ("osm.php"); ?>
            }
        </script>
    </body>
</html>

<?php

function load_map_database($conn) {
    $sql = "SELECT * FROM setting where id = 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

            map = '<?php echo $row['map']; ?>';

            <?php
        }
    }
}

function override_map() {
    if (isset($_POST['osm'])) {
        echo "map = 'osm'";
    } else if (isset($_POST['bing'])) {
        echo "map = 'bing'";
    }
}

function load_layer_setting($conn) {
    $sql = "SELECT * FROM `layer` WHERE profile_id = 1 ORDER BY urutan";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            include 'layer_setting.php';
        }
    }
}

function generate_legend_button($conn) {
    $sql = "SELECT * FROM `layer` WHERE profile_id = 1 ORDER BY urutan";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

            <input 
                type="checkbox"
                checked value="<?php echo $row['layer']; ?>" 
                onclick="fun_layer<?php echo $row['id']; ?>()"/>
                    
            <span style="color: white;"><?php echo $row['layer']; ?></span></br>

            <?php
        }
    }
}
?>
