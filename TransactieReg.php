<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Transacties</title>
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
echo"<h2><u> Verkoop Registratie</u></h2>";
$servername = "localhost";
$username="root";
$password="";
$dbname="rs_optiek";
$ID="";
$codenaam="";
$klantennr="";
$naam="";
$datum="";
$voornaam="";



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
$data[1]=$_POST['codenaam'];
$data[2]=$_POST['klantennr'];
$data[3]=$_POST['naam'];
$data[4]=$_POST['datum'];
$data[5]=$_POST['voornaam'];


return $data;
}


//Zoeken naar productID en productnaam
if(isset($_POST['search']))
{
$info = getData();
$search_query="SELECT ID, codenaam FROM brilmonturen WHERE ID= '$info[0]'
UNION SELECT ID, codenaam FROM contactlenzen WHERE ID= '$info[0]'
UNION SELECT ID, codenaam FROM lenzenvloeistof WHERE ID= '$info[0]'";
$search_result=mysqli_query($conn, $search_query);
if($search_result)
{
if(mysqli_num_rows($search_result))
{
while($rows = mysqli_fetch_array($search_result))
{
$ID = $rows['ID'];

$codenaam = $rows['codenaam'];


}
}else{
echo("geen records gevonden!");
}
} else{
echo("result error");
}

}

//Zoeken naar klantennr en klantnaam
if(isset($_POST['search']))
{
$info = getData();
$search_query2="SELECT klantennr, naam, voornaam FROM klanten WHERE klantennr= '$info[2]'";
$search_result2=mysqli_query($conn, $search_query2);
if($search_result2)
{
if(mysqli_num_rows($search_result2))
{
while($rows = mysqli_fetch_array($search_result2))
{
$klantennr = $rows['klantennr'];
$naam = $rows['naam'];
$voornaam = $rows['voornaam'];


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
$insert_query="INSERT INTO `verkoop`(`klant`, `product`, `datum`) VALUES ('$info[5] $info[3]','$info[1]','$info[4]')";
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


?>


<form method ="post" action="TransactieReg.php">
<input type="text" name="ID" placeholder="ID" value="<?php echo($ID);?>"> <br><br>
<input type="text" name="codenaam" placeholder="productnaam" value="<?php echo($codenaam);?>"> <br><br>
<input type="text" name="klantennr" placeholder="klantennr" value="<?php echo($klantennr);?>"> <br><br>
<input type="text" name="naam" placeholder="naam" value="<?php echo($naam);?>"> <br><br>
<input type="text" name="voornaam" placeholder="voornaam" value="<?php echo($voornaam);?>"> <br><br>
<input type="text" name="datum" placeholder="datum" value="<?php echo($datum);?>"> <br><br>

<div>
<input type="submit" name="insert" value="Toevoegen">
<input type="submit" name="search" value="Zoeken">


</div>
</form>

</body>
</html>

<?php
include "VerkoopOverzicht.php";
echo"<br>";
include "footerRS2.php";
?>
