 <form action="RegistaCarro.php" method="get">
     Email: <input type="email" name="email" value=<?php echo $_GET["email"] ?> >
     Token: <input type="token" name="token" value=<?php echo $_GET["token"] ?> >
<h1>Inserir novo Carro</h1>
                    <p>registar_carro()</p>
                    <form action="RegistaCarro.php" method="get">
                        Matricula: <input type="matricula" name="matricula" value=<?php echo $_GET["matricula"] ?> >
                        idCondutor: <input type="id" name="id" value=<?php echo $_GET["id"] ?> >
                        estado:<input type="estado" name="estado" value=<?php echo $_GET["estado"] ?>>
                        localizaçao: <input type="local" name="local" value=<?php echo $_GET["local"] ?> >
                        capacidade: <input type="cap" name="cap" value=<?php echo $_GET["cap"] ?> >
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
// $id=24;
// $result = $client->call('Admin.findNameCondutor',array('id'=>$id));
// print_r($result);
 
 if(isset($token)){
     $local = $_GET["local"];
             $url ="https://maps.googleapis.com/maps/api/geocode/json?address='".$local."'&key=AIzaSyDHRTOa0Qh0eq1JTJCRpkn_2Xkv-xgWvlg";
	     $contents=file_get_contents($url);
	     $results=json_decode($contents);
//              var_dump($results->results[0]->geometry->location->lat);
//             var_dump($results->results[0]->geometry->location->lng); 
             
             $latuserapi=$results->results[0]->geometry->location->lat;
             $longuserapi=$results->results[0]->geometry->location->lng;
     
                        $matricula = $_GET["matricula"];
                        $estado = $_GET["estado"];
                        $local = $_GET["local"];
                       
                        $cap = $_GET["cap"];
                       $img= $_GET["img"];
                       $id= $_GET["id"];
                        $resultcarro = $client->call('Admin.regista_veiculo', array('token'=>$token,'email'=>$email,'matricula' => $matricula, 'id' => $id, 'estado' => $estado, 'local' => $local, 'lat' => $latuserapi, 'long' => $longuserapi, 'cap' => $cap,'img'=>$img));
                       echo "<br></br>";
                       print_r($resultcarro);
                       
 }           
                       
                        
                        
?>