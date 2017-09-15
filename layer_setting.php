
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
            url: 'layer/<?php echo $row['layer']; ?>'
        }),
        style: [style<?php echo $row['id']; ?>]
    });