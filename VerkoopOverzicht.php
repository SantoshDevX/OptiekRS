<!DOCTYPE html>
<html>
<head>
<style type="text/css">
body{font-family:Trebuchet ms;text-align:center;} span{color:red;}
</style>
</head>
<br><br><br>
<?php
include "header1.php";
echo"<br> <h2><u>Verkoop historie</u></h2>";


$servername = "localhost";
$username="root";
$password="";
$dbname="rs_optiek";
$klant="";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//Verbinding maken met mysql database
try{
$conn =mysqli_connect($servername,$username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
echo("error in connecting");
}
//Data van form wordt hier opgehaald
function getData3()
{
$data3 = array();

$data3[0]=$_POST['klant'];


return $data3;
}
?>
<h3>Klant historie opzoeken:</h3>
<form method ="post" action="TransactieReg.php">
<input type="text" name="klant" placeholder="klantnaam" value="<?php echo($klant);?>"> <br><br>
<div>

<input type="submit" name="delete" value="Verwijderen">
<input type="submit" name="search2" value="Zoeken">


</div>
</form>
 <br>

<?php

//Zoeken naar bestaande klantnaam, aangeschafte productnaam en aanschafdatum
if(isset($_POST['search2']))
{$info3 = getData3();
$sql = "SELECT klant, product, datum FROM verkoop where klant='$info3[0]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data van elke row
    while($row = $result->fetch_assoc()) {
        echo "
<center>
<table>
<tr>
         <td> <span><b> Naam klant</b></span> </td>
         <td> </td>
         <td> <span><b> product</b></span> </td>
        <td> </td>
        <td> <span><b> datum</b></span> </td>

</tr>
<tr>
          <td>  " . $row["klant"]."</td>".
          "<td></td>".
         "<td>   " . $row["product"]."</td>".
          "<td></td>".
         "<td>    ".$row["datum"]."</td>

</tr>
</table>
</center> ";
    }
} else {
    echo "geen records gevonden!";
}}



//Een record verwijderen
if(isset($_POST['delete'])){
$info3 = getData3();
$delete_query = "DELETE FROM `verkoop` WHERE klant = '$info3[0]'";
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

echo"<br><br><h3>Alle klanten historie bekijken:</h3>";
?>




<?php

echo"<br>";
$sql = "SELECT klant, product, datum FROM verkoop
ORDER BY datum ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo"<center><table>
    <tr>
    <td> <span><b> Naam klant</b></span> </td>
    <td> </td>
    <td> <span><b> product</b></span> </td>
    <td> </td>
    <td> <span><b> datum</b></span> </td>

    </tr>";
    while($row = $result->fetch_assoc()) {

        echo "
          <tr>
          <td>  " . $row["klant"]."</td>".
          "<td></td>".
         "<td>   " . $row["product"]."</td>".
          "<td></td>".
         "<td>    ".$row["datum"]."</td>

          </tr>";
    } echo"</table></center>";
} else {
    echo "0 resultaten gevonden";
}
$conn->close();

echo"<br><br><br>";
include "footerRS2.php";

?>
</body>
</html>
