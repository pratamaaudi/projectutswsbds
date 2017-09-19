
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
            target: 'map',
            view: view1
    });