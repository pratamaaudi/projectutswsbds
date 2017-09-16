<form 
    action="class/upload.php" 
    method="post" 
    enctype = "multipart/form-data">
    
    <input
        type="hidden"
        name="jenis"
        value="line">

    <h3>Upload Layer Line</h3>
    Select Layer:

    <input 
        type="file" 
        name="fileToUpload" 
        id="layerLine">

    <br>
    Warna Garis:<br>

    <input 
        type="text" 
        name="stroke" 
        placeholder ="Warna Garis">

    <br><br>

    <input 
        type="submit" 
        value="Submit" 
        name="submit">
</form>