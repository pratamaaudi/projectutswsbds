<div class="container">
<form 
    action="class/upload.php" 
    method="post" 
    enctype = "multipart/form-data">
    
    <input
        type="hidden"
        name="jenis"
        value="line">

    <h1>Upload Layer Line</h1>
    <h3>Select Layer:</h3>

    <input 
        type="file" 
        name="fileToUpload" 
        id="layerLine">

    <br><br>
   <h3> Warna Garis:</h3>
    <input 
        type="color" 
        name="stroke" 
        placeholder ="Warna Garis" style="width: 15%">

    <br><br>

    <input class="button btn-primary" 
        type="submit" 
        value="Submit" 
        name="submit">
</form>
</div>