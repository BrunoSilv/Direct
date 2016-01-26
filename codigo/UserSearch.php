<?php

require_once "../lib/nusoap.php";
// Create the client instance
$client = new nusoap_client("http://192.168.24.128/projeto/Admin.php");
$client->soap_defencoding = 'UTF-8';


$localuser=$_GET["localuser"]; 
  if(isset($localuser)){ 
            
	     $url ="https://maps.googleapis.com/maps/api/geocode/json?address='".$localuser."'&key=AIzaSyDHRTOa0Qh0eq1JTJCRpkn_2Xkv-xgWvlg";
	     $contents=file_get_contents($url);
	     $results=json_decode($contents);
             // var_dump($results->results[0]->geometry->location->lat);
             //var_dump($results->results[0]->geometry->location->lng); 
             
             $latuserapi=$results->results[0]->geometry->location->lat;
             $longuserapi=$results->results[0]->geometry->location->lng;
  }
  
//   echo $latuserapi;
//             echo $longuserapi;
//              echo "</pre>";
              
              $result1= $client->call('Admin.ListAllCarsUser',array('latuserapi'=>$latuserapi,'longuserapi'=>$longuserapi));
                echo "<pre>";
                        print_r(($result1));
                    echo "</pre>";
             
                

?>
            <form action="UserSearch.php" method="get">
            
Local:<input type="text" name="localuser" value=<?php echo $_GET["localuser"] ?> >
<input type="submit"> 

<a href=UserI.php>Voltar</a>