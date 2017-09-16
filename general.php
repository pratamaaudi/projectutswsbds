<form 
    action="map.php" 
    method="post" 
    enctype = "multipart/form-data">

    <h3>Map Bing / OSM</h3>

    <input 
        type="radio" 
        name="maptype" 
        value="bing" 
        checked> bing

    <input 
        type="radio" 
        name="maptype" 
        value="osm"> osm

    <br>
    <br>

    <h3>Set Titik Tengah dan Zoom Default</h3>
    Titik X :<br>

    <input 
        type="text" 
        name="X" 
        placeholder ="koordinat X">

    <br>
    Titik Y :<br>

    <input 
        type="text" 
        name="Y" 
        placeholder ="koordinat Y">

    <br>
    Zoom :<br>

    <input 
        type="text" 
        name="zoom" 
        placeholder ="zoom">

    <br> <br>

    <h3>POP UP</h3>

    <input 
        type="checkbox" 
        name="onoff" 
        value="ON">On

    <br>
    Kolom field:<br>

    <input 
        type="text" 
        name="field">

    <br><br>

    <input 
        type="submit" 
        value="Submit" 
        name="submit">

</form> <br>