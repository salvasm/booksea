<?php

namespace booksea\models;

/**
 * Modelo correspondiente a los formatos
 *
 * @author Salvador Sánchez Méndez
 * @package booksea\models
 */
class Format
{
    /**
     * @var integer $idformat Identificador único de formato
     */
    private $idformat;
    /**
     * @var string $name Nombre del formato
     */
    private $name;
    /**
     * @var string $acronym Acrónimo del formato
     */
    private $acronym;

    /**
     * Format constructor.
     * @param integer $idformat
     * @param string $name
     * @param string $acronym
     */
    public function __construct($idformat = null, $name = null, $acronym = null) {
        $this->setIdFormat($idformat);
        $this->setName($name);
        $this->setAcronym($acronym);
    }

    /**
     * @return int
     */
    public function getIdFormat()
    {
        return $this->idformat;
    }

    /**
     * @param int $idformat
     */
    public function setIdFormat($idformat)
    {
        $this->idformat = $idformat;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string $acronym
     */
    public function getAcronym()
    {
        return $this->acronym;
    }

    /**
     * @param string $acronym
     */
    public function setAcronym($acronym)
    {
        $this->acronym = $acronym;
    }

}

?>