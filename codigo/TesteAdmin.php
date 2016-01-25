
<!DOCTYPE html>
<html>
    <body>
        <form action="TesteAdmin.php" method="get">
            <a href="url">192.168.24.128/projeto/ListAllCars.php</a>
            <a href="url">192.168.24.128/projeto/RegistaCondutor.php</a>
            <p>registar_Admin</p>
            name: <input type="nome" name="nome" value=<?php echo $_GET["nome"] ?> >
            Email: <input type="email" name="email" value=<?php echo $_GET["email"] ?> >
            TOken: <input type="token" name="token" value=<?php echo $_GET["token"] ?> >
            <input type="submit"> 
            <br></br>
            <input type="radio" name="operacao" value="1">Registar Condutor<br>
            <input type="radio" name="operacao" value="2">Registar veiculo<br>
            <input type="radio" name="operacao" value="3">Listar todos carros Livres<br>

            </body>
            </html>


            <?php
// Pull in the NuSOAP code
            require_once "../lib/nusoap.php";

// Create the client instance
            $client = new nusoap_client("http://192.168.24.128/projeto/Admin.php");
            $client->soap_defencoding = 'UTF-8';

            $nome = $_GET["nome"];
            $email = $_GET["email"];
            $token = $_GET["token"];



            /*
              if($nome){
              echo "<br></br>";
              echo "Este e o seu nome ".$nome;
              echo "<br></br>";
              echo "Este e o seu email ".$email;
              }
             */
            if (isset($nome)) {
                $result1 = $client->call('Admin.registar', array('nome' => $nome, 'email' => $email));
                echo $result1;
            }

            $result1 = $client->call('Admin.validate', array('email' => $email));
            //print_r($result1);

            if (isset($token)) {
                $result2 = $client->call('Admin.validate', array('email' => $email));
                if ($result2 == NULL) {

                    echo "Token não encontrada! Login sem sucesso!";
                } else if ($token == $result1) {
                    echo "tokens condizem!";
                    $login = 1;
                }
            }

            if ($login == 1) {
                echo "<br></br>";
                echo "Logado!";
//    $nomecondutor=$_GET["nomecondutor"];
//       if(isset($nomecondutor)){
//           $apelidocondutor=$_GET["apelidocondutor"];
//           $horario=$_GET["horariocondutor"];
//           $cartavalidade=$_GET["cartacondutor"];
//           $horario=$_GET["horario"];
//          $resultcondutor=$client->call('Admin.regista_condutor',array('nomecondutor'=>$nomecondutor,'apelidocondutor'=>$apelidocondutor,'validade'=>$cartavalidade,'horas'=>$horas,'horario'=>$horario));
//          echo "<br></br>";
//          print_r($resultcondutor);
//       }
                $num = $_GET["operacao"];
                echo $num;
                switch ($num) {
                    case "1":
                        $nomecondutor = $_GET["nomecondutor"];
                        $apelidocondutor = $_GET["apelidocondutor"];
                        $horario = $_GET["horariocondutor"];
                        $cartavalidade = $_GET["cartacondutor"];
                        $horario = $_GET["horario"];
                        $resultcondutor = $client->call('Admin.regista_condutor', array('nomecondutor' => $nomecondutor, 'apelidocondutor' => $apelidocondutor, 'validade' => $cartavalidade, 'horas' => $horas, 'horario' => $horario));
                        echo "<br></br>";
                        print_r($resultcondutor);
                        break;

                    case "2":
                        $matricula = $_GET["matricula"];
                        $nomecondutor = $_GET["nomec"];
                        $estado = $_GET["estado"];
                        $local = $_GET["local"];
                        $lat = $_GET["lat"];
                        $long = $_GET["long"];
                        $cap = $_GET["cap"];
                        $resultcarro = $client->call('Admin.regista_veiculo', array('matricula' => $matricula, 'nomecondutor' => $nomecondutor, 'estado' => $estado, 'local' => $local, 'lat' => $lat, 'long' => $long, 'cap' => $cap));
                        echo "<br></br>";
                        print_r($resultcarro);
                        break;

                    case "3":
                        echo 'teste';

                        $results = $client->call('Admin.listAllCars', array());
                    echo "<pre>";
                        print_r(($results));
                    echo "</pre>";
                    
                  echo '<img src="'.$results[4]['img'].'" alt="Mountain View" style="width:204px;height:128px;">'; // print_r($results[4]['img']);
                  
//                  foreach($results as $book){
//                      echo "<br />"."Title:".$book->Array['id']."<br />";
//                  }
                 
                }


//       $matricula=$_GET["matricula"];
//       if(isset($matricula)){
//           $nomecondutor=$_GET["nomec"];
//           $estado=$_GET["estado"];
//            $local=$_GET["local"];
//            $lat=$_GET["lat"];
//            $long=$_GET["long"];
//            $cap=$_GET["cap"];
//            $resultcarro=$client->call('Admin.regista_veiculo',array('matricula'=>$matricula,'nomecondutor'=>$nomecondutor,'estado'=>$estado,'local'=>$local,'lat'=>$lat,'long'=>$long,'cap'=>$cap));
//            echo "<br></br>";
//          
//          print_r($resultcarro);
//       }
            }



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
            <h1>Mostrar Carros</h1>
            <p>Listar_carros()</p>
            <form action="TesteAdmin.php" method="get">
                <input type="submit">
                <h1>Inserir</h1>
                <p>registar_condutor()</p>
                <form action="TesteAdmin.php" method="get">
                    Nome: <input type="nomecondutor" name="nomecondutor" value=<?php echo $_GET["nomecondutor"] ?> >
                    Apelido: <input type="apelidocondutor" name="apelidocondutor" value=<?php echo $_GET["apelidocondutor"] ?> >
                    Horario:<input type="horario" name="horario" value=<?php echo $_GET["horario"] ?>>
                    Carta: <input type="cartacondutor" name="cartacondutor" value=<?php echo $_GET["cartacondutor"] ?> >
                    <input type="submit"> 
                    <br>
                    <br>

                    <h1>Inserir</h1>
                    <p>registar_carro()</p>
                    <form action="TesteAdmin.php" method="get">
                        Matricula: <input type="matricula" name="matricula" value=<?php echo $_GET["matricula"] ?> >
                        nomecondutor: <input type="nomec" name="nomec" value=<?php echo $_GET["nomec"] ?> >
                        estado:<input type="estado" name="estado" value=<?php echo $_GET["estado"] ?>>
                        localizaçao: <input type="local" name="local" value=<?php echo $_GET["local"] ?> >
                        capacidade: <input type="cap" name="cap" value=<?php echo $_GET["cap"] ?> >
                        lat: <input type="lat" name="lat" value=<?php echo $_GET["lat"] ?> >
                        long: <input type="long" name="long" value=<?php echo $_GET["long"] ?> >
                        <input type="submit"> 
                        <br>
                        <br>