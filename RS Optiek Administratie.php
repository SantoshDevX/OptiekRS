<?php
session_start();
if(isset($_SESSION['log']))
{

?>
<!DOCTYPE html>
<html>
<head> 
   <link href="styleRS1.css" rel="stylesheet" type="text/css" />
	
<title>Optiek RS administratie</title>
</head>
<body>
<!--<h1> Optiek RS Administratie</h1> -->
<?php
include "header1.php"; 

?>
<br><br><br><br><br>

<img src="test1.png" alt="optiek rs" height="400px" width="700px">
<?php
include "footerRS2.php";
?>
</body>
</html>

<?php
}
else
{
	echo "<b>Fout opgetreden bij het inloggen!</b><br>
	Kunt u a.u.b weer inloggen..";
	//header("refresh:2;url=index.php");
}

?>