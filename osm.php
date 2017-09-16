
    var map = new ol.Map({
    target: 'map',
            layers: [
                    new ol.layer.Tile({
                    source: new ol.source.OSM()
                            })

//generate layer yang di load sesuai banyakanya isi database layer
<?php
$sql = "SELECT * FROM `layer` WHERE profile_id = 1 ORDER BY urutan";
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