<?php
$servername='localhost';
$username="root";
$password="";
try
{
	$con=new PDO("mysql:host=$servername;dbname=myproject_db",$username,$password);
	$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	//echo 'connected';
}
catch(PDOException $e)
{
	echo '<br>'.$e->getMessage();
}
	
?>