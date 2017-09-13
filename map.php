<html lang="en">
  <head>
    <link rel="stylesheet" href="../openlayers4/css/ol.css" type="text/css">
    <script src="../openlayers4/build/ol.js" type="text/javascript"></script>    
     <title>Project WSBD Gan</title>
  </head>
  <body>
    <h2>My Map</h2>
    <div id="map" class="map"></div>
    <script type="text/javascript">

        var sma = new ol.layer.Vector({
                source: new ol.source.Vector({
                    format: new ol.format.GeoJSON({
                        defaultDataProjection: 'EPSG:4326'
                    }),
                    url: 'sma.geojson'
                }),
            });


        var map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          }), sma
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
          center: ol.proj.fromLonLat([112.752087, -7.257495]),
          zoom: 13
        })
      });
    </script>
    
  </body>
</html>
