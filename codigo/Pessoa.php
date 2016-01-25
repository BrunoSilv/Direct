<?php

class Pessoa
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute nome
     *
     * @access public
     * @var string
     */
    public $nome = '';

    /**
     * Short description of attribute apelido
     *
     * @access public
     * @var string
     */
    public $apelido = '';


    /**
     * Short description of method _construct
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  nome
     * @param  apelido
     * @return void
     */
    public function __construct($nome, $apelido)
    {
        $this->nome=$nome;
        $this->apelido=$apelido;
    }

} /* end of class Pessoa */
?>

