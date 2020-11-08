<?php
session_start();


$wachtwoord=$_POST['wachtwoord'];   //password wordt opgehaald van Aanmelden.php
$gebruikersnaam=$_POST['gebruikersnaam']; //username wordt opgehaald van Aanmelden.php

$con=mysqli_connect("localhost","root","","rs_optiek");//mysqli("Servernaam","username van database","password van database","database naam")
$result=mysqli_query($con,"SELECT * FROM `rs optiek admins` WHERE `Wachtwoord`='$wachtwoord' && `Gebruikersnaam`='$gebruikersnaam'");
$count=mysqli_num_rows($result);
if($count==1)
{
	echo "<center><b>Succesvol aangemeld ✓ </b></center>";
	$_SESSION['log']=1;
	header("refresh:2;url=RS Optiek Administratie.php");  //refreshtijd=2 sec en gaat daarna naar Startpagina(RS Optiek Administratie.php)

}
else
{
	echo "<center> <b>Fout bij het aanmelden! </b><br><br> Kunt u a.u.b opnieuw proberen.. </center>";

}


?>
