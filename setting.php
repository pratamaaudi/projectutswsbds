<!DOCTYPE html>
<html>
    <head>
        <style>
            #pengaturan:hover{
                background-color: white;
            }
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function () {
                $("#pengaturan").click(function () {
                    $('#setting').load('pengaturan.php');
                    
                })
                $("#tambah_layer").click(function () {
                    $('#setting').load('tambah_layer.php');
                })
                $('#setting').load('pengaturan.php');
            })
        </script>
    </head>
    <body>
        <div class="row" style="margin-bottom: 10px">

            <div 
                class="col-sm-1"
                style="background: cyan">
                <form action="map.php" method="post">
                    <button class="btn"  type="submit" style="background-color:cyan"><img src="asset/back.png" style="height: 50%; width: 100%;"/></button>
                </form>
            </div>

            <div
                class="col-sm-3" 
                id="pengaturan"
                style="
                background: cyan; 
                padding-top: 20px; 
                padding-bottom: 20px">

                <h4 style="text-align: center">PENGATURAN</h4>

            </div>

            <div 
                class="col-sm-4" 
                id="tambah_layer"
                style="
                background: cyan; 
                padding-top: 20px; 
                padding-bottom: 20px">

                <h4 style="text-align: center">TAMBAH LAYER</h4>

            </div>

            <div 
                class="col-sm-4" 
                onclick="alert('load layer')" 
                style="
                background: cyan; 
                padding-top: 20px; 
                padding-bottom: 20px">

                <h4 style="text-align: center">LAYER</h4>

            </div>

        </div>

        <div class="container-fluid" id="setting"></div>
    </body>
</html>