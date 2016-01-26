<form action="HistoricoUser.php" method="get">
Email: <input type="email" name="email" value=<?php echo $_GET["email"] ?> >
Token: <input type="token" name="token" value=<?php echo $_GET["token"] ?> >
<br>

<input type="submit" value="MostrarHistorico"> 


<?php

require_once "../lib/nusoap.php";
$client = new nusoap_client("http://192.168.24.128/projeto/Admin.php");
$client->soap_defencoding = 'UTF-8';

$email=$_GET["email"];
$token=$_GET["token"];

if(isset($token)){
$result1= $client->call('Admin.HistoricUser',array('email'=>$email,'token'=>$token));
echo "<pre>";
print_r($result1);
echo "</pre>";
}
?>