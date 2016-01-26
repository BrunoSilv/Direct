
<!DOCTYPE html>
<html>
    <body>
      <h1>MENU ADMIN()</h1>  
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


            $err = $client->getError();
            if ($err) {
                // Display the error
                echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
                // At this point, you know the call that follows will fail
            }
            ?>
            
                