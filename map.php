<html lang="en">
    <head>
        <link rel="stylesheet" href="../openlayers4/css/ol.css" type="text/css">
        <script src="../openlayers4/build/ol.js" type="text/javascript"></script>    
        <title>Project WSBD Gan</title>
        <?php
        include_once ("koneksi.php");
        ?>

    </head>
    <body>
        <h2>My Map</h2>
        <div id="map" class="map"></div>
        <script type="text/javascript">

<?php
$sql = "SELECT * FROM layer";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>

                    var layer<?php echo $row['id']; ?> = new ol.layer.Vector({
                    source: new ol.source.Vector({
                    format: new ol.format.GeoJSON({
                    defaultDataProjection: 'EPSG:4326'
                    }),
                            url: '<?php echo $row['layer']; ?>'
                    }),
                    });
        <?php
    }
}
?>



            var map = new ol.Map({
            target: 'map',
                    layers: [
                            new ol.layer.Tile({
                            source: new ol.source.OSM()
                            })
<?php
$sql = "SELECT * FROM layer";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>

                            ,layer<?php echo $row['id']; ?>

        <?php
    }
}
?>
                    ],
                    controls: [
                            //Define the default controls
                            new ol.control.Zoom(),
                            new ol.control.Rotate(),
                            new ol.control.Attribution(),
                            //Define some new controls
                            new ol.control.ZoomSlider(),
                            new ol.control.MousePosition(),
                            new ol.control.ScaleLine(),
                            new ol.control.OverviewMap()
                    ],
                    view: new ol.View({
<?php
$sql = "SELECT * FROM setting where id = 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>

                            center: ol.proj.fromLonLat([<?php echo $row['x']; ?>, <?php echo $row['y']; ?>]),
                                    zoom: <?php echo $row['zoom']; ?>
                            })

        <?php
    }
}
?>

            });
        </script>

    </body>
</html>
