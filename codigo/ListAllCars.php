
<h1>Listar Todos os Carros da Base de dados</h1>
                    <p>ListAllCars()</p>
                    <form action="ListAllCars.php" method="get">
                        Email: <input type="email" name="email" value=<?php echo $_GET["email"] ?> >
                        Token: <input type="token" name="token" value=<?php echo $_GET["token"] ?> >
                        <input type="submit"> 
                        <br>
                        <br>

<?php

  require_once "../lib/nusoap.php";
 $client = new nusoap_client("http://192.168.24.128/projeto/Admin.php");
 $client->soap_defencoding = 'UTF-8';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$email = $_GET["email"];
$token = $_GET["token"];
//$teste= $client->call('Admin.validate', array('token' => $token, 'email' => $email));
//echo $teste;

if(isset($token)){

$result = $result=$client->call('Admin.listAllCars',array('token' => $token, 'email' => $email));
echo "<pre>";
print_r($result);
echo "</pre>";
    
}
 $err = $client->getError();
            if ($err) {
                // Display the error
               echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
               // At this point, you know the call that follows will fail
           }

?>

