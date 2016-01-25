<!DOCTYPE html>
<html>
<body>
<form action="view1.php" method="get">
Token Validator: <input type="token" name="token_admin" value=<?php echo $_GET["token_admin"] ?> >
Email Validator: <input type="email" name="email_admin" value=<?php echo $_GET["email"] ?> >
</body>
</html>
<?php
// Pull in the NuSOAP code
require_once "../lib/nusoap.php";

// Create the client instance
$client = new nusoap_client("http://192.168.24.128/projeto/Admin.php");

$token=$_GET["token_admin"];
$email=$_GET["email_admin"];

if($token){
    echo "Este e o seu token ".$token;    
    echo "Este e o seu email ".$email;
}


//$result1= $client->call('Admin.registar',array('token_admin'=>$token,'email_admin'=>$email));





// Check for an error
$err = $client->getError();
if ($err) {
    // Display the error
    echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
    // At this point, you know the call that follows will fail
}
// Call the SOAP method - don't call both at the same time !
//$result = $client->call('hello', array('name' => 'Christophe'));
//$result = $client->call('getTime');


/*
 if( $_GET["sinal"] == '+'){
 //echo $varf;
 //echo $vard;
 echo $vard + $varf;
 
 echo $_GET["sinal"];
}*/

?>
<h1>Inserir</h1>
<p>registar_condutor()</p>
<form action="view1.php" method="get">
Id: <input type="id" name="id_condutor" value=<?php echo $_GET["id_condutor"] ?> >
Email: <input type="email" name="email_condutor" value=<?php echo $_GET["email_condutor"] ?> >
Nome: <input type="nome" name="nome_condutor" value=<?php echo $_GET["nome_condutor"] ?> >
Apelido: <input type="apelido" name="apelido_condutor" value=<?php echo $_GET["apelido_condutor"] ?> >
Horario:<input type="radio" name="horario"
<?php echo $_GET["horario_condutor"] ?>
value="diurno">Diurno
<input type="radio" name="horario"
<?php echo $_GET["horario_condutor"] ?>
value="male">Noturno
Carta: <input type="carta" name="carta_condutor" value=<?php echo $_GET["carta_condutor"] ?> >
<input type="submit"> <?php echo $result1;?>
<br>
<br>

<p>registar_veiculo()</p>
<form action="view1.php" method="get">
Id: <input type="id" name="id_veiculo" value=<?php echo $_GET["id_veiculo"] ?> >
Matricula: <input type="matricula" name="matricula_veiculo" value=<?php echo $_GET["matricula_veiculo"] ?> >
Marca: <input type="marca" name="marca_veiculo" value=<?php echo $_GET["marca_veiculo"] ?> >
Capacidade: <input type="capacidade" name="capacidade_veiculo" value=<?php echo $_GET["capacidade_veiculo"] ?> >
Latitude: <input type="latitude" name="lat_veiculo" value=<?php echo $_GET["lat_veiculo"] ?> >
Longitude: <input type="longitude" name="long_veiculo" value=<?php echo $_GET["long_veiculo"] ?> >
Estado: <input type="boolean" name="estado_veiculo" value=<?php echo $_GET["estado_veiculo"] ?> >
<input type="submit"> <?php echo $result1;?>
</form>
<br>
<br>

<p>registar_viagem()</p>
<form action="view1.php" method="get">
Id: <input type="id" name="id_viagem" value=<?php echo $_GET["id_viagem"] ?> >
Data: <input type="date" name="matricula_veiculo" value=<?php echo $_GET["data_viagem"] ?> >
Id_condutor: <input type="id" name="marca_veiculo" value=<?php echo $_GET["id_condutor"] ?> >
Id_veiculo: <input type="id" name="capacidade_veiculo" value=<?php echo $_GET["id_veiculo"] ?> >
Origem: <input type="latitude" name="lat_veiculo" value=<?php echo $_GET["origem_viagem"] ?> >
Destino: <input type="longitude" name="long_veiculo" value=<?php echo $_GET["destino_viagem"] ?> >
<input type="submit"> <?php echo $result1;?>
</form>
<br>
<br>

<h1>Consultar</h1>
<p>consultar_condutor()</p>
<form action="view1.php" method="get">
Id: <input type="id" name="id_condutor" value=<?php echo $_GET["id_condutor"] ?> >
<input type="submit"> <?php echo $result1;?>
<br>
<br>

<p>consultar_veiculo()</p>
<form action="view1.php" method="get">
Id: <input type="id" name="id_veiculo" value=<?php echo $_GET["id_veiculo"] ?> >
<input type="submit"> <?php echo $result1;?>
</form>
<br>
<br>