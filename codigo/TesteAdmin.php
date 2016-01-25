
<!DOCTYPE html>
<html>
    <body>
      <h1>MENU()</h1>  
        <form action="TesteAdmin.php" method="get">
            <a href=ListAllCars.php>ListAllCars.php</a>
            <br></br>
            <a href=RegistaCondutor.php>RegistaCondutor.php</a>
            <br></br>
            <a href=RegistaCarro.php>RegistaCarro.php</a>
            <br></br>
            <a href=AlteraLocal.php>AlteraLocal.php</a>
              <br></br>
            <a href=AlteraInfo.php>AlteraInfo.php</a>
           
            </body>
            </html>


            <?php
// Pull in the NuSOAP code
            require_once "../lib/nusoap.php";

// Create the client instance
            $client = new nusoap_client("http://192.168.24.128/projeto/Admin.php");
            $client->soap_defencoding = 'UTF-8';

//            $nome = $_GET["nome"];
//            $email = $_GET["email"];
//            $token = $_GET["token"];
//
//
//
//            /*
//              if($nome){
//              echo "<br></br>";
//              echo "Este e o seu nome ".$nome;
//              echo "<br></br>";
//              echo "Este e o seu email ".$email;
//              }
//             */
//            if (isset($nome)) {
//                $result1 = $client->call('Admin.registar', array('nome' => $nome, 'email' => $email));
//                echo $result1;
//            }
//
//            $result1 = $client->call('Admin.validate', array('email' => $email));
//            //print_r($result1);
//
//            if (isset($token)) {
//                $result2 = $client->call('Admin.validate', array('email' => $email));
//                if ($result2 == NULL) {
//
//                    echo "Token não encontrada! Login sem sucesso!";
//                } else if ($token == $result1) {
//                    echo "tokens condizem!";
//                    $login = 1;
//                }
//            }
//
//            if ($login == 1) {
//                echo "<br></br>";
//                echo "Logado!";
////    $nomecondutor=$_GET["nomecondutor"];
////       if(isset($nomecondutor)){
////           $apelidocondutor=$_GET["apelidocondutor"];
////           $horario=$_GET["horariocondutor"];
////           $cartavalidade=$_GET["cartacondutor"];
////           $horario=$_GET["horario"];
////          $resultcondutor=$client->call('Admin.regista_condutor',array('nomecondutor'=>$nomecondutor,'apelidocondutor'=>$apelidocondutor,'validade'=>$cartavalidade,'horas'=>$horas,'horario'=>$horario));
////          echo "<br></br>";
////          print_r($resultcondutor);
////       }
//                $num = $_GET["operacao"];
//                echo $num;
//                switch ($num) {
//                    case "1":
//                        $nomecondutor = $_GET["nomecondutor"];
//                        $apelidocondutor = $_GET["apelidocondutor"];
//                        $horario = $_GET["horariocondutor"];
//                        $cartavalidade = $_GET["cartacondutor"];
//                        $horario = $_GET["horario"];
//                        $resultcondutor = $client->call('Admin.regista_condutor', array('nomecondutor' => $nomecondutor, 'apelidocondutor' => $apelidocondutor, 'validade' => $cartavalidade, 'horas' => $horas, 'horario' => $horario));
//                        echo "<br></br>";
//                        print_r($resultcondutor);
//                        break;
//
//                    case "2":
//                        $matricula = $_GET["matricula"];
//                        $nomecondutor = $_GET["nomec"];
//                        $estado = $_GET["estado"];
//                        $local = $_GET["local"];
//                        $lat = $_GET["lat"];
//                        $long = $_GET["long"];
//                        $cap = $_GET["cap"];
//                        $resultcarro = $client->call('Admin.regista_veiculo', array('matricula' => $matricula, 'nomecondutor' => $nomecondutor, 'estado' => $estado, 'local' => $local, 'lat' => $lat, 'long' => $long, 'cap' => $cap));
//                        echo "<br></br>";
//                        print_r($resultcarro);
//                        break;
//
//                    case "3":
//                        echo 'teste';
//
//                        $results = $client->call('Admin.listAllCars', array());
//                    echo "<pre>";
//                        print_r(($results));
//                    echo "</pre>";
//                    
//                  echo '<img src="'.$results[4]['img'].'" alt="Mountain View" style="width:204px;height:128px;">'; // print_r($results[4]['img']);
//                  
////                  foreach($results as $book){
////                      echo "<br />"."Title:".$book->Array['id']."<br />";
////                  }
//                 
//                }
//
//
////       $matricula=$_GET["matricula"];
////       if(isset($matricula)){
////           $nomecondutor=$_GET["nomec"];
////           $estado=$_GET["estado"];
////            $local=$_GET["local"];
////            $lat=$_GET["lat"];
////            $long=$_GET["long"];
////            $cap=$_GET["cap"];
////            $resultcarro=$client->call('Admin.regista_veiculo',array('matricula'=>$matricula,'nomecondutor'=>$nomecondutor,'estado'=>$estado,'local'=>$local,'lat'=>$lat,'long'=>$long,'cap'=>$cap));
////            echo "<br></br>";
////          
////          print_r($resultcarro);
////       }
//            }



//var_dump($result1);
//$result1= $client->call('Admin.registar',array('token_admin'=>$token,'email_admin'=>$email));
// Check for an error
            $err = $client->getError();
            if ($err) {
                // Display the error
                echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
                // At this point, you know the call that follows will fail
            }
            ?>
            
                