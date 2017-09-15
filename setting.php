<!DOCTYPE html>
<html>
<body>

<form action="map.php" method="post" enctype = "multipart/form-data">
	<h3>Map Bing / OSM</h3>
    <input type="radio" name="maptype" value="bing" checked> bing
  	<input type="radio" name="maptype" value="osm"> osm<br>
  	<br>

  	<h3>Set Titik Tengah dan Zoom Default</h3>
  	Titik X :<br>
  	<input type="text" name="X" placeholder ="koordinat X">
  	<br>
  	Titik Y :<br>
  	<input type="text" name="Y" placeholder ="koordinat Y">
  	<br>
  	Zoom :<br>
  	<input type="text" name="zoom" placeholder ="zoom">
  	<br> <br>

    <h3>POP UP</h3>
    <input type="checkbox" name="onoff" value="ON">On
    <br>
    Kolom field:<br>
    <input type="text" name="field">
    <br><br>

    <input type="submit" value="Submit" name="submit">
</form> <br>

<form action="map.php" method="post" enctype = "multipart/form-data">
  	<h3>Upload Layer Line</h3>
  	Select Layer:
  	<input type="file" name="layerLine" id="layerLine">
  	<br>
  	Warna Garis:<br>
  	<input type="text" name="warnaGarisLine" placeholder ="Warna Garis">
  	<br><br>
    <input type="submit" value="Submit" name="submit">
</form> <br>
       
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
</form> <br>

<form action="map.php" method="post" enctype = "multipart/form-data">
  	<h3>Upload Layer Point</h3>
    Select Layer:
  	<input type="file" name="layerPoint" id="layerPoint">
  	<br>
  	<input type="radio" name="maptype" value="rboPoint"> point<br>
    Warna Luasan:<br>
  	<input type="text" name="warnaLuasanPoint" placeholder ="Warna Luasan">
  	<br>
    <input type="radio" name="maptype" value="rboIcon" checked> icon<br>
  	Select Icon :
  	<input type="file" name="icon" id="icon">
  	<br><br>
    <input type="submit" value="Submit" name="submit">
</form>  	

</body>
</html>