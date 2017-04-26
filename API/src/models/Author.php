<?php

namespace booksea\models;

/**
 * Modelo correspondiente a los autores
 *
 * @author Salvador Sánchez Méndez
 * @package booksea\models
 */
class Author
{
    /**
     * @var integer $idauthor Identificador único de autor
     */
    private $idauthor;
    /**
     * @var string $name Nombre del autor
     */
    private $name;
    /**
     * @var \DateTime $birthday Fecha de nacimiento del autor
     */
    private $birthday;
    /**
     * @var \DateTime $deathday Fecha de defunción del autor
     */
    private $deathday;

    /**
     * Author constructor.
     * @param integer $idauthor
     * @param string $name
     * @param \DateTime $birthday
     * @param \DateTime $deathday
     */
    public function __construct($idauthor = null, $name = null, $birthday = null, $deathday = null) {
        $this->setIdAuthor($idauthor);
        $this->setName($name);
        $this->setBirthday($birthday);
        $this->setDeathday($deathday);
    }

    /**
     * @return int
     */
    public function getIdAuthor()
    {
        return $this->idauthor;
    }

    /**
     * @param int $idauthor
     */
    public function setIdAuthor($idauthor)
    {
        $this->idauthor = $idauthor;
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
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param \DateTime $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return \DateTime
     */
    public function getDeathday()
    {
        return $this->deathday;
    }

    /**
     * @param \DateTime $deathday
     */
    public function setDeathday($deathday)
    {
        $this->deathday = $deathday;
    }


}

?>