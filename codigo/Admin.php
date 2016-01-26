<?php

/**
 * php\gestor.php

 * @author  <author@example.org>
 * @package php
 */

/**
 * include nusoap library
 *
 * @author  <author@example.org>
 */
require_once('./lib/nusoap.php');


/**
 * include class condutor
 *
 * @author  <author@example.org>
 */
//require_once('./Condutor.php');


/**
 * include class person
 *
 * @author  <author@example.org>
 */
//require_once('./Pessoa.php');

/**
 * include class veiculos
 *
 * @author  <author@example.org>
 */
//require_once('./Veiculo.php');

/**
 * class gestor
 *
 * @access public
 * @author  <author@example.org>
 * @package php
 */
class Admin  {
    // --- ASSOCIATIONS ---
    // generateAssociationEnd : veiculos    // generateAssociationEnd : condutor
    // --- ATTRIBUTES ---

    /**
     * atributo token
     *
     * @access private
     * @var String
     */
    private $token = null;

    /**
     * atributo email
     *
     * @access public
     * @var String
     */
    public $email = null;

    public $server = NULL;
    // --- OPERATIONS ---

    public function __construct($nome, $email, $apelido = null) {
//        parent::__construct($nome, $apelido);       
        $this->email=$email;
        $this->server = new nusoap_server();         
    }

    /**
     * method consulta_inf_condutor
     *
     * @access public
     * @author <author@example.org>
     * @return String
     */
    /*public static function consulta_inf_condutor($name) {
        if($name==""){
            return "não pode procurar";
        }
        $conn = mysqli_connect("127.0.0.1","root","12345","dbws1");
        if($conn==0){
            die ("falha na conexão à BD");
        }
   
        $query = "select empresa from gestor where email='.$name';";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        if ($result) {
            return $result;
        } else {
            return "não pode Pesquisar";
        }
    }*/

    /**
     * Short description of method historico_veiculo
     *
     * @access public
     * @author  <author@example.org>
     * @return String
     */
//    public function historico_veiculo() {
//
//    }

    /**
     * method registar: regista um novo gestor e retorna o token
     *
     * @access public
     * @author  <author@example.org>
     * @return String
     */
    public static function registar($nome, $email) {
        if($email==""||$nome==""){
            return "não pode registar";
        }
        $conn = mysqli_connect("127.0.0.1","root","12345","dbws1");
        if($conn==0){
            return "falha na conexão à BD";
        }

        $token = sha1($email);
        $query = "insert into gestor (email,token,empresa) values ('" . $email . "','" . $token . "','" . $nome . "')";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        if ($result) {
            return $token;
        } else {
            return "não pode registar";
        }
    }
    
    public static function registarUser($nome, $email) {
        if($email==""||$nome==""){
            return "não pode registar";
        }
        $conn = mysqli_connect("127.0.0.1","root","12345","dbws1");
        if($conn==0){
            return "falha na conexão à BD";
        }

        $token = sha1($email);
        $query = "insert into user (email,token,nome) values ('" . $email . "','" . $token . "','" . $nome . "')";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
            return $token;   
    }

    /**
     * method regista_condutor: regista um novo condutor
     *
     * @access public
     * @author  <author@example.org>
     * @return String
     **/
   public static function regista_condutor($token,$email,$emailcondutor,$nomecondutor,$apelido,$turno) {
       
      $result= Admin::validate($token, $email);
      if($result==$token){
          //$condutor=new Condutor($nomecondutor, $apelido, $emailcondutor, $turno);
          //          $horastrabalho=0;
          //          $condutor->registar($nomecondutor, $apelido, $horastrabalho, $turno, $emailcondutor);
        $conn = mysqli_connect("127.0.0.1","root","12345","dbws1");
        if($conn==0){
            die ("falha na conexão à BD");
        }
        $horastrabalho=0;
        $query = "insert into condutor (nome,apelido,horas_trabalho,turno,email) values ('" . $nomecondutor . "','" . $apelido . "','" . $horastrabalho . "','" . $turno . "','".$email."');";
        //$result = mysqli_fetch_assoc(mysqli_query($conn, $query));
       $query="INSERT INTO `dbws1`.`condutor` (`nome`, `apelido`, `horas_trabalho`, `turno`, `email`) VALUES ('".$nomecondutor."', '".$apelido."', '".$horastrabalho."', '".$turno."', '".$emailcondutor."');";
       $result=mysqli_query($conn, $query);
         if ($result) {
            return "Registou";
        } else {
           return "não pode registar";
        }
        }
      return $result;
    }

    /**
     * method getId: retorna o ID do gestor através do email
     *
     * @access public
     * @author  <author@example.org>
     * @return int (Retorna 0 se o email e o token não coincidirem com o gestor e 1 se coincidir)
     */
    public static function getID($email){
        $conn = mysqli_connect("127.0.0.1","root","12345","dbws1");
        if($conn==0){
            die ("falha na conexão à BD");
        }

        $query = "select id from gestor where email='" . $email . "';";
        $result = mysqli_fetch_assoc(mysqli_query($conn, $query));

        mysqli_close($conn);
        return ($result[id]);
    }

    /**
     * method validate: verifica a autenticacao do gestor
     *
     * @access private
     * @author <author@example.org>
     * @return int (Retorna 0 se o email e o token não coincidirem com o gestor e 1 se coincidir)
     */
    private static function validate($token,$email){
//        $conn = mysqli_connect("127.0.0.1","root","12345","dbws1");
//        if($conn==0){
//            die ("falha na conexão à BD");
//        }
        
        $conn = Admin::connection();
        $query =  "select token from gestor where email='" . $email . "';";
        $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
        mysqli_close($conn);
        if($token==$result[token]){
            return $token;
        }else{
            return "Nao validou";
        }
        
    }
    
    private static function validateUser($email,$token){
        $conn = Admin::connection();
        
        $query =  "select token from user where email='" . $email . "';";
        $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
        mysqli_close($conn);
         if($token==$result[token]){
            return $token;
        }else{
            return "Nao validou";
        }
    }
    
    public static function testa($nome){
        $conn = mysqli_connect("127.0.0.1","root","12345","dbws1");
        if($conn==0){
            die ("falha na conexão à BD");
        }

        $query =  "select email from gestor where empresa='" . $nome . "';";
        $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
        mysqli_close($conn);
       
        return ($result[email]);
    }
    
    public static function novalocal($token,$email,$id,$lat,$long,$local){
        
        $s=Admin::validate($token, $email);
        
        if($s==$token){
            
            $conn=Admin::connection();
            $query="UPDATE `dbws1`.`veiculo` SET `localidade`='".$local."', `lat`='".$lat."', `long`='".$long."' WHERE `id`='".$id."';";
        $result = mysqli_query($conn, $query);
        if($result){
        return "Alterado com sucesso!";
        }else{
            return "Falhou";
        }
       
        
    }
    }

    /**
     * Short description of method actualiza_inf_condutor
     *
     * @access public
     * @author  <author@example.org>
     * @return void
     */
    public function actualiza_inf_condutor($campo,$novo,$id) {
        $conn = mysqli_connect("127.0.0.1","root","12345","dbws1");
        if($conn==0){
            die ("falha na conexão à BD");
        }

        $query =  "UPDATE condutor SET '".$campo."'='".$novo."' WHERE id='".$id. "';";
        $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
        mysqli_close($conn);
       
        return ($result[email]);
        
       

    }

    /**
     * Short description of method actualiza_inf_veiculo
     *
     * @access public
     * @author , <author@example.org>
     * @return void
     */
//    public function actualiza_inf_veiculo() {
//
//    }

    /**
     * Short description of method actualiza_localizacao
     *
     * @access public
     * @author <author@example.org>
     * @return void
     */
    public function actualiza_localizacao($lat, $lon, $hora, $viagem_id) {
        $local = new Localizacao($lat, $lon, $hora);
        $local->inserir_localizacao($viagem_id);
    }

    /**
     * Short description of method pesquisa_veiculos
     *
     * @access public
     * @author <author@example.org>
     * @return void
     */
    /*public function pesquisa_veiculos() {

    }*/

    /**
     * Short description of method get_email
     *
     * @access public
     * @author <author@example.org>
     * @return String
     */
    public function get_email() {
        return $this->email;
    }

    /**
     * Short description of method set_email
     *
     * @access public
     * @author <author@example.org>
     * @return void
     */
    public function set_email($email) {
        $this->email = $email;
    }

    /**
     * method reserva_veiculo: reserva um veiculo para uma nova viagem
     *
     * @access public
     * @author  <author@example.org>
     * @return String
     */
    public static function reserva_viagem($email,$token,$id,$locali,$localfin){
//        echo "teste1";
        $valida=Admin::validateUser($email,$token);
        if($valida==$token){
            $conn=Admin::connection();
            $queryteste="select estado from veiculo where id=".$id.";";
            $estcarroatual= mysqli_fetch_assoc(mysqli_query($conn,$queryteste));
            
           // echo $estcarroatual[estado];
            
            if($estcarroatual[estado]=="Livre"){
                
            
            
//         echo "Sua token".$valida;
            
            
            $query1="select matricula from veiculo where id='".$id."';";
//            echo $query1;
            $result= mysqli_fetch_assoc(mysqli_query($conn,$query1));
            $matricula=$result[matricula];
//            echo $matricula;
            $query2="select nomecondutor from veiculo where id='".$id."' ";
//            echo $query2;
            $result3= mysqli_fetch_assoc(mysqli_query($conn,$query2));
            $nomecondutor=$result3[nomecondutor];
//            echo $nomecondutor;
//            echo $localfin;
//            echo $locali;
//            echo $id;
            $estado='Pendente';
            $preco= Admin::calculapreco($locali,$localfin);
//            echo "<br>";
//            echo $preco;
//            echo "<br>";
                $result = "";
    $chars = "abcdefghijklmnopqrstuvwxyz$_?!-0123456789";
    $charArray = str_split($chars);
    for($i = 0; $i < 10; $i++){
	    $randItem = array_rand($charArray);
	    $resultrand .= "".$charArray[$randItem];
    }
   
    
    
            $result = mysqli_query($conn, $query);
            $query= "INSERT INTO `dbws1`.`viagem` (`matricula`, `nomecondutor`, `ini`, `fim`, `user`, `estado`, `preco`,`token`) VALUES ('".$matricula."', '".$nomecondutor."', '".$locali."', '".$localfin."', '".$email."', '".$estado."', '".$preco."', '".$resultrand."');";
            
        $result = mysqli_query($conn, $query);
        
        $atualizaestadocondutor= "UPDATE `dbws1`.`veiculo` SET `estado`='Ocupado' WHERE `id`='".$id."';";
        $resultestado = mysqli_query($conn, $atualizaestadocondutor);
        
        $ultima="select preco from viagem where token='".$resultrand."';";
        $retu = mysqli_fetch_assoc(mysqli_query($conn, $ultima));
 
       mysqli_close($conn);
        return $resultrand;
        }
        }
        if($estcarroatual[estado]=='Ocupado'){
        
            return "OCUPADO!!!";
        }
        
       
        return "nao validou";
    }
    
     public static function calculapreco($locali,$localfin){
         
         $url ="https://maps.googleapis.com/maps/api/geocode/json?address='".$locali."'&key=AIzaSyDHRTOa0Qh0eq1JTJCRpkn_2Xkv-xgWvlg";
	     $contents=file_get_contents($url);
	     $results=json_decode($contents);
           
             $lati=$results->results[0]->geometry->location->lat;
             
             
             $url ="https://maps.googleapis.com/maps/api/geocode/json?address='".$localfin."'&key=AIzaSyDHRTOa0Qh0eq1JTJCRpkn_2Xkv-xgWvlg";
	     $contents=file_get_contents($url);
	     $results=json_decode($contents);
          $latf=$results->results[0]->geometry->location->lat;
              
          $lat=$lati-$latf;
          if($lat>0){
              return $lat*10;
          }else{
              return -($lat*10);
          }
         
     }

    /**
     * method registar_veiculo: regista um novo veiculo
     *
     * @access public
     * @author <author@example.org>
     * @return String
     */
    public function regista_veiculo($token,$email,$matricula,$idc,$estado,$local,$lat,$long,$cap,$img) {
        /*
        $veiculo = new veiculos($matricula,$estado,$manutencao);

        if($veiculo->registar()){
            return 'veiculo registado com sucesso';
        }else{
            return 'veiculo nao pode ser registado';
        }*/
        //$idcc=64;
        $autent=Admin::validate($token, $email);
        if($autent==$token){
        $nomecondutor= Admin::findNameCondutor($idc);
         $conn = mysqli_connect("127.0.0.1","root","12345","dbws1");
        if($conn==0){
            die ("falha na conexão à BD");
        }
        
        $query ="INSERT INTO `dbws1`.`veiculo` (`nomecondutor`, `localidade`, `estado`, `matricula`, `lat`, `long`, `capacidade`,`img`) VALUES ('" . $nomecondutor . "', '" . $local . "', '" . $estado . "', '" . $matricula . "', '" . $lat . "', '" . $long . "', '" . $cap . "', '" . $img . "');";
        $result = mysqli_query($conn, $query);
        if($result){
            
            return "Registado com sucesso";
        }else {
            return "Sem sucesso!";
        }
        }
          
    }
    
      public static function findNameCondutor($idc){
        $conn = mysqli_connect("127.0.0.1","root","12345","dbws1");
        if($conn==0){
            die ("falha na conexão à BD");
        }
        $query="SELECT nome FROM dbws1.condutor where id='".$idc."';";
        $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
        
        return $result[nome];
            
    }

    /**
     * Short description of method updateEmpresa
     *
     * @access public
     * @author <author@example.org>
     * @return String
     */
    public function updateEmpresa($email, $novaEmpresa) {
//        $conn = mysqli_connect("127.0.0.1","root","12345","dbws1");
//        if($conn==0){
//            die ("falha na conexão à BD");
//        }
        $conn = Admin::connection();
        $query="UPDATE `dbws1`.`gestor` SET `empresa`='".$novaEmpresa."' WHERE `email`='".$email."';";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
     
    }
    
    public static function connection(){
        $conn = mysqli_connect("127.0.0.1","root","12345","dbws1");
        if($conn==0){
            die ("falha na conexão à BD");
        }
        return $conn;
 
    }

    /**
     * method getGestorByEmail: retorna o gestor atraves do email
     *
     * @access public
     * @author  <author@example.org>
     * @return array
     */
    public static function getGestorByEmail($email) {
        $conn = mysqli_connect("127.0.0.1","root","12345","dbws1");
        if($conn==0){
            die ("falha na conexão à BD");
        }

        $query = "select * from gestor where email='" . $email . "';";
        $result = mysqli_query($conn, $query);
//        $gestor = array('gestor' => array());
        while ($row = mysqli_fetch_assoc($result)) {
            $gestor[] = array('id' => $row['id'], 'email' => $row['email'], 'token' => $row['token'], 'empresa' => $row['empresa']);
        }

        mysqli_close($conn);
        return $gestor;
    }

    /**
     * method getLocalizacaoQuadrado: retorna os veiculos livres
     *
     * @access public
     * @author <author@example.org>
     * @return array
     */
    public static function getLocalizacaoQuadrado($lat, $lon, $variacao) {
       /* $conn = mysqli_connect("127.0.0.1","root","12345","dbws1");
        if($conn==0){
            die ("falha na conexão à BD");
        }
        $query = "select matricula from veiculo where estado= and lat_actual < '" . floatval($lat) + floatval($variacao) . "' and lat_actual >'" . floatval($lat) - floatval($variacao) . "' and lon_actual < '" . floatval($lon) + floatval($variacao) . "' and lon_actual > '" . floatval($lon) - floatval($variacao) . "'";

        $result = mysqli_query($conn, $query);
        mysqli_close($conn);

        while ($row = mysqli_fetch_assoc($result)) {
            $veiculos[] = array('matricula' => $row['matricula']);
        }
        return $veiculos;*/
    }

    /**
     * method listAll: lista todos os gestores registados
     *
     * @access public
     * @author  <author@example.org>
     * @return array
     */
    public function listAll() {
        $conn = mysqli_connect("127.0.0.1","root","12345","dbws1");
        if($conn==0){
            die ("falha na conexão à BD");
        }

        $query = "select * from gestor";
        $result = mysqli_query($conn, $query);
        $gestor = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $gestor[] = $row;
        }

        mysqli_close($conn);
        return $gestor;
    }
    
    public function listAllCars($token,$email) {
        
        $resultado=Admin::validate($token,$email);
       if($token==$resultado){
        $conn = Admin::connection();
        $query = "select * from veiculo;";
        $result = mysqli_query($conn, $query);
        
        while ($row = mysqli_fetch_assoc($result)) {
            //$veiculos[]=array('idveiculo'=> $row['idveiculo'], 'matricula' =>$row['matricula'], 'marca'=>$row['marca'],'capacidade'=>$row['capacidade'],'kms'=>$row['kms']);
            $veiculo[] = array('id' => $row['id'], 'nomecondutor' => $row['nomecondutor'], 'localidade' => $row['localidade'], 'estado' => $row['estado'], 'matricula' => $row['matricula'], 'lat' => $row['lat'], 'long' => $row['long'], 'capacidade' => $row['capacidade'],'img'=> $row['img']);
        }
        mysqli_close($conn);
        return $veiculo;
       }
       else{
           return "Nao validou";
       }
      
    }
    
    public static function alterainfo($token,$email,$tabela,$campo,$valor,$id){
        $resultado=Admin::validate($token,$email);
        if($token==$resultado){
        $conn= Admin::connection();
       // $query = "UPDATE `dbws1`.`".$tabela."` SET `".$campo."`='".$value."' WHERE `id`='".$id."';";
        //$query="select id from veiculo where nomecondutor='Pinito';";
        $query="UPDATE `dbws1`.`".$tabela."` SET `".$campo."`='".$valor."' WHERE `id`='".$id."';";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        
        if($result){
            return "Alterado com sucesso!";
            
        }else{
            return "Nao alterado!";
        }
            
        
        
        }
        
        return "nao validado!";
    }


    
    public function ListAllCarsUser($lat,$long) {
        
        $conn = mysqli_connect("127.0.0.1","root","12345","dbws1");
        if($conn==0){
            die ("falha na conexão à BD");
        }
        $var=1.2;
        $latsuperior=$lat+$var;
        $latinferior=$lat-$var;
        $lonsuperior=$long+$var;
        $loninferior=$long-$var;
        
//        echo $lat;
//        echo "<br>";
//        echo $long;
//        echo "<br>";
//        echo $latsuperior;
//        echo "<br>";
//        echo $latinferior;
//        echo "<br>";
//        echo $lonsuperior;
//        echo "<br>";
//        echo $loninferior;
//        echo "<br>";
//        echo $var;
        
        $query = "select * from veiculo where estado='Ocupado' and lat<'".$latsuperior."' and lat>'".$latinferior."' and veiculo.long<'".$lonsuperior."' and veiculo.long>'".$loninferior."' ;";
//        echo $query;
        $result = mysqli_query($conn, $query);
        
        while ($row = mysqli_fetch_assoc($result)) {
            //$veiculos[]=array('idveiculo'=> $row['idveiculo'], 'matricula' =>$row['matricula'], 'marca'=>$row['marca'],'capacidade'=>$row['capacidade'],'kms'=>$row['kms']);
            $veiculo[] = array('id' => $row['id'], 'nomecondutor' => $row['nomecondutor'], 'localidade' => $row['localidade'], 'estado' => $row['estado'], 'matricula' => $row['matricula'], 'lat' => $row['lat'], 'long' => $row['long'], 'capacidade' => $row['capacidade']);
        }

        mysqli_close($conn);
        return $veiculo;
    }
    
    
    public static function testeme($string){
       $novocondutor= new Condutor("Pedro", "galohca", "", "");
      $result=$novocondutor->teste("Pedro");
  
        return "peedrito";
        
    }
    
    
    

    // Register the method to expose
    public function registerMethod($nameMethod) {
        $this->server->register($nameMethod);
    }

    // Use the request to (try to) invoke the service
    public function processRequest() {
        $this->server->service($GLOBALS['HTTP_RAW_POST_DATA']);
    }

}

$namespace = "http://192.168.24.128/projeto/Admin.php";

$ws = new Admin("","","");
$ws->registerMethod('Admin.registar');
$ws->registerMethod('Admin.testa');
$ws->registerMethod('Admin.regista_condutor');
$ws->registerMethod('Admin.validate');
$ws->registerMethod('Admin.updateEmpresa');
$ws->registerMethod('Admin.getGestorByEmail');
$ws->registerMethod('Admin.listAll');
$ws->registerMethod('Admin.get_email');
$ws->registerMethod('Admin.regista_veiculo');
$ws->registerMethod('Admin.reserva_viagem');
$ws->registerMethod('Admin.registarUser');
$ws->registerMethod('Admin.listAllCars');
$ws->registerMethod('Admin.validateUser');
$ws->registerMethod('Admin.ListAllCarsUser');
$ws->registerMethod('Admin.testeme');
$ws->registerMethod('Admin.novalocal');
$ws->registerMethod('Admin.alterainfo');



$ws->server->configureWSDL('projectWS1', 'urn:projectWS1wsdl');
$ws->server->wsdl->schemaTargetNamespace = $namespace;

$ws->server->wsdl->addComplexType('query', 'complexType', 'array', 'sequence', '', array('result' => array('name' => 'result', 'type' => 'xsd:string')));

//register webservice documentation
$ws->server->register('Admin.registar', // method name
    array('nome' => 'xsd:string', 'email'=> 'xsd:string'), // input parameters
    array('result' => 'xsd:string'), // output parameters
    'urn:projectWS1', // namespace
    'urn:projectWS1wsdl#registar', // soapaction
    'rpc', // style
    'encoded', // use
    'regista um novo gestor'            // documentation
);

$ws->server->register('Admin.registarUser', // method name
    array('nome' => 'xsd:string', 'email'=> 'xsd:string'), // input parameters
    array('result' => 'xsd:string'), // output parameters
    'urn:projectWS1', // namespace
    'urn:projectWS1wsdl#registar', // soapaction
    'rpc', // style
    'encoded', // use
    'regista um novo user'            // documentation
);
$ws->server->register('Admin.findNameCondutor', // method name
    array('idc' => 'xsd:string'), // input parameters
    array('nome' => 'xsd:string'), // output parameters
    'urn:projectWS1', // namespace
    'urn:projectWS1wsdl#registar', // soapaction
    'rpc', // style
    'encoded', // use
    'regista um novo user'            // documentation
);


$ws->server->register('Admin.listAllCars', // method name
    array('token'=>'xsd:string','email'=>'xsd:string'), // input parameters
    array('result' => 'tns:query'), // output parameters
    'urn:projectWS1', // namespace
    'urn:projectWS1wsdl#registar', // soapaction
    'rpc', // style
    'encoded', // use
    'regista um novo gestor'            // documentation
);

        
        $ws->server->register('Admin.ListAllCarsUser', // method name
    array('lat'=>'xsd:float','long'=>'xsd:float'), // input parameters
    array('result' => 'tns:query'), // output parameters
    'urn:projectWS1', // namespace
    'urn:projectWS1wsdl#registar', // soapaction
    'rpc', // style
    'encoded', // use
    'regista um novo gestor'            // documentation
);

$ws->server->register('Admin.testa', // method name
    array('empresa' => 'xsd:string'), // input parameters
    array('result' => 'xsd:string'), // output parameters
    'urn:projectWS1', // namespace
    'urn:projectWS1wsdl#testa', // soapaction
    'rpc', // style
    'encoded', // use
    'regista um novo gestor'            // documentation
);

$ws->server->register('Admin.validate', // method name
    array('email' => 'xsd:string'), // input parameters
    array('result' => 'xsd:string'), // output parameters
    'urn:projectWS1', // namespace
    'urn:projectWS1wsdl#registar', // soapaction
    'rpc', // style
    'encoded', // use
    'regista um novo gestor'            // documentation
); 

$ws->server->register('Admin.validateUser', // method name
    array('email' => 'xsd:string'), // input parameters
    array('result' => 'xsd:string'), // output parameters
    'urn:projectWS1', // namespace
    'urn:projectWS1wsdl#registar', // soapaction
    'rpc', // style
    'encoded', // use
    'regista um novo gestor'            // documentation
); 


$ws->server->register('Admin.regista_condutor', // method name
    array('token'=>'xsd:string','email' => 'xsd:string','emailcondutor'=>'xsd:string','nomecondutor' => 'xsd:string', 'apelido' => 'xsd:string','turno' => 'xsd:string'), // input parameters
    array('return' => 'xsd:string'), // output parameters
    'urn:projectWS1', // namespace
    'urn:projectWS1wsdl#regista_condutor', // soapaction
    'rpc', // style
    'encoded', // use
    'regista um novo condutor'            // documentation
);

$ws->server->register('Admin.getID', // method name
    array('email' => 'xsd:string'), // input parameters
    array('return' => 'xsd:integer'), // output parameters
    'urn:projectWS1', // namespace
    'urn:projectWS1wsdl#getUserQuery', // soapaction
    'rpc', // style
    'encoded', // use
    'retorna o ID do gestor'            // documentation
);

$ws->server->register('Admin.updateEmpresa', // method name
    array('email' => 'xsd:string', 'novaEmpresa' => 'xsd:string'), // input parameters
    array('return' => 'xsd:string'), // output parameters
    'urn:projectWS1', // namespace
    'urn:projectWS1wsdl#getUserQuery', // soapaction
    'rpc', // style
    'encoded', // use
    'actualiza o nome da empresa'            // documentation
);

$ws->server->register('Admin.getGestorByEmail', // method name
    array('email' => 'xsd:string'), // input parameters
    array('return' => 'tns:query'), // output parameters
    'urn:projectWS1', // namespace
    'urn:projectWS1wsdl#getUserQuery', // soapaction
    'rpc', // style
    'encoded', // use
    'retorna o gestor através do email'            // documentation
);



$ws->server->register('Admin.get_email', // method name
    array(), // input parameters
    array('return' => 'xsd:string'), // output parameters
    'urn:projectWS1', // namespace
    'urn:projectWS1wsdl#getUserQuery', // soapaction
    'rpc', // style
    'encoded', // use
    'retorna o email'            // documentation
);

$ws->server->register('Admin.regista_veiculo', // method name
    array('token'=>'xsd:string','email' => 'xsd:string','matricula' => 'xsd:string', 'nomecondutor' => 'xsd:string','estado' => 'xsd:string','local' => 'xsd:string','lat' => 'xsd:string','long' => 'xsd:string','cap' => 'xsd:string','img'=> 'xsd:string'), // input parameters
    array('return' => 'xsd:string'), // output parameters
    'urn:projectWS1', // namespace
    'urn:projectWS1wsdl#getUserQuery', // soapaction
    'rpc', // style
    'encoded', // use
    'regista um novo veiculo'            // documentation
);

$ws->server->register('Admin.testeme', // method name
    array('string'=>'xsd:string'), // input parameters
    array('return' => 'xsd:string'), // output parameters
    'urn:projectWS1', // namespace
    'urn:projectWS1wsdl#getUserQuery', // soapaction
    'rpc', // style
    'encoded', // use
    'regista um novo veiculo'            // documentation
);

$ws->server->register('Admin.reserva_viagem', // method name
    array('email' => 'xsd:string','token' => 'xsd:string', 'id' => 'xsd:string','locali' => 'xsd:string','localf' => 'xsd:string',), // input parameters
    array('return' => 'xsd:string'), // output parameters
    'urn:projectWS1', // namespace
    'urn:projectWS1wsdl#getUserQuery', // soapaction
    'rpc', // style
    'encoded', // use
    'reserva um veiculo para uma nova viagem'            // documentation
);

$ws->server->register('Admin.novalocal', // method name
    array('token'=>'xsd:string','email'=>'xsd:string','id' => 'xsd:string', 'lat' => 'xsd:string','long' => 'xsd:string','local' => 'xsd:string'), // input parameters
    array('return' => 'xsd:string'), // output parameters
    'urn:projectWS1', // namespace
    'urn:projectWS1wsdl#getUserQuery', // soapaction
    'rpc', // style
    'encoded', // use
    'reserva um veiculo para uma nova viagem'            // documentation
);

$ws->server->register('Admin.alterainfo', // method name
    array('token'=>'xsd:string','email'=>'xsd:string','tabela' => 'xsd:string','campo' => 'xsd:string', 'valor' => 'xsd:string','id' => 'xsd:string'), // input parameters
    array('return' => 'xsd:string'), // output parameters
    'urn:projectWS1', // namespace
    'urn:projectWS1wsdl#getUserQuery', // soapaction
    'rpc', // style
    'encoded', // use
    'reserva um veiculo para uma nova viagem'            // documentation
);


$ws->processRequest();

/* end of class gestor */
//echo 'teste';
//$result=$ws->ListAllCarsUser(40.0,-8.0);
//echo "<pre>";
//var_dump($result);
//echo "</pre>";

//$result=$ws->reserva_viagem("pg@gmail.com","4d6b69d312979e68b44df235d837997494eaaa26", "49", "Porto", "Lisboa");
//
//echo "teste";
?>
