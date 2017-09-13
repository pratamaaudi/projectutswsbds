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
            var map = "bing";
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
                    if (<?php echo $row['tipe']; ?> == 1){
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
            if (map == "bing"){
            var sourceBingMaps = new ol.source.BingMaps({
            key: 'AjQ2yJ1-i-j_WMmtyTrjaZz-3WdMb2Leh_mxe9-YBNKk_mz1cjRC7-8ILM7WUVEu',
                    imagerySet: 'Road',
                    culture: 'fr-FR'
            });
            var bingMapsRoad = new ol.layer.Tile({
            preload: Infinity,
                    source: sourceBingMaps
            });
            var map = new ol.Map({
            layers: [
                    bingMapsRoad
<?php
$sql = "SELECT * FROM layer";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>

                    , layer<?php echo $row['id']; ?>

        <?php
    }
}
?>
            ],
                    target: 'map',
                    view: new ol.View({

<?php
$sql = "SELECT * FROM setting where id = 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>

                            center: ol.proj.transform([<?php echo $row['x']; ?>, <?php echo $row['y']; ?>], 'EPSG:4326', 'EPSG:3857'),
                                    zoom: <?php echo $row['zoom']; ?>
                            })

        <?php
    }
}
?>
            });
            } else if (map == "osm"){
            var map = new ol.Map({
            target: 'map',
                    layers: [
                            new ol.layer.Tile({
                            source: new ol.source.OSM()
                            })

//generate layer yang di load sesuai banyakanya isi database layer
<?php
$sql = "SELECT * FROM layer";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>

                            , layer<?php echo $row['id']; ?>

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

//ubah setting x,y dan zoom sesuai database
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
            }
        </script>

    </body>
</html>
