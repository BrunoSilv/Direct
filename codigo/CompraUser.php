
<form action="CompraUser.php" method="get">
Email: <input type="email" name="email" value=<?php echo $_GET["email"] ?> >
Token: <input type="token" name="token" value=<?php echo $_GET["token"] ?> >
<br>
id: <input type="id" name="id" value=<?php echo $_GET["id"] ?> >
onde está?: <input type="localinit" name="localinit" value=<?php echo $_GET["localinit"] ?> >
onde quer ir?: <input type="localfim" name="localfim" value=<?php echo $_GET["localfim"] ?> >
<br>

                        <input type="submit"> 

<?php

require_once "../lib/nusoap.php";
 $client = new nusoap_client("http://192.168.24.128/projeto/Admin.php");
 $client->soap_defencoding = 'UTF-8';

$email=$_GET["email"];
$token=$_GET["token"];


if(isset($token)){
$id=$_GET["id"];
$locali=$_GET["localinit"];
$localf=$_GET["localfim"];


$result = $result=$client->call('Admin.reserva_viagem',array('email' => $email, 'token' => $token,'id' => $id, 'localinit' => $locali, 'localfim' => $localf));
echo "<pre>";
print_r($result);
echo "</pre>";

    
}



?>