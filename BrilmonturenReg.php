<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Brilmontuur registratie</title>
<style type="text/css">
body{font-family:Trebuchet ms;text-align:center;}

span{color:red;}

</style>
</head>
<body>
<br><br><br><br>

<?php
include "header1.php";
echo"<br><br>";
echo"<h2><u> Brilmontuur Registratie</u></h2>";
$servername = "localhost";
$username="root";
$password="";
$dbname="rs_optiek";
$ID="";
$voor="";
$kleur="";
$prijs="";
$materiaal="";
$vorm="";
$merk="";
$type="";
$codenaam="";


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
$data[0]=$_POST['ID'];
$data[1]=$_POST['voor'];
$data[2]=$_POST['kleur'];
$data[3]=$_POST['prijs'];
$data[4]=$_POST['materiaal'];
$data[5]=$_POST['vorm'];
$data[6]=$_POST['merk'];
$data[7]=$_POST['type'];
$data[8]=$_POST['codenaam'];

return $data;
}
//Zoeken naar een record
if(isset($_POST['search']))
{
$info = getData();
$search_query="SELECT * FROM brilmonturen WHERE ID = '$info[0]'";
$search_result=mysqli_query($conn, $search_query);
if($search_result)
{
if(mysqli_num_rows($search_result))
{
while($rows = mysqli_fetch_array($search_result))
{
$ID = $rows['ID'];
$voor = $rows['voor'];
$kleur = $rows['kleur'];
$prijs = $rows['prijs'];
$materiaal = $rows['materiaal'];
$vorm = $rows['vorm'];
$merk = $rows['merk'];
$type = $rows['type'];
$codenaam = $rows['codenaam'];


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
$insert_query="INSERT INTO `brilmonturen`(`ID`, `voor`, `kleur`, `prijs`, `materiaal`, `vorm`, `merk`, `type`,`codenaam`) VALUES ('$info[0]','$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]','$info[8]')";
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
$delete_query = "DELETE FROM `brilmonturen` WHERE ID = '$info[0]'";
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
$update_query="UPDATE `brilmonturen` SET `ID`='$info[0]',`voor`='$info[1]',kleur='$info[2]',prijs='$info[3]',materiaal='$info[4]',vorm='$info[5]',merk='$info[6]',type='$info[7]',codenaam='$info[8]' WHERE ID = '$info[0]'";
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


<form method ="post" action="BrilmonturenReg.php">
<input type="text" name="ID" placeholder="ID" value="<?php echo($ID);?>"> <br><br>
<input type="text" name="voor" placeholder="voor" value="<?php echo($voor);?>"> <br><br>
<input type="text" name="kleur" placeholder="kleur" value="<?php echo($kleur);?>"> <br><br>
<input type="text" name="prijs" placeholder="prijs" value="<?php echo($prijs);?>"> <br><br>
<input type="text" name="materiaal" placeholder="materiaal" value="<?php echo($materiaal);?>"> <br><br>
<input type="text" name="vorm" placeholder="vorm" value="<?php echo($vorm);?>"> <br><br>
<input type="text" name="merk" placeholder="merk" value="<?php echo($merk);?>"> <br><br>
<input type="text" name="type" placeholder="type" value="<?php echo($type);?>"> <br><br>
<input type="text" name="codenaam" placeholder="productnaam" value="<?php echo($codenaam);?>"> <br><br>

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
include "BrilmonturenOverzicht.php";
echo"<br>";
include "footerRS2.php";
?>
