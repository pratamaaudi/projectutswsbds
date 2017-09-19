

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
            view: view1
    });