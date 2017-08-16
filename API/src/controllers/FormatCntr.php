<?php

namespace booksea\controllers;

//use booksea\models\Format;
use booksea\Exceptions\ElementNotFoundException;
use booksea\mappers\FormatMapper;

/**
 * Class FormatCntr
 *
 * @package booksea\controllers
 * @author Salvador Sánchez Méndez
 */
class FormatCntr
{
    /**
     * @var FormatMapper FormatCntr Objeto que ejecuta las acciones de gestión de los formatos sobre la base de datos.
     */
    private $formatMapper;

    /**
     * FormatCntr constructor.
     */
    public function __construct()
    {
        $this->formatMapper = new FormatMapper();
    }

    public function listFormats()
    {
        return $this->formatMapper->getAllFormats();
    }

    /**
     * @param int $idformat
     * @return array
     * @throws ElementNotFoundException
     */
    public function getFormat($idformat)
    {
        $obtainedData = $this->formatMapper->getFormatById($idformat);
        if (is_null($obtainedData)||!$obtainedData) throw new ElementNotFoundException("The format does not exist");
        return $obtainedData;
    }

}

?>