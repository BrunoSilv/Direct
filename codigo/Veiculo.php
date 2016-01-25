<?php

error_reporting(E_ALL);

/**
 * WS1 - class.Veiculo.php
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
 * include Condutor
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.Condutor.php');

/**
 * include Viagem
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.Viagem.php');

/* user defined includes */
// section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000890-includes begin
// section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000890-includes end

/* user defined constants */
// section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000890-constants begin
// section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000890-constants end

/**
 * Short description of class Veiculo
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class Veiculo
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd :     // generateAssociationEnd : 

    // --- ATTRIBUTES ---

    /**
     * Short description of attribute estado
     *
     * @access public
     * @var boolean
     */
    public $estado = false;

    /**
     * Short description of attribute capacidade
     *
     * @access public
     * @var int
     */
    public $capacidade = 0;

    /**
     * Short description of attribute matricula
     *
     * @access public
     * @var string
     */
    public $matricula = '';

    /**
     * Short description of attribute gestor_id
     *
     * @access public
     * @var int
     */
    public $gestor_id = 0;

    /**
     * Short description of attribute latitude
     *
     * @access public
     * @var string
     */
    public $latitude = '';

    /**
     * Short description of attribute longitude
     *
     * @access public
     * @var string
     */
    public $longitude = '';

    /**
     * Short description of attribute id
     *
     * @access public
     * @var int
     */
    public $id = 0;

    // --- OPERATIONS ---

    /**
     * Short description of method _construct
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  string id
     * @param  estado
     * @param  capacidade
     * @param  matricula
     * @param  latitude
     * @param  longitude
     * @return void
     */
    public function __construct($id, $estado, $capacidade, $matricula, $latitude, $longitude)
    {
        
    }

    /**
     * Short description of method registar
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return string
     */
    public function registar()
    {
        $returnValue = (string) '';

        // section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000939 begin
        // section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000939 end

        return (string) $returnValue;
    }

    /**
     * Short description of method estado
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  matricula
     * @param  estado
     * @return void
     */
    public function estado($matricula, $estado)
    {
        // section -64--88--84-1--3bb77b58:15226578a74:-8000:000000000000093B begin
        // section -64--88--84-1--3bb77b58:15226578a74:-8000:000000000000093B end
    }

} /* end of class Veiculo */

?>