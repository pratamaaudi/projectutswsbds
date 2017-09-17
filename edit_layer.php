<?php
include_once 'class/koneksi.php';
?>

<form
    action="map.php"
    style="
    margin-top: 20px; 
    margin-bottom: 20px; ">

    <div class="container">

        <?php generate_layout($conn); ?>

        <button 
            type="submit" 
            class="btn btn-primary"
            style="
            float: right;
            margin-top: 10px;
            margin-bottom: 50px;">Submit
        </button> 

    </div>


</form>
<?php

function generate_layout($conn) {
    $sql = "SELECT * FROM layer";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

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
                        readonly=""
                        value="<?php echo $row['id']; ?>">

                    <h4>Nama Layer</h4>

                    <input 
                        type="text" 
                        class="form-control" 
                        id="layername"
                        readonly=""
                        value="<?php echo $row['layer']; ?>">

                    <?php if ($row['tipe'] != 'point' && $row['tipe'] != 'point_icon') { ?>
                        <h4>Stroke</h4>

                        <input 
                            type="text" 
                            class="form-control" 
                            id="stroke" 
                            placeholder="#ffffff"
                            value="<?php echo $row['stroke']; ?>">
                            <?php
                        }
                        ?>

                    <?php if ($row['tipe'] != 'line' && $row['tipe'] != 'point_icon') { ?>

                        <h4>Fill</h4>

                        <input 
                            type="text" 
                            class="form-control" 
                            id="rgb" 
                            placeholder="0,0,0"
                            value="<?php echo $row['rgb']; ?>">

                    <?php } ?>  

                    <?php if ($row['tipe'] == 'polygon' && $row['tipe'] != 'point_icon') { ?>

                        <h4>Alpha</h4>

                        <input 
                            type="number" 
                            class="form-control" 
                            id="alpha"
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
                            value="<?php echo $row['icon']; ?>"><?php }
                    ?>

                    <h4>Urutan Layer</h4>

                    <input 
                        type="number" 
                        class="form-control" 
                        id="urutan"
                        min="1"
                        value="<?php echo $row['urutan']; ?>">
                </div>
            </div>
            <?php
        }
    }
}
?>
