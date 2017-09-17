<form 
    action="class/upload.php" 
    method="post" 
    enctype = "multipart/form-data">
    
    <input
        type="hidden"
        name="jenis"
        value="point"/>

    <h3>Upload Layer Point</h3>
    Select Layer:

    <input 
        type="file" 
        name="fileToUpload" 
        id="layerPoint">

    <br>

    <input 
        type="radio" 
        name="maptype" 
        value="point">point

    <br>
    Warna Luasan:<br>

    <input 
        type="text" 
        name="fill" 
        placeholder ="Warna Luasan">

    <br>

    <input 
        type="radio" 
        name="maptype" 
        value="icon" 
        checked> icon

    <br>
    Select Icon :

    <input 
        type="file" 
        name="uploadicon" 
        id="icon">

    <br><br>

    <input 
        type="submit" 
        value="Submit" 
        name="submit">
</form> 