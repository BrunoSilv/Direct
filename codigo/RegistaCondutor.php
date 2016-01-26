<form action="RegistaCondutor.php" method="get">
     Email: <input type="email" name="email" value=<?php echo $_GET["email"] ?> >
                        Token: <input type="token" name="token" value=<?php echo $_GET["token"] ?> >
                <h1>Inserir novo Condutor</h1>
                <p>registar_condutor()</p>
                <form action="RegistarCondutor.php" method="get">
                    Nome: <input type="nomecondutor" name="nomecondutor" value=<?php echo $_GET["nomecondutor"] ?> >
                    Apelido: <input type="apelidocondutor" name="apelidocondutor" value=<?php echo $_GET["apelidocondutor"] ?> >
                    Horario:<input type="horario" name="horario" value=<?php echo $_GET["horario"] ?>>
                    Carta: <input type="cartacondutor" name="cartacondutor" value=<?php echo $_GET["cartacondutor"] ?> >
                    Email: <input type="emailcondutor" name="emailcondutor" value=<?php echo $_GET["emailcondutor"] ?> >
                    <input type="submit"> 
                    <br>
                    <br>

<?php


 require_once "../lib/nusoap.php";
 $client = new nusoap_client("http://192.168.24.128/projeto/Admin.php");
 $client->soap_defencoding = 'UTF-8';
 
 $token=$_GET["token"];
 $email=$_GET["email"];
 
 if(isset($token)){
                        $nomecondutor = $_GET["nomecondutor"];
                        $apelidocondutor = $_GET["apelidocondutor"];
                        $horario = $_GET["horariocondutor"];
                        
                        $horario = $_GET["horario"];
                        $emailcondutor = $_GET["emailcondutor"];
                        $resultcondutor = $client->call('Admin.regista_condutor', array('token'=>$token,'email'=>$email,'emailcondutor'=>$emailcondutor,'nomecondutor' => $nomecondutor, 'apelidocondutor' => $apelidocondutor,'horario' => $horario));
                        echo "<br></br>";
                        echo $resultcondutor;
                        echo "<br></br>";

 }
?>