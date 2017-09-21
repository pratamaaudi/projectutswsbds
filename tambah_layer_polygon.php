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

    <input 
        type="radio" 
        name="warna" 
        value="static" 
        checked> statis (1 warna)

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
        type="radio" 
        name="warna" 
        value="tricolor" 
        checked> tricolor (3 warna)

    <br>
    
    Field :<br>
    <input
        type="text"
        name="field"
        placeholder="field">
    
    <br>
    
    Warna Luasan 1:<br>

    <input 
        type="text" 
        name="fill1" 
        placeholder ="Warna Luasan 1">
    
      <    
    
    <input
        type="number"
        name="batas1"
        placeholder="batas 1">

    <br>
    Warna Luasan 2:<br>

    <input 
        type="text" 
        name="fill2" 
        placeholder ="Warna Luasan 2">
    
    <input
        type="number"
        disabled="">  -  
    
    <input
        type="number"
        name="batas2"
        placeholder="batas 2">

    <br>
    Warna Luasan 3:<br>

    <input 
        type="text" 
        name="fill3" 
        placeholder ="Warna Luasan 3">
    
    <input
        type="number"
        disabled="">  >  

    <br><br>
    <input 
        type="submit" 
        value="Submit" 
        name="submit">
</form>