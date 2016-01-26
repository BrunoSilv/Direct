
<html>
<body>
    <form action="ViewUser.php" method="get">
<p>registar_user</p>
name: <input type="nomeuser" name="nomeuser" value=<?php echo $_GET["nomeuser"] ?> >
Email: <input type="emailuser" name="emailuser" value=<?php echo $_GET["emailuser"] ?> >
TOken: <input type="tokenuser" name="tokenuser" value=<?php echo $_GET["tokenuser"] ?> >
<input type="submit"> 
<br></br>
<input type="radio" name="operacaox" value="1">Registar<br>
<input type="radio" name="operacaox" value="2">Logar<br>
<input type="radio" name="operacaox" value="3">Pesquisar veiculos<br>
<input type="radio" name="operacaox" value="4">Comprar Serviço<br>



</body>
</html>
<?php
// Pull in the NuSOAP code
require_once "../lib/nusoap.php";
// Create the client instance
$client = new nusoap_client("http://192.168.24.128/projeto/Admin.php");
$client->soap_defencoding = 'UTF-8';

$num=$_GET["operacaox"];
       echo $num;
       switch ($num){
           case "1":
              $nome=$_GET["nomeuser"];
               $email=$_GET["emailuser"];
              $resulttoken= $client->call('Admin.registarUser',array('nomeuser'=>$nome, 'emailuser'=>$email));
              echo "<br></br>";
              echo "TOKEN:";
              print_r($resulttoken);
              echo "<br></br>";
              break;
           case "2":
               $email=$_GET["emailuser"];
               $token=$_GET["tokenuser"];
                  $result1= $client->call('Admin.validateUser',array('emailuser'=>$email));
       if($result1==NULL){
            
           echo "Token não encontrada! Login sem sucesso!";
       }else if($token==$result1){
       echo "tokens condizem!";
       echo"   LOGADO!!!!";
       $login=1;
   }
   break;
           case "3":
//               if($login=='1'){
               //echo 'Local:<input type="text" name="localuser" value="">';
//               echo '<br><p1>OU</p1></br>';
//               echo 'Lat:<input type="text" name="latuser" value="">';
//               echo 'Long:<input type="text" name="longuser" value="">';
//               echo '<input type="submit">';
             // goto LABEL;
              
    $localuser=$_GET["localuser"]; 
                
                if(isset($localuser)){ 
            
	     $url ="https://maps.googleapis.com/maps/api/geocode/json?address='".$localuser."'&key=AIzaSyDHRTOa0Qh0eq1JTJCRpkn_2Xkv-xgWvlg";
	     $contents=file_get_contents($url);
	     $results=json_decode($contents);
              var_dump($results->results[0]->geometry->location->lat);
             var_dump($results->results[0]->geometry->location->lng); 
             
             $latuserapi=$results->results[0]->geometry->location->lat;
             $longuserapi=$results->results[0]->geometry->location->lng;
             
             echo $latuserapi;
             echo $longuserapi;
              echo "</pre>";
              echo "HELLO";
              
              $result1= $client->call('Admin.ListAllCarsUser',array('latuserapi'=>$latuserapi,'longuserapi'=>$longuserapi));
                echo "<pre>";
                        print_r(($result1));
                    echo "</pre>";
             
                }
                $lat=$_GET["lat"]; 
                if(isset($lat)){
                    $long=$_GET["longuser"];
                    $result1= $client->call('Admin.ListAllCarsUser',array('latuserapi'=>$lat,'longuserapi'=>$long));
                      echo "<pre>";
                        print_r(($result1));
                    echo "</pre>";
                    
                }
                
                
                
                echo "Localidade: ".$localuser;
                
//                echo "<br></br>";
//                //echo 'Local:<input type="text" name="localuser" value="">';
//               echo '<br><p1>OU</p1></br>';
//               echo 'Lat:<input type="text" name="latuser" value="">';
//               echo 'Long:<input type="text" name="longuser" value="">';
//               echo '<input type="submit">';
//               echo "<br></br>";
//               }else{
//                   echo " Nao está logado!";
//               }
                break;
                
                case "4":
                    
                 echo "ENTROU AQUI";
                        $matr=$_GET["matcompra"];
                        $desf=$_GET["destinofinal"];
                        $emailentrar=$_GET["emailuser"];
                       
                        $result4= $client->call('Admin.ListAllCarsUser',array('email'=>$emailentrar,'matricula'=>$matr,'destino'=>$desf));
                        
                        print_r($result4);
                        
                    
                    
                    
                    
           
       }



//          LABEL:      
//              $localuser=$_GET["localuser"];
//                echo "Localidade: ".$localuser;





?>

Local:<input type="text" name="localuser" value=<?php echo $_GET["localuser"] ?> >
Lat:<input type="text" name="latuser" value=<?php echo $_GET["latuser"] ?>>;
Long:<input type="text" name="longuser" value=<?php echo $_GET["longuser"] ?>>;


<br></br>

Matricula:<input type="text" name="matcompra" value=<?php echo $_GET["matcompra"] ?> >
Destino:<input type="text" name="destinofinal" value=<?php echo $_GET["destinofinal"] ?>>;
Preço:<input type="text" name="preco" value=<?php echo $_GET["preco"] ?>>;