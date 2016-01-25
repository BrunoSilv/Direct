<?php

error_reporting(E_ALL);

/**
 * WS1 - class.Localizacao.php
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

/* user defined includes */
// section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000892-includes begin
// section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000892-includes end

/* user defined constants */
// section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000892-constants begin
// section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000892-constants end

/**
 * Short description of class Localizacao
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class Localizacao
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute lat
     *
     * @access public
     * @var string
     */
    public $lat = '';

    /**
     * Short description of attribute long
     *
     * @access public
     * @var string
     */
    public $long = '';

    /**
     * Short description of attribute hora
     *
     * @access public
     * @var time
     */
    public $hora = null;

    /**
     * Short description of attribute viagem_id
     *
     * @access public
     * @var int
     */
    public $viagem_id = 0;

    // --- OPERATIONS ---

    /**
     * Short description of method inserir_localizacao
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return string
     */
    public function inserir_localizacao()
    {
        
    
    }

    /**
     * Short description of method getLat
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return string
     */
    public function getLat()
    {
        $lat=$this->lat;

        // section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000970 begin
        // section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000970 end

        return lat;
    }

    /**
     * Short description of method getLong
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return string
     */
    public function getLong()
    {
         $long=$this->long;

        // section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000972 begin
        // section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000972 end

        return $long;
    }

    /**
     * Short description of method getHora
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return string
     */
    public function getHora()
    {
        $hora=$this->hora;

        // section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000974 begin
        // section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000974 end

        return $hora;
    }

    /**
     * Short description of method setLat
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  lat
     * @return void
     */
    public function setLat($lat)
    {
         $this->lat= $lat;
    }

    /**
     * Short description of method setLong
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  long
     * @return void
     */
    public function setLong($long)
    {
       $this->long= $long;
    }

    /**
     * Short description of method setHora
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  hora
     * @return void
     */
    public function setHora($hora)
    {
         $this->hora= $hora;
        
    }

    /**
     * Short description of method getViagem
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return int
     */
    public function getViagem()
    {
        $returnValue = (int) 0;

        // section -64--88--84-1--3bb77b58:15226578a74:-8000:000000000000097F begin
        // section -64--88--84-1--3bb77b58:15226578a74:-8000:000000000000097F end

        return (int) $returnValue;
    }

    /**
     * Short description of method setViagem
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return void
     */
    public function setViagem()
    {
        
    }

    /**
     * Short description of method remover_localizacao
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  viagem_id
     * @return string
     */
    public function remover_localizacao($viagem_id)
    {
        $returnValue = (string) '';

        // section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000983 begin
        // section -64--88--84-1--3bb77b58:15226578a74:-8000:0000000000000983 end

        return (string) $returnValue;
    }

    /**
     * Short description of method _construct
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  lat
     * @param  long
     * @param  hora
     * @param  viagem_id
     * @return void
     */
    public function __construct($lat, $long, $hora, $viagem_id)
    {
        $this->lat= $lat;
        $this->long= $long;
        $this->hora= $hora;
        $this->viagem_id= $viagem_id;
    }

} /* end of class Localizacao */

?>