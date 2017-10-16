<?php
session_start();
include_once 'class/koneksi.php';
include_once 'class/insert_database.php';
?>

<div class="container">

    <form
        action="class/update.php"
        method="post">

        <h4>URUTAN LAYER</h4>
        <?php generate_urutan_layer($conn); ?>

        <input
            type="hidden"
            name="jenis"
            id="jenisa"
            value="urutan"/>

        <input
            type="submit"
            class="btn btn-success"
            value="SAVE"
            style="
            margin-top: 10px;">

        </br></br>

        <hr>

    </form>

    </br>

    <h4>SETTING LAYER</h4>
    <?php generate_layer_setting($conn); ?>

</div>



<?php

function generate_urutan_layer($conn) {
    $max = hitung_data_layer($_SESSION['profile'], $conn);
    $profile = $_SESSION['profile'];
    $sql = "SELECT * FROM `layer` WHERE profile_id = $profile ORDER BY urutan";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

            <div 
                class="row"
                style="margin-top: 10px;">
                <div class="col-sm-3">
                    <a 
                        href="#form<?php echo $row['id']; ?>">
                        <button
                            class="btn"
                            type="button">
                                <?php echo $row['layer']; ?>
                        </button> 
                    </a>
                </div>
                <div class="col-sm-2">
                    <input
                        id="urutan<?php echo $row['id']; ?>"
                        name="urutan<?php echo $row['id']; ?>"
                        type="number"
                        class="form-control"
                        min="1"
                        max="<?php echo $max; ?>"
                        value="<?php echo $row['urutan']; ?>">

                    <input
                        type="hidden"
                        name="id_layer<?php echo $row['id']; ?>"
                        value="<?php echo $row['id']; ?>"/>
                </div>

            </div>

            <?php
        }
    }
}

function generate_layer_setting($conn) {
    $profile = $_SESSION['profile'];
    $sql = "SELECT * FROM `layer` WHERE profile_id = $profile ORDER BY urutan";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <form
                action="class/update.php"
                id="form<?php echo $row['id']; ?>"
                method="post"
                style="
                margin-top: 20px; 
                margin-bottom: 20px; ">

                <input
                    type="hidden"
                    name="jenis"
                    value="layer">

                <input
                    type="hidden"
                    name="tipe"
                    value="<?php echo $row['tipe']; ?>">

                <div 
                    class ="container" 
                    style="
                    background: cyan;
                    padding: 20px;
                    margin-top: 20px;">

                    <div class="form-group">
                        <h4>ID</h4>

                        <input 
                            type="text" 
                            class="form-control" 
                            id="id" 
                            name="id"
                            readonly=""
                            value="<?php echo $row['id']; ?>">

                        <h4>Nama Layer</h4>

                        <input 
                            type="text" 
                            class="form-control" 
                            id="layername"
                            readonly=""
                            value="<?php echo $row['layer']; ?>">

                        <?php if ($row['tipe'] != 'point' && $row['tipe'] != 'point_icon' && $row['tipe'] != 'polygon_tricolor') { ?>
                            <h4>Stroke</h4>

                            <input 
                                type="color" 
                                style="width: 100%;"
                                id="stroke" 
                                name="stroke"
                                placeholder="#ffffff"
                                value="<?php echo $row['stroke']; ?>">
                                <?php
                            }
                            ?>

                        <?php if ($row['tipe'] != 'line' && $row['tipe'] != 'point_icon' && $row['tipe'] != 'polygon_tricolor') { ?>

                            <h4>Fill</h4>

                            <input 
                                type="text" 
                                class="form-control" 
                                id="rgb" 
                                name="rgb"
                                placeholder="0,0,0"
                                value="<?php echo $row['rgb']; ?>">

                        <?php } ?>  

                        <?php if ($row['tipe'] == 'polygon' && $row['tipe'] != 'point_icon' && $row['tipe'] != 'polygon_tricolor') { ?>

                            <h4>Alpha</h4>

                            <input 
                                type="number" 
                                class="form-control" 
                                id="alpha"
                                name="alpha"
                                step="0.1"
                                max="1"
                                min="0"
                                value="<?php echo $row['alpha']; ?>">

                        <?php } ?>

                        <?php if ($row['tipe'] == 'point_icon') { ?>
                            <h4>Icon</h4>

                            <input 
                                type="text" 
                                class="form-control"
                                readonly
                                value="<?php echo $row['icon']; ?>"><?php
                            }

                            if ($row['tipe'] == 'polygon_tricolor') {
                                ?>
                            <h4>field</h4>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="rgb" 
                                name="rgb"
                                placeholder="0,0,0"
                                value="<?php echo $row['field']; ?>">
                            <h4>Fill</h4>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="rgb" 
                                name="rgb"
                                placeholder="0,0,0"
                                value="<?php echo $row['rgb']; ?>">
                            <h4>Fill</h4>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="rgb" 
                                name="rgb"
                                placeholder="0,0,0"
                                value="<?php echo $row['rgb2']; ?>">
                            <h4>Fill</h4>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="rgb" 
                                name="rgb"
                                placeholder="0,0,0"
                                value="<?php echo $row['rgb3']; ?>">
                            <h4>Batasan 1</h4>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="rgb" 
                                name="rgb"
                                placeholder="0,0,0"
                                value="<?php echo $row['batas1']; ?>">
                            <h4>Batasan 2</h4>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="rgb" 
                                name="rgb"
                                placeholder="0,0,0"
                                value="<?php echo $row['batas2']; ?>">
                                <?php
                            }
                            ?>

                        <?php if ($row['tipe'] != 'point_icon' && $row['tipe'] != 'polygon_tricolor') { ?>
                            <button 
                                type="submit" 
                                class="btn btn-primary form-control"
                                style="
                                margin-top: 20px;">Submit
                            </button> 
                        <?php } ?>
                    </div>
                </div>
            </form>
            <?php
        }
    }
}
?>
