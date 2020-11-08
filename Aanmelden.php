<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
<title>Log in</title>
<style type="text/css">body{text-align:center;background-color:white;color:black;font-family:Trebuchet ms;} h1{color:red;background-color:black;}</style>
</head>
<body>
<h1>Optiek RS Administratie</h1>
<br>
<h2><u>Optiek RS personeel hier inloggen:</u></h2>
<form method="post" action="ConnectionToDB2.php">

<table width="200" align="center">
  <tr>
    <td>Gebruikersnaam: </td>
    <td><input type="text" name="gebruikersnaam" /></td>
  </tr>
  <tr>
    <td>Wachtwoord:</td>
    <td><input type="text" name="wachtwoord" /></td>
  </tr>
 <tr>
    <td></td>
    <td><input type="submit" value="Log in" /></td>
   
  </tr>
</table>
<br>
</form>
<br><br><br><br><br>
<?php include "footerRS2.php"; ?>

</body>
</html>

<?php
session_destroy();
?>
