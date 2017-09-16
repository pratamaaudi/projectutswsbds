<html>
    <head>
        <script>
            $(document).ready(function () {
                $("#point").click(function () {
                    $('#tambah_layer_jenis').load('tambah_layer_point.php');

                })
                $("#line").click(function () {
                    $('#tambah_layer_jenis').load('tambah_layer_line.php');

                })
                $("#polygon").click(function () {
                    $('#tambah_layer_jenis').load('tambah_layer_polygon.php');

                })
            })
        </script>
    </head>
    <body>
        <div class="row" style="margin-bottom: 10px">

            <div
                class="col-sm-4" 
                id="point"
                style="
                background: greenyellow; 
                padding-bottom: 20px">

                <h4 style="text-align: center">POINT / TITIK</h4>

            </div>

            <div 
                class="col-sm-4" 
                id="line"
                style="
                background: greenyellow;
                padding-bottom: 20px">

                <h4 style="text-align: center">LINE / GARIS</h4>

            </div>

            <div 
                class="col-sm-4" 
                id="polygon"
                style="
                background: greenyellow; 
                padding-bottom: 20px">

                <h4 style="text-align: center">POLYGON / AREA</h4>

            </div>

        </div>

        <div 
            class="container-fluid" 
            id="tambah_layer_jenis">
        </div>

         <br>

         
    </body>
</html>