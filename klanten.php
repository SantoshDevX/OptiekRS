<!DOCTYPE html>
<html>
<head><title>Register</title>
<style type="text/css">
body{font-family:Trebuchet ms;text-align:center;} span{color:red;} h1{color:red;background-color:black;}
</style>
</head>
<br><br><br>
<?php
include "header1.php";
echo"<br><br> <h2><u>Klantenoverzicht</u></h2>";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rs_optiek";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT klantennr, naam, voornaam, geboortedatum, adres, email, sterktelinkeroog, sterkterechteroog, mobiel FROM klanten ORDER BY  klantennr ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo"<center>
    <table>
    <tr>
    <td> <span><b> klantennr</b></span></td><td><span><b> naam</b></span></td><td><span><b> geboortedatum</b></span></td>
    <td><span><b>adres</b></span></td>
    <td></td>
    <td><span><b>email</b></span></td>
   <td><span><b>sterkte(links)</b></span></td>
   <td></td>
   <td><span><b>sterkte(rechts)</b></span></td>
   <td><span><b>mobiel</b></span></td>
   </tr>";
    while($row = $result->fetch_assoc()) {

        echo "
        <tr>
          <td>  " . $row["klantennr"]."</td>".
         "<td>   " . $row["naam"]. "  " . $row["voornaam"]."</td>".
         "<td>    ".$row["geboortedatum"]."</td>".
         "<td>    ".$row["adres"]."</td>".
         "<td></td><td>    ".$row["email"]."</td>".
          "<td>    ".$row["sterktelinkeroog"]."</td>".
          "<td></td><td>    ".$row["sterkterechteroog"]."</td>".
          "<td>    ".$row["mobiel"]."</td>
          </tr>";
    } echo"</table>
          </center>";
} else {
    echo "0 results";
}
$conn->close();

echo"<br><br><br><br>";
include "footerRS2.php";

?>
</body>
</html>
