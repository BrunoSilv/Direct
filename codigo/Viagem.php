<?php

error_reporting(E_ALL);

/**
 * WS1 - class.Viagem.php
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
 * include Localizacao
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.Localizacao.php');

/* user defined includes */
// section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000891-includes begin
// section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000891-includes end

/* user defined constants */
// section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000891-constants begin
// section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000891-constants end

/**
 * Short description of class Viagem
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class Viagem
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd :     // generateAssociationEnd : condutor

    // --- ATTRIBUTES ---

    /**
     * Short description of attribute data
     *
     * @access public
     * @var date
     */
    public $data = null;

    /**
     * Short description of attribute id
     *
     * @access public
     * @var Integer
     */
    public $id = null;

    /**
     * Short description of attribute condutor_id
     *
     * @access public
     * @var int
     */
    public $condutor_id = 0;

    /**
     * Short description of attribute veiculo_id
     *
     * @access public
     * @var Integer
     */
    public $veiculo_id = null;

    // --- OPERATIONS ---

    /**
     * Short description of method duracao
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  id
     * @return time
     */
    public function duracao($id)
    {
        $returnValue = null;

        // section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000952 begin
        // section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000952 end

        return $returnValue;
    }

    /**
     * Short description of method inicio_viagem
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  id
     * @return time
     */
    public function inicio_viagem($id)
    {
        $returnValue = null;

        // section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000955 begin
        // section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000955 end

        return $returnValue;
    }

    /**
     * Short description of method fim_viagem
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  id
     * @return time
     */
    public function fim_viagem($id)
    {
        $returnValue = null;

        // section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000958 begin
        // section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000958 end

        return $returnValue;
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

        // section -64--88--84-1--3bb77b58:15226578a74:-8000:000000000000095B begin
        // section -64--88--84-1--3bb77b58:15226578a74:-8000:000000000000095B end

        return (string) $returnValue;
    }

    /**
     * Short description of method _construct
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  data
     * @param  veiculo_id
     * @param  condutor_id
     * @return void
     */
    public function __construct($data, $veiculo_id, $condutor_id)
    {
        // section -64--88--84-1--3bb77b58:15226578a74:-8000:000000000000095D begin
        // section -64--88--84-1--3bb77b58:15226578a74:-8000:000000000000095D end
    }

} /* end of class Viagem */

?>