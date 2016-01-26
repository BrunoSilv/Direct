<?php

error_reporting(E_ALL);

/**
 * WS1 - class.Condutor.php
 *
 * $Id$
 *
 * This file is part of WS1.
 *
 * Automatically generated on 09.01.2016, 17:54:08 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include Pessoa
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('./Pessoa.php');

/**
 * include Veiculo
 *
 * @author firstname and lastname of author, <author@example.org>
 */
//require_once('class.Veiculo.php');

/**
 * include Viagem
 *
 * @author firstname and lastname of author, <author@example.org>
 */
//require_once('class.Viagem.php');

/* user defined includes */
// section -64--88--84-1--3bb77b58:15226578a74:-8000:000000000000088F-includes begin
// section -64--88--84-1--3bb77b58:15226578a74:-8000:000000000000088F-includes end

/* user defined constants */
// section -64--88--84-1--3bb77b58:15226578a74:-8000:000000000000088F-constants begin
// section -64--88--84-1--3bb77b58:15226578a74:-8000:000000000000088F-constants end

/**
 * Short description of class Condutor
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class Condutor
    extends Pessoa
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd : 1..*    // generateAssociationEnd : 

    // --- ATTRIBUTES ---

    /**
     * Short description of attribute horas_trabalho
     *
     * @access public
     * @var time
     */
    public $horas_trabalho = null;

    /**
     * Short description of attribute id
     *
     * @access public
     * @var int
     */
    public $id = 0;

    /**
     * Short description of attribute carta
     *
     * @access public
     * @var string
     */
    public $carta = '';

    /**
     * Short description of attribute gestor_id
     *
     * @access public
     * @var int
     */
    public $gestor_id = 0;

    /**
     * Short description of attribute array_veiculos
     *
     * @access public
     * @var Integer
     */
    public $array_veiculos = null;

    // --- OPERATIONS ---

    /**
     * Short description of method horas_trabalho
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return time
     */
    public function horas_trabalho($name)
    {
        $conn = mysqli_connect("127.0.0.1","root","12345","dbws1");
        if($conn==0){
            die ("falha na conexão à BD");
        }
        
        $query = "select horas from condutor where name='.$name';";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        if ($result) {
            
            return $result;
        } else {
            return "não pode Pesquisar";
        }
        
    }
    
    
    public static function teste($name){
        return "Ola";
    }

    /**
     * Short description of method registar
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return string
     */
    public function registar($nomecondutor, $apelido, $horastrabalho, $turno,$emailcondutor)
    {   
       $conn = mysqli_connect("127.0.0.1","root","12345","dbws1");
        if($conn==0){
            die ("falha na conexão à BD");
        }
        
        $tipocarta="B";
        //$query = "insert into condutor (nome,apelido,horas_trabalho,turno,email) values ('" . $nomecondutor . "','" . $apelido . "','" . $horastrabalho . "','" . $turno . "','".$email."');";
        //$result = mysqli_fetch_assoc(mysqli_query($conn, $query));
       $query="INSERT INTO `dbws1`.`condutor` (`nome`, `apelido`, `horas_trabalho`, `turno`, `email`) VALUES ('".$nomecondutor."', '".$apelido."', '".$horastrabalho."', '".$tipocarta."', '".$emailcondutor."');";
       $result=mysqli_query($conn, $query);
         if ($result) {
            return "Registou";
        } else {
           return "não pode registar";
        }
    }

    /**
     * Short description of method _construct
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  nome
     * @param  apelido
     * @param  idade
     * @param  carta
     * @param  gestor_id
     * @return void
     */
    public function __construct($nome, $apelido)
    {
        parent::__construct($nome, $apelido);
//        $this->nome = $nome;
//        $this->apelido= $apelido;
//        $this->email = $email;
//        $this->turno=$turno;
    }

    /**
     * Short description of method registar_viagem
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return void
     */
    public function registar_viagem()
    {
        // section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000923 begin
        // section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000923 end
    }

}/* end of class Condutor */

//echo 'teste';
//$cond=new Condutor("teste","teste");
//var_dump($cond);

?>