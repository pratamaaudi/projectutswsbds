<form action="map.php" method="post" enctype = "multipart/form-data">        
    <h3>Upload Layer Polygon</h3>
    Select Layer:
    <input type="file" name="layerPolygon" id="layerPolygon">
    <br>
    Warna Garis:<br>
    <input type="text" name="warnaGarisPolygon" placeholder ="Warna Garis">
    <br>
    Warna Luasan:<br>
    <input type="text" name="warnaLuasanPolygon" placeholder ="Warna Luasan">
    <br>
    Trasnparansi:<br>
    <input type="text" name="transparansiPolygon" placeholder ="Transparansi">
    <br><br>
    <input type="submit" value="Submit" name="submit">
</form>