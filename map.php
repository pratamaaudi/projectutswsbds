<?php
session_start();
set_session_profile();

//debug_post_profile();
?>

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

        <?php
        include_once ("class/koneksi.php");
        include 'class/plugin.php';
        ?>

        <style>
            .ol-popup {
                position: absolute;
                background-color: white;
                -webkit-filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
                filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
                padding: 15px;
                border-radius: 10px;
                border: 1px solid #cccccc;
                bottom: 12px;
                left: -50px;
                min-width: 280px;
            }
            .ol-popup:after, .ol-popup:before {
                top: 100%;
                border: solid transparent;
                content: " ";
                height: 0;
                width: 0;
                position: absolute;
                pointer-events: none;
            }
            .ol-popup:after {
                border-top-color: white;
                border-width: 10px;
                left: 48px;
                margin-left: -10px;
            }
            .ol-popup:before {
                border-top-color: #cccccc;
                border-width: 11px;
                left: 48px;
                margin-left: -11px;
            }
            .ol-popup-closer {
                text-decoration: none;
                position: absolute;
                top: 2px;
                right: 8px;
            }
            .ol-popup-closer:after {
                content: "âœ–";
            }
        </style>

    </head>
    <body>

        <div 
            class="row" 
            style="margin: 10px; height: 7%">

            <div class="col-sm-2"><h2>My Map</h2></div>

            <div class="col-sm-3"></div>

            <div class="col-sm-1">
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

            <div class="col-sm-1">
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

            <div class="col-sm-5">
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

        <div id="geocoder_overlay" style="width:100px"></div>

        <div id="popup" class="ol-popup">
            <a href="#" id="popup-closer" class="ol-popup-closer"></a>
            <div id="popup-content"></div>
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
            var view1 = new ol.View({<?php generate_view($conn); ?>});

            if (map == "bing") {
<?php include ("bing.php"); ?>
            } else if (map == "osm") {
<?php include ("osm.php"); ?>
            }

<?php generate_popup($conn) ?>

<?php generate_geocoder() ?>
        </script>
    </body>
</html>

<?php

function set_session_profile() {
    if (isset($_POST['profile'])) {
        $_SESSION['profile'] = $_POST['profile'];
    } else if (isset($_SESSION['profile'])) {
        
    } else {
        $_SESSION['profile'] = '1';
    }
}

function load_map_database($conn) {
    $profile = $_SESSION['profile'];
    $sql = "SELECT setting.map FROM `profile` INNER JOIN setting ON profile.setting_id = setting.id WHERE profile.id = $profile";
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
        echo "map = 'osm';";
    } else if (isset($_POST['bing'])) {
        echo "map = 'bing';";
    }
}

function load_layer_setting($conn) {
    $profile = $_SESSION['profile'];
    $sql = "SELECT * FROM `layer` WHERE profile_id = $profile ORDER BY urutan";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            include 'layer_setting.php';
        }
    }
}

function generate_legend_button($conn) {
    $profile = $_SESSION['profile'];
    $sql = "SELECT * FROM `layer` WHERE profile_id = $profile ORDER BY urutan";
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

function generate_view($conn) {
    $profile = $_SESSION['profile'];
    $sql = "SELECT setting.x,setting.y,setting.zoom FROM `profile` INNER JOIN setting ON profile.setting_id = setting.id WHERE profile.id = $profile";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            center: ol.proj.fromLonLat([<?php echo $row['x']; ?>, <?php echo $row['y']; ?>]),
            zoom: <?php echo $row['zoom']; ?>
            <?php
        }
    }
}

function generate_popup($conn) {
    $profile = $_SESSION['profile'];
    $sql = "SELECT setting.popup, setting.field_popup FROM `profile` INNER JOIN setting ON profile.setting_id = setting.id WHERE profile.id = '$profile'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['popup'] == 1) {
                ?>
                var container = document.getElementById('popup');
                var content = document.getElementById('popup-content');
                var closer = document.getElementById('popup-closer');

                var overlay = new ol.Overlay(/** @type {olx.OverlayOptions} */ ({
                element: container,
                autoPan: true,
                autoPanAnimation: {
                duration: 250
                }
                }));

                closer.onclick = function () {
                overlay.setPosition(undefined);
                closer.blur();
                return false;
                };

                var popup = <?php generate_info_popup($row['field_popup']); ?>

                map.on('singleclick', function (evt) {
                var coordinate = evt.coordinate;
                popup(evt.pixel);
                overlay.setPosition(coordinate);
                });
                map.addOverlay(overlay);
                <?php
            }
        }
    }
}

function generate_info_popup($field_popup) {
    ?>
    function (pixel) {
    var feature = map.forEachFeatureAtPixel(pixel, function (feature) {
    return feature;
    });
    if (feature) {
    content.innerHTML = feature.get('<?php echo $field_popup; ?>');
    } else {
    content.innerHTML = '&nbsp;';
    }
    }
    ;<?php
}

function generate_geocoder() {
    ?>
    var geocoder_overlay = new ol.Overlay({
    element: document.getElementById("geocoder_overlay")});
    map.addOverlay(geocoder_overlay);

    var geocoder = new Geocoder('nominatim', {
    provider: 'photon',
    lang: 'en-US',
    placeholder: 'Search for ...',
    targetType: 'text-input',
    limit: 5,
    keepOpen: true
    });
    map.addControl(geocoder);

    geocoder.on('addresschosen', function (evt) {
    var feature = evt.feature,
    coord = evt.coordinate,
    address = evt.address;
    // some popup solution
    content = document.getElementById('geocoder_overlay');
    content.innerHTML = '<p>' + address.formatted + '</p>';
    overlay.setPosition(coord);
    });
    <?php
}

function debug_post_profile() {
    if (isset($_POST['profile'])) {
        echo 'post profile : ' . $_POST['profile'];
    }
    echo 'session profile : ' . $_SESSION['profile'];
}
?>