<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Klantenregistratie</title>
<style type="text/css">
body{font-family:Trebuchet ms;text-align:center;}

span{color:red;}

</style>
</head>
<body>
<br><br><br>

<?php
include "header1.php";
echo"<br><br>";
echo"<h2><u> Klanten Registratie</u></h2>";
$servername = "localhost";
$username="root";
$password="";
$dbname="rs_optiek";
$klantennr="";
$naam="";
$voornaam="";
$geboortedatum="";
$adres="";
$email="";
$sterktelinkeroog="";
$sterkterechteroog="";
$mobiel="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//Verbinding maken met mysql database
try{
$conn =mysqli_connect($servername,$username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
echo("error in connecting");
}
//Data van form wordt hier opgehaald
function getData()
{
$data = array();
$data[0]=$_POST['klantennr'];
$data[1]=$_POST['naam'];
$data[2]=$_POST['voornaam'];
$data[3]=$_POST['geboortedatum'];
$data[4]=$_POST['adres'];
$data[5]=$_POST['email'];
$data[6]=$_POST['sterktelinkeroog'];
$data[7]=$_POST['sterkterechteroog'];
$data[8]=$_POST['mobiel'];
return $data;
}
//Zoeken naar een record
if(isset($_POST['search']))
{
$info = getData();
$search_query="SELECT * FROM klanten WHERE klantennr = '$info[0]'";
$search_result=mysqli_query($conn, $search_query);
if($search_result)
{
if(mysqli_num_rows($search_result))
{
while($rows = mysqli_fetch_array($search_result))
{
$klantennr = $rows['klantennr'];
$naam = $rows['naam'];
$voornaam = $rows['voornaam'];
$geboortedatum = $rows['geboortedatum'];
$adres = $rows['adres'];
$email = $rows['email'];
$sterkterechteroog = $rows['sterkterechteroog'];
$sterktelinkeroog = $rows['sterktelinkeroog'];
$mobiel = $rows['mobiel'];

}
}else{
echo("geen records gevonden!");
}
} else{
echo("result error");
}

}
//Nieuwe record toevoegen
if(isset($_POST['insert'])){
$info = getData();
$insert_query="INSERT INTO `klanten`(`klantennr`, `naam`, `voornaam`, `geboortedatum`, `adres`, `email`, `sterktelinkeroog`, `sterkterechteroog`, `mobiel`) VALUES ('$info[0]','$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]','$info[8]')";
try{
$insert_result=mysqli_query($conn, $insert_query);
if($insert_result)
{
if(mysqli_affected_rows($conn)>0){
echo("Nieuwe record is succesvol aangemaakt ✓");

}else{
echo("Fout opgetreden bij het aanmaken van een nieuwe record");
}
}
}catch(Exception $ex){
echo("<b><span> Fout opgetreden: </span></b>".$ex->getMessage());
}
}
//Een record verwijderen
if(isset($_POST['delete'])){
$info = getData();
$delete_query = "DELETE FROM `klanten` WHERE klantennr = '$info[0]'";
try{
$delete_result = mysqli_query($conn, $delete_query);
if($delete_result){
if(mysqli_affected_rows($conn)>0)
{
echo("Record verwijderd uit database ✓");
}else{
echo("Fout opgetreden bij het verwijderen van het record!");
}
}
}catch(Exception $ex){
echo("<b><span> Fout bij het verwijderen </span></b>".$ex->getMessage());
}
}
//Een record updaten
if(isset($_POST['update'])){
$info = getData();
$update_query="UPDATE `klanten` SET `naam`='$info[1]',voornaam='$info[2]',geboortedatum='$info[3]',adres='$info[4]',email='$info[5]',sterkterechteroog='$info[6]',sterktelinkeroog='$info[7]',mobiel='$info[8]' WHERE klantennr = '$info[0]'";
try{
$update_result=mysqli_query($conn, $update_query);
if($update_result){
if(mysqli_affected_rows($conn)>0){
echo("Record is bijgewerkt ✓");
}else{
echo("Fout bij het bijwerken van het record!");
}
}
}catch(Exception $ex){
echo("<b><span> Fout bij het updaten </span></b> ".$ex->getMessage());
}
}

?>


<form method ="post" action="KlantenRegistratie.php">
<input type="number" name="klantennr" placeholder="klantennr" value="<?php echo($klantennr);?>"> <br><br>
<input type="text" name="naam" placeholder="naam" value="<?php echo($naam);?>"> <br><br>
<input type="text" name="voornaam" placeholder="voornaam" value="<?php echo($voornaam);?>"> <br><br>
<input type="text" name="geboortedatum" placeholder="geboortedatum" value="<?php echo($geboortedatum);?>"> <br><br>
<input type="text" name="adres" placeholder="adres" value="<?php echo($adres);?>"> <br><br>
<input type="text" name="email" placeholder="voorbeeld@voorbeeld.com" value="<?php echo($email);?>"> <br><br>
<input type="text" name="sterktelinkeroog" placeholder="sterktelinkeroog" value="<?php echo($sterktelinkeroog);?>"> <br><br>
<input type="text" name="sterkterechteroog" placeholder="sterkterechteroog" value="<?php echo($sterkterechteroog);?>"> <br><br>
<input type="number" name="mobiel" placeholder="mobiel nr" value="<?php echo($mobiel);?>"> <br><br>
<div>
<input type="submit" name="insert" value="Toevoegen">
<input type="submit" name="delete" value="Verwijderen">
<input type="submit" name="update" value="Updaten">
<input type="submit" name="search" value="Zoeken">

</div>
</form>
</body>
</html>


<?php
echo"<br>";
include "footerRS2.php";
?>
