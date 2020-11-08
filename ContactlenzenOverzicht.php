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
echo"<br><br> <h2><u>Contactlenzen in voorraad:</u></h2>";
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

$sql = "SELECT ID, merk, fabrikant, lenstype, draagperiode, corrigeert, codenaam FROM contactlenzen
ORDER BY  ID ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo"<center><table>
    <tr>
    <td> <span><b> ID</b></span> </td>
    <td> </td>
    <td> <span><b> merk</b></span> </td>
      <td> </td>
    <td> <span><b> fabrikant</b></span> </td>
      <td> </td>
    <td> <span><b>lenstype</b></span> </td>
    <td> </td>
    <td> <span><b>draagperiode</b></span> </td>
      <td> </td>
   <td> <span><b>corrigeert</b></span> </td>
      <td> </td>
   <td> <span><b>productnaam</b></span> </td>
    </tr>";
    while($row = $result->fetch_assoc()) {

        echo "
        <tr>
          <td>  " . $row["ID"]."</td>".
          "<td></td>".
         "<td>   " . $row["merk"]."</td>".
          "<td></td>".
         "<td>    ".$row["fabrikant"]."</td>".
          "<td></td>".
         "<td>    ".$row["lenstype"]."</td>".
         "<td></td>".
         "<td>    ".$row["draagperiode"]."</td>".
          "<td></td>".
        "<td>    ".$row["corrigeert"]."</td>".
        "<td></td>".
        "<td>    ".$row["codenaam"]."</td>
          </tr>";
    } echo"</table></center>";
} else {
    echo "0 results";
}
$conn->close();

echo"<br><br><br><br>";
include "footerRS2.php";

?>
</body>
</html>
