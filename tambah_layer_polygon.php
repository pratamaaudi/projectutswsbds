<div class="container">
<form 
    action="class/upload.php" 
    method="post" 
    enctype = "multipart/form-data"> 

    <input
        type="hidden"
        name="jenis"
        value="polygon"/>

    <h1>Upload Layer Polygon</h1>
    <h3>Select Layer:</h3>

    <input
        type="file" 
        name="fileToUpload" 
        id="layerPolygon">

    <br><hr>
<div class="radio">
   <h4> <input 
        type="radio" 
        name="warna" 
        value="static" 
        checked> Statis (1 warna)</h4>
</div>

    <h3>Warna Garis:</h3>
    <input 
        type="color" 
        name="stroke" 
        placeholder ="Warna Garis" style="width: 15%">

    <br>
    <h3>Warna Luasan:</h3>
    <input 
        type="color" 
        name="fill" 
        placeholder ="Warna Luasan" style="width: 15%">

    <br>
    <h3>Trasnparansi:</h3>
    <input class="form-control" style="width: 15%" 
        type="number" 
        name="alpha" 
        step="0.1"
        max="1"
        min="0"
        placeholder ="Transparansi">

    <br><hr>
<div class="radio">
   <h4> <input 
        type="radio" 
        name="warna" 
        value="tricolor" 
        checked> Tricolor (3 warna)</h4>
</div>
    
    <h3>Field :</h3>
    <input class="form-control" style="width: 40%" 
        type="text"
        name="field"
        placeholder="field">
    
    <br>
    
    <h3>Warna Luasan 1:</h3>
    <input 
        type="color" 
        name="fill1" 
        placeholder ="Warna Luasan 1" style="width: 15%">
    
      <    
    
    <input 
        type="number"
        name="batas1"
        placeholder="batas 1"
        id="batas1"
        oninput="autoinputisian2(this.value)">

    <br>
    <h3>Warna Luasan 2:</h3>
    <input 
        type="color" 
        name="fill2" 
        placeholder ="Warna Luasan 2" style="width: 15%">
    
    <input
        type="number"
        disabled=""
        id="batas2">  -  
    
    <input
        type="number"
        name="batas2"
        placeholder="batas 2"
        id="batas3"
        oninput="autoinputisian4(this.value)">

    <br>
    <h3>Warna Luasan 3:</h3>
    <input 
        type="color" 
        name="fill3" 
        placeholder ="Warna Luasan 3" style="width: 15%">
    
    <input
        type="number"
        disabled=""
        id="batas4">  >  

    <br><br>
    <input class="button btn-primary" 
        type="submit" 
        value="Submit" 
        name="submit">
</form>
</div>