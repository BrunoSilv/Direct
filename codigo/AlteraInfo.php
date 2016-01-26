<h1>Alterar um tipo de dado</h1>
                    <p>AlteraInfo()</p>
                    <form action="AlteraInfo.php" method="get">
                        Email: <input type="email" name="email" value=<?php echo $_GET["email"] ?> >
                        Token: <input type="token" name="token" value=<?php echo $_GET["token"] ?> >
                        <br></br>
                        id: <input type="id" name="id" value=<?php echo $_GET["id"] ?> >
                        tabela: <input type="tabela" name="tabela" value=<?php echo $_GET["tabela"] ?> >
                        campo: <input type="campo" name="campo" value=<?php echo $_GET["campo"] ?> >
                        valor: <input type="valor" name="valor" value=<?php echo $_GET["valor"] ?> >
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
                         $id= $_GET["id"];
                        $tabela=$_GET["tabela"];
                        $campo=$_GET["campo"];
                        $valor=$_GET["valor"];
                        
                        $resultcarro = $client->call('Admin.alterainfo', array('token'=>$token,'email'=>$email,'tabela' => $tabela, 'campo' => $campo,'valor'=>$valor, 'id' => $id));
                       echo "<br></br>";
                       print_r($resultcarro);
                       
 }



?>