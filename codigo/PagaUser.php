<form action="PagaUser.php" method="get">
Email: <input type="email" name="email" value=<?php echo $_GET["email"] ?> >
Token: <input type="token" name="token" value=<?php echo $_GET["token"] ?> >
<br>
TokenViagem: <input type="tokenvi" name="tokenvi" value=<?php echo $_GET["tokenvi"] ?> >
<input type="submit" value="Pagar"> 
<?php

require_once "../lib/nusoap.php";
$client = new nusoap_client("http://192.168.24.128/projeto/Admin.php");
$client->soap_defencoding = 'UTF-8';

$email=$_GET["email"];

$token=$_GET["token"];


$tokenvi=$_GET["tokenvi"];
if(isset($token)){
$result1= $client->call('Admin.PagaUser',array('email'=>$email,'token'=>$token,'tokenviagem'=>$tokenvi));

echo "<pre>";
echo $result1;
echo "</pre>";
}





?>