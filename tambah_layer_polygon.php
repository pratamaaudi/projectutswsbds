<form 
    action="class/upload.php" 
    method="post" 
    enctype = "multipart/form-data"> 

    <input
        type="hidden"
        name="jenis"
        value="polygon"/>

    <h3>Upload Layer Polygon</h3>
    Select Layer:

    <input 
        type="file" 
        name="fileToUpload" 
        id="layerPolygon">

    <br>
    Warna Garis:<br>

    <input 
        type="text" 
        name="stroke" 
        placeholder ="Warna Garis">

    <br>
    Warna Luasan:<br>

    <input 
        type="text" 
        name="fill" 
        placeholder ="Warna Luasan">

    <br>
    Trasnparansi:<br>

    <input 
        type="number" 
        name="alpha" 
        step="0.1"
        max="1"
        min="0"
        placeholder ="Transparansi">

    <br><br>

    <input 
        type="submit" 
        value="Submit" 
        name="submit">
</form>