<?php

namespace booksea\models;

/**
 * Modelo correspondiente a los libros
 *
 * @author Salvador Sánchez Méndez
 * @package booksea\models
 */
class Book
{
    /**
     * @var integer $idbook Identificador único de libro
     */
    private $idbook;
    /**
     * @var string $title Título del libro
     */
    private $title;
    /**
     * @var integer $author_data ID del autor (que referencia a la tabla de autores)
     */
    private $author_data;
    /**
     * @var integer $year Año de publicación del libro
     */
    private $year;
    /**
     * @var string $isbn13 ISBN de 13 dígitos
     */
    private $isbn13;
    /**
     * @var string $isbn10 ISBN de 10 dígitos
     */
    private $isbn10;
    /**
     * @var integer $language ID del idioma (que hace refencia a la tabla de idiomas)
     */
    private $language;
    /**
     * @var string $notes Notas personales del usuario sobre el libro
     */
    private $notes;
    /**
     * @var string $summary Resumen del libro
     */
    private $summary;
    /**
     * @var \DateTime $created fecha de creación del elemento en la tabla (automático)
     */
    private $created;
    /**
     * @var \DateTime $updated fecha de modificiación del elemento en la tabla (automático)
     */
    private $updated;
    /**
     * @var string $publisher Nombre de la empresa que publicó el libro
     */
    private $publisher;
    /**
     * @var integer $format ID formato en la que el usuario posee el libro (papel, pdf, etc.)
     *
     */
    private $format;
    /**
     * @var string $edition Edición del libro (primera, segunda...)
     */
    private $edition;
    /**
     * @var boolean $lent Booleano, 1 = libro prestado por el usuario; 0 = libro no prestado (valor por defecto)
     */
    private $lent;

    /**
     * Book constructor.
     * @param integer $idbook
     * @param string $title
     * @param integer $author_data
     * @param integer $year
     * @param string $isbn13
     * @param string $isbn10
     * @param integer $language
     * @param $notes
     * @param $summary
     * @param \DateTime $created
     * @param \DateTime $updated
     * @param string $publisher
     * @param integer $format
     * @param string $edition
     * @param boolean $lent
     */
    public function __construct($idbook = null, $title = null, $author_data = null, $year = null, $isbn13 = null,
                                $isbn10 = null, $language = null, $notes = null, $summary = null, $created = null,
                                $updated = null, $publisher = null, $format = null, $edition = null, $lent = null ) {
        $this->setIdBook($idbook);
        $this->setTitle($title);
        $this->setAuthorData($author_data);
        $this->setYear($year);
        $this->setIsbn13($isbn13);
        $this->setIsbn10($isbn10);
        $this->setLanguage($language);
        $this->setNotes($notes);
        $this->setSummary($summary);
        $this->setCreated($created);
        $this->setUpdated($updated);
        $this->setPublisher($publisher);
        $this->setFormat($format);
        $this->setEdition($edition);
        $this->setLent($lent);
    }

    /**
     * @return int
     */
    public function getIdbook()
    {
        return $this->idbook;
    }

    /**
     * @param int $idbook
     */
    public function setIdbook($idbook)
    {
        $this->idbook = $idbook;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return integer
     */
    public function getAuthorData()
    {
        return $this->author_data;
    }

    /**
     * @param integer $author_data
     */
    public function setAuthorData($author_data)
    {
        $this->author_data = $author_data;
    }

    /**
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param integer $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return string
     */
    public function getIsbn13()
    {
        return $this->isbn13;
    }

    /**
     * @param string $isbn13
     */
    public function setIsbn13($isbn13)
    {
        $this->isbn13 = $isbn13;
    }

    /**
     * @return string
     */
    public function getIsbn10()
    {
        return $this->isbn10;
    }

    /**
     * @param string $isbn10
     */
    public function setIsbn10($isbn10)
    {
        $this->isbn10 = $isbn10;
    }

    /**
     * @return integer
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param integer $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param \DateTime $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * @return string
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @param string $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @return integer
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param integer $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * @return string
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * @param string $edition
     */
    public function setEdition($edition)
    {
        $this->edition = $edition;
    }

    /**
     * @return bool
     */
    public function getLent()
    {
        return $this->lent;
    }

    /**
     * @param bool $lent
     */
    public function setLent($lent)
    {
        $this->lent = $lent;
    }

    /**
     * @return boolean
     */
    public function isComplete()
    {
        return (!is_null($this->getTitle()) &&
                !is_null($this->getAuthorData()) &&
                !is_null($this->getLanguage()) &&
                !is_null($this->getLent())
               );
    }

    /**
     * Convierte el array obtenido directamente de la base de datos a un objeto Book
     *
     * @param array $data
     * @return Book
     */
    public static function convertDataBaseToObject($data)
    {
        return new Book(
            $data['idbook'],
            $data['title'],
            $data['author_data'],
            $data['year'],
            $data['isbn13'],
            $data['isbn10'],
            $data['language'],
            $data['notes'],
            $data['summary'],
            $data['created'],
            $data['updated'],
            $data['publisher'],
            $data['format'],
            $data['edition'],
            $data['lent']
        );
    }

    /**
     * @param Book $newBook
     */
    public function merge($newBook)
    {
        if (!is_null($newBook->getTitle())) $this->setTitle($newBook->getTitle());
        if (!is_null($newBook->getAuthorData())) $this->setAuthorData($newBook->getAuthorData());
        if (!is_null($newBook->getYear())) $this->setYear($newBook->getYear());
    }


}


?>