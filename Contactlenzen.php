<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Contactlenzen registratie</title>
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
echo"<h2><u> Contactlenzen Registratie</u></h2>";
$servername = "localhost";
$username="root";
$password="";
$dbname="rs_optiek";
$ID="";
$merk="";
$fabrikant="";
$lenstype="";
$draagperiode="";
$corrigeert="";
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
$data[1]=$_POST['merk'];
$data[2]=$_POST['fabrikant'];
$data[3]=$_POST['lenstype'];
$data[4]=$_POST['draagperiode'];
$data[5]=$_POST['corrigeert'];
$data[6]=$_POST['codenaam'];

return $data;
}
//Zoeken naar een record
if(isset($_POST['search']))
{
$info = getData();
$search_query="SELECT * FROM contactlenzen WHERE ID = '$info[0]'";
$search_result=mysqli_query($conn, $search_query);
if($search_result)
{
if(mysqli_num_rows($search_result))
{
while($rows = mysqli_fetch_array($search_result))
{
$ID = $rows['ID'];
$merk = $rows['merk'];
$fabrikant = $rows['fabrikant'];
$lenstype = $rows['lenstype'];
$draagperiode = $rows['draagperiode'];
$corrigeert = $rows['corrigeert'];
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
$insert_query="INSERT INTO `contactlenzen`(`ID`, `merk`, `fabrikant`, `lenstype`, `draagperiode`, `corrigeert`, `codenaam`) VALUES ('$info[0]','$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]')";
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
$delete_query = "DELETE FROM `contactlenzen` WHERE ID = '$info[0]'";
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
$update_query="UPDATE `contactlenzen` SET `ID`='$info[0]',`merk`='$info[1]',fabrikant='$info[2]',lenstype='$info[3]',draagperiode='$info[4]',corrigeert='$info[5]',codenaam='$info[6]' WHERE ID = '$info[0]'";
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


<form method ="post" action="Contactlenzen.php">
<input type="text" name="ID" placeholder="ID" value="<?php echo($ID);?>"> <br><br>
<input type="text" name="merk" placeholder="merk" value="<?php echo($merk);?>"> <br><br>
<input type="text" name="fabrikant" placeholder="fabrikant" value="<?php echo($fabrikant);?>"> <br><br>
<input type="text" name="lenstype" placeholder="lenstype" value="<?php echo($lenstype);?>"> <br><br>
<input type="text" name="draagperiode" placeholder="draagperiode" value="<?php echo($draagperiode);?>"> <br><br>
<input type="text" name="corrigeert" placeholder="corrigeert" value="<?php echo($corrigeert);?>"> <br><br>
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
include "ContactlenzenOverzicht.php";
echo"<br>";
include "footerRS2.php";
?>
