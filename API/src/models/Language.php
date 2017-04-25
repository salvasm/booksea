<?php

namespace booksea\models;

/**
 * Modelo correspondiente a los idiomas
 *
 * @author Salvador Sánchez Méndez
 * @package booksea\models
 */
class Language
{
    /**
     * @var integer $idlanguages Identificador único de idiomas
     */
    private $idlanguages;
    /**
     * @var string $name Nombre del idioma
     */
    private $name;
    /**
     * @var string $iso_639_1 Letras (2) identificadoras del idioma según iso 639-1
     */
    private $iso_639_1;

    /**
     * Language constructor.
     * @param integer $idlanguages
     * @param string $name
     * @param string $iso_639_1
     */
    public function __construct($idlanguages = null, $name = null, $iso_639_1) {
        $this->setIdLanguages($idlanguages);
        $this->setName($name);
        $this->setIso6391($iso_639_1);
    }

    /**
     * @return int
     */
    public function getIdLanguages()
    {
        return $this->idlanguages;
    }

    /**
     * @param int $idlanguages
     */
    public function setIdLanguages($idlanguages)
    {
        $this->idlanguages = $idlanguages;
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
     * @return string
     */
    public function getIso6391()
    {
        return $this->iso_639_1;
    }

    /**
     * @param string $iso_639_1
     */
    public function setIso6391($iso_639_1)
    {
        $this->iso_639_1 = $iso_639_1;
    }



}

?>