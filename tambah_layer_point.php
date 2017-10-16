<div class="container">
<form  
    action="class/upload.php" 
    method="post" 
    enctype = "multipart/form-data">

    <input
        type="hidden"
        name="jenis"
        value="point"/>

    <h1>Upload Layer Point</h1>
   <h3> Select Layer:</h3>

    <input 
        type="file" 
        name="fileToUpload" 
        id="layerPoint">

    <br><hr>

<div class="radio">
   <h4> <input
        type="radio" 
        name="maptype" 
        value="icon" 
        checked> Icon</h4>
</div>
   <h3> Select Icon :</h3>

    <input 
        type="file" 
        name="uploadicon" 
        id="icon">

    <br><hr>

    <div class="radio">
  <h4> <input 
        type="radio" 
        name="maptype" 
        value="point"> Point </h4>
    </div> 

   <h3> Warna Luasan:</h3>
    <input 
        type="color" 
        name="fill" 
        placeholder ="Warna Luasan" style="width: 15%">

    <br>

    <br>

    <input class="button btn-primary" 
        type="submit" 
        value="Submit" 
        name="submit">
</form> 
</div>