<?php
include_once 'class/koneksi.php';
?>

<form
    action="map.php"
    style="
    margin-top: 20px; 
    margin-bottom: 20px; ">

    <?php generate_layout($conn); ?>

    <button 
        type="submit" 
        class="btn btn-primary">Submit
    </button>
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
                        readonly="">

                    <h4>Nama Layer</h4>

                    <input 
                        type="text" 
                        class="form-control" 
                        id="layername"
                        readonly="">


                    <h4>Stroke</h4>

                    <input 
                        type="text" 
                        class="form-control" 
                        id="stroke" 
                        placeholder="#ffffff">

                    <h4>RGB</h4>

                    <input 
                        type="text" 
                        class="form-control" 
                        id="rgb" 
                        placeholder="0,0,0">

                    <h4>Alpha</h4>

                    <input 
                        type="number" 
                        class="form-control" 
                        id="alpha"
                        step="0.1"
                        max="1"
                        min="0">

                    <h4>Urutan Layer</h4>

                    <input 
                        type="number" 
                        class="form-control" 
                        id="urutan"
                        min="1">
                </div>
            </div>
            <?php
        }
    }
}
?>
