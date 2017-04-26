<?php

namespace booksea\models;

/**
 * Modelo correspondiente a los géneros
 *
 * @author Salvador Sánchez Méndez
 * @package booksea\models
 */
class Genre
{
    /**
     * @var integer $idgenre Identificador único de género
     */
    private $idgenre;
    /**
     * @var string $name Nombre del género
     */
    private $name;

    /**
     * Genre constructor.
     * @param integer $idgenre
     * @param string $name
     */
    public function __construct($idgenre = null, $name = null) {
        $this->setIdGenre($idgenre);
        $this->setName($name);
    }

    /**
     * @return int
     */
    public function getIdGenre()
    {
        return $this->idgenre;
    }

    /**
     * @param int $idgenre
     */
    public function setIdGenre($idgenre)
    {
        $this->idgenre = $idgenre;
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

}

?>