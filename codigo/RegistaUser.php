 <form action="RegistaUser.php" method="get">
Email: <input type="email" name="email" value=<?php echo $_GET["email"] ?> >
  Nome: <input type="nome" name="nome" value=<?php echo $_GET["nome"] ?> >
   <input type="submit">
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Pull in the NuSOAP code
require_once "../lib/nusoap.php";
// Create the client instance
$client = new nusoap_client("http://192.168.24.128/projeto/Admin.php");
$client->soap_defencoding = 'UTF-8';

              $nome=$_GET["nome"];
               $email=$_GET["email"];
               
             //  echo $nome;
              // echo $email;
              $resulttoken= $client->call('Admin.registarUser',array('nomeuser'=>$nome, 'emailuser'=>$email));
              echo "<br></br>";
              echo "TOKEN:";
              print_r($resulttoken);
              echo "<br></br>";
              
          
          
          
?>