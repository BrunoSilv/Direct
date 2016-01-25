<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once "../lib/nusoap.php";
 $client = new nusoap_client("http://192.168.24.128/projeto/Admin.php");
 $client->soap_defencoding = 'UTF-8';

 
 echo "teste";
 
 $token="OLA";
 
$resultcarro = $client->call('Admin.testeme', array('string'=>$token));

echo $resultcarro;
 
 ?>