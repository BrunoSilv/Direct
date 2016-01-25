 <form action="RegistaCarro.php" method="get">
     Email: <input type="email" name="email" value=<?php echo $_GET["email"] ?> >
     Token: <input type="token" name="token" value=<?php echo $_GET["token"] ?> >
<h1>Inserir novo Carro</h1>
                    <p>registar_carro()</p>
                    <form action="RegistaCarro.php" method="get">
                        Matricula: <input type="matricula" name="matricula" value=<?php echo $_GET["matricula"] ?> >
                        idCondutor: <input type="nomec" name="nomec" value=<?php echo $_GET["nomec"] ?> >
                        estado:<input type="estado" name="estado" value=<?php echo $_GET["estado"] ?>>
                        localizaçao: <input type="local" name="local" value=<?php echo $_GET["local"] ?> >
                        capacidade: <input type="cap" name="cap" value=<?php echo $_GET["cap"] ?> >
                        lat: <input type="lat" name="lat" value=<?php echo $_GET["lat"] ?> >
                        long: <input type="long" name="long" value=<?php echo $_GET["long"] ?> >
                        linkimg: <input type="img" name="img" value=<?php echo $_GET["img"] ?> >
                        <input type="submit"> 
                        <br>
                        <br>



<?php
require_once "../lib/nusoap.php";
 $client = new nusoap_client("http://192.168.24.128/projeto/Admin.php");
 $client->soap_defencoding = 'UTF-8';
 
 $token=$_GET["token"];
 $email=$_GET["email"];
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 $id=13;
 $result = $client->call('Admin.findNameCondutor',array('id'=>$id));
 print_r($result);
 
 if(isset($token)){
     
                        $matricula = $_GET["matricula"];
                        $nomecondutor = $_GET["nomec"];
                        $estado = $_GET["estado"];
                        $local = $_GET["local"];
                       $lat = $_GET["lat"];
                       $long = $_GET["long"];
                        $cap = $_GET["cap"];
                       $img= $_GET["img"];
                        $resultcarro = $client->call('Admin.regista_veiculo', array('token'=>$token,'email'=>$email,'matricula' => $matricula, 'nomecondutor' => $nomecondutor, 'estado' => $estado, 'local' => $local, 'lat' => $lat, 'long' => $long, 'cap' => $cap,'img'=>$img));
                       echo "<br></br>";
                       print_r($resultcarro);
                       
 }           
                       
                        
                        
?>