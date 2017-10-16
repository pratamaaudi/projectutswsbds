
    var fill<?php echo $row['id']; ?> = new ol.style.Fill({
        color: 'rgba(<?php echo $row['rgb']; ?>,<?php echo $row['alpha']; ?>)'
                //color: 'rgba(255,255,255,0.1)'
    });

    var stroke<?php echo $row['id']; ?> = new ol.style.Stroke({
        color: '<?php echo $row['stroke']; ?>',
        width: 1.25
    });

<?php if ($row['tipe'] == "point") { ?>
        var style<?php echo $row['id']; ?> = new ol.style.Style({
            image: new ol.style.Circle({
                fill: fill<?php echo $row['id']; ?>,
                radius: 5
            })
        });
<?php } else if ($row['tipe'] == "line") { ?>
        var style<?php echo $row['id']; ?> = new ol.style.Style({
            stroke: stroke<?php echo $row['id']; ?>
        });
<?php } else if ($row['tipe'] == "polygon") { ?>
        var style<?php echo $row['id']; ?> = new ol.style.Style({
            stroke: stroke<?php echo $row['id']; ?>,
            fill: fill<?php echo $row['id']; ?>
        });
<?php } else if ($row['tipe'] == "polygon_tricolor") { ?>
        var fill1<?php echo $row['id']; ?> = new ol.style.Fill({
            color: '<?php echo $row['rgb']; ?>'
                    //color: 'rgba(255,255,255,0.1)'
        });
        var fill2<?php echo $row['id']; ?> = new ol.style.Fill({
            color: '<?php echo $row['rgb2']; ?>'
                    //color: 'rgba(255,255,255,0.1)'
        });
        var fill3<?php echo $row['id']; ?> = new ol.style.Fill({
            color: '<?php echo $row['rgb3']; ?>'
                    //color: 'rgba(255,255,255,0.1)'
        });
        var style1<?php echo $row['id']; ?> = new ol.style.Style({
            fill: fill1<?php echo $row['id']; ?>
        });
        var style2<?php echo $row['id']; ?> = new ol.style.Style({
            fill: fill2<?php echo $row['id']; ?>
        });
        var style3<?php echo $row['id']; ?> = new ol.style.Style({
            fill: fill3<?php echo $row['id']; ?>
        });

        function render<?php echo $row['id']; ?>(feature, resolution)
        {
            if (feature.get('<?php echo $row['field']; ?>') < <?php echo $row['batas1']; ?>)
            {
                return style1<?php echo $row['id']; ?>;
            } else if (feature.get('kepadatan') > <?php echo $row['batas1']; ?> && feature.get('kepadatan') < <?php echo $row['batas2']; ?>) {
                return style2<?php echo $row['id']; ?>;
            } else {
                return style3<?php echo $row['id']; ?>;
            }
        }
<?php } else { ?>
        var style<?php echo $row['id']; ?> = new ol.style.Style({
            image: new ol.style.Icon({
                anchorXUnits: 'fraction',
                anchorYUnits: 'fraction',
                anchor: [0.5, 0.5],
                opacity: 1,
                scale: 0.25,
                src: 'asset/<?php echo $row['icon']; ?>'
            })
        });
<?php } ?>

<?php if ($row['tipe'] == "polygon_tricolor") { ?>
        var layer<?php echo $row['id']; ?> = new ol.layer.Vector({
            source: new ol.source.Vector({
                format: new ol.format.GeoJSON({
                    defaultDataProjection: 'EPSG:4326'
                }),
                url: 'layer/<?php echo $_SESSION['profile'].'/'.$row['layer']; ?>'
            }),
            style: render<?php echo $row['id']; ?>
        });
<?php } else { ?>
        var layer<?php echo $row['id']; ?> = new ol.layer.Vector({
            source: new ol.source.Vector({
                format: new ol.format.GeoJSON({
                    defaultDataProjection: 'EPSG:4326'
                }),
                url: 'layer/<?php echo $_SESSION['profile'].'/'.$row['layer']; ?>'
            }),
            style: [style<?php echo $row['id']; ?>]
        });
<?php } ?>

    var status_layer<?php echo $row['id']; ?> = true;
    function fun_layer<?php echo $row['id']; ?>() {
        if (status_layer<?php echo $row['id']; ?> == true) {
            status_layer<?php echo $row['id']; ?> = false;
            layer<?php echo $row['id']; ?>.setVisible(status_layer<?php echo $row['id']; ?>);
        } else {
            status_layer<?php echo $row['id']; ?> = true;
            layer<?php echo $row['id']; ?>.setVisible(status_layer<?php echo $row['id']; ?>);
        }
    }