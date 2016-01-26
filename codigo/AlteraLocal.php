<h1>Alterar Localizaçao de um carro</h1>
                    <p>ListAllCars()</p>
                    <form action="AlteraLocal.php" method="get">
                        Email: <input type="email" name="email" value=<?php echo $_GET["email"] ?> >
                        Token: <input type="token" name="token" value=<?php echo $_GET["token"] ?> >
                        IdCarro: <input type="id" name="id" value=<?php echo $_GET["id"] ?> >
                        Lat: <input type="lat" name="lat" value=<?php echo $_GET["lat"] ?> >
                        Long: <input type="long" name="long" value=<?php echo $_GET["long"] ?> >
                        Local: <input type="local" name="local" value=<?php echo $_GET["local"] ?> >
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

 $token=$_GET["token"];
 $email=$_GET["email"];
 
 
 
 if(isset($token)){
    $id= $_GET["id"];
                        $lat=$_GET["lat"];
                        $long=$_GET["long"];
                        $local=$_GET["local"];
                        echo $local;
                        $resultcarro = $client->call('Admin.novalocal', array('token'=>$token,'email'=>$email,'id' => $id, 'lat' => $lat, 'long' => $long,'local' => $local));
                       echo "<br></br>";
                       print_r($resultcarro);
                       
 }
 
 
 
 
?>