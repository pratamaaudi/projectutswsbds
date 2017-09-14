<html lang="en">
    <head>
        <link rel="stylesheet" href="../openlayers4/css/ol.css" type="text/css">
        <script src="../openlayers4/build/ol.js" type="text/javascript"></script>    
        <title>Project WSBD Gan</title>

        <!--        load database-->
        <?php
        include_once ("koneksi.php");
        ?>

    </head>
    <body>
        <h2>My Map</h2>
        <div id="map" class="map"></div>
        <script type="text/javascript">
            var map = <?php
            if(isset($_POST['osm'])) {
               echo "'osm'"; 
            }else if(isset($_POST['bing'])) {
               echo "'bing'"; 
            }else{
                echo "'osm'";
            } ?>
            

//generate layer sesuai database layer
<?php
$sql = "SELECT * FROM layer";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
                    var fill<?php echo $row['id']; ?> = new ol.style.Fill({
                        color: 'rgba(<?php echo $row['rgb']; ?>,<?php echo $row['alpha']; ?>)'
                    });
                    var stroke<?php echo $row['id']; ?> = new ol.style.Stroke({
                        color: '<?php echo $row['stroke']; ?>',
                        width: 1.25
                    });
                    if (<?php echo $row['tipe']; ?> == 1) {
                        var style<?php echo $row['id']; ?> = new ol.style.Style({
                            image: new ol.style.Circle({
                                fill: fill<?php echo $row['id']; ?>,
                                stroke: stroke<?php echo $row['id']; ?>,
                                radius: 5
                            })
                        });
                    } else {
                        var style<?php echo $row['id']; ?> = new ol.style.Style({
                            fill: fill<?php echo $row['id']; ?>,
                            stroke: stroke<?php echo $row['id']; ?>
                        });
                    }

                    var layer<?php echo $row['id']; ?> = new ol.layer.Vector({
                        source: new ol.source.Vector({
                            format: new ol.format.GeoJSON({
                                defaultDataProjection: 'EPSG:4326'
                            }),
                            url: '<?php echo $row['layer']; ?>'
                        }),
                        style: [style<?php echo $row['id']; ?>]
                    });
        <?php
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
    </body>
</html>
