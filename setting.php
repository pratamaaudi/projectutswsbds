<!DOCTYPE html>
<html>
    <head>

        <?php include 'class/plugin.php'; ?>

        <script>
            $(document).ready(function () {
                $("#pengaturan").click(function () {
                    $('#setting').load('general.php');

                })
                $("#tambah_layer").click(function () {
                    $('#setting').load('tambah_layer.php');
                })
                $("#edit_layer").click(function () {
                    $('#setting').load('edit_layer.php');
                })
                $("#profile").click(function () {
                    $('#setting').load('profile.php');
                })
                $('#setting').load('general.php');
            })
        </script>
    </head>

    <body>
        <div class="row" style="margin-bottom: 10px">

            <div 
                class="col-sm-1"
                style="background: cyan">

                <form 
                    action="map.php" 
                    method="post">

                    <button 
                        class="btn"  
                        type="submit" 
                        style="background-color:cyan">

                        <img 
                            src="asset/back.png" 
                            style="
                            height: 50%; 
                            width: 100%;"/>

                    </button>
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
                class="col-sm-3" 
                id="tambah_layer"
                style="
                background: cyan; 
                padding-top: 20px; 
                padding-bottom: 20px">

                <h4 style="text-align: center">TAMBAH LAYER</h4>

            </div>

            <div 
                class="col-sm-2" 
                id="edit_layer"
                style="
                background: cyan; 
                padding-top: 20px; 
                padding-bottom: 20px">

                <h4 style="text-align: center">LAYER</h4>

            </div>

            <div 
                class="col-sm-3" 
                id="profile"
                style="
                background: cyan; 
                padding-top: 20px; 
                padding-bottom: 20px">

                <h4 style="text-align: center">PROFILE</h4>

            </div>

        </div>

        <div 
            class="container-fluid" 
            id="setting"
            style="width: 100%;">
        </div>
    </body>
</html>