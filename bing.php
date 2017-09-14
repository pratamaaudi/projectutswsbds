
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