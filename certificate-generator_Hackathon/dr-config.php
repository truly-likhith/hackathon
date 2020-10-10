<?php
$drHost ="localhost";
$drUser ="root";
$drPass = "";
$drDb = "data1";
try{
	//$conn = mysqli_connect($drHost,$drUser,$drPass,$drDb);
  $drConnect = new PDO("mysql:host=$drHost;dbname=$drDb",$drUser,$drPass);
  $drConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $drError){
	echo "Failed To Connect ".$drError->getMessage();
}
?>
