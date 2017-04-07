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
        private $title;
        private $author;
        private $date;
        private $modified;


        /**
         * @param integer $idbook Identificador único de libro
         * @param string $title Título del libro
         * @param string $author
         * @param \DateTime $date
         * @param \DateTime $modified Fecha de modificación del libro
         */
        public function __construct($idbook = null, $title = null, $author = null, $date = null, $modified = null)
        {
            $this->setIdBook($idbook);
            $this->setTitle($title);
            $this->setAuthor($author);
            $this->setDate($date);
            $this->setModified($modified);
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
        public function getAuthor()
        {
            return $this->author;
        }
        /**
         * @param string $author
         */
        public function setAuthor($author)
        {
            $this->author = $author;
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
         * @return \DateTime
         */
        public function getDate()
        {
            return $this->date;
        }
        /**
         * @param \DateTime $date
         */
        public function setDate($date)
        {
            $this->date = $date;
        }

        /**
         * @return \DateTime
         */
        public function getModified()
        {
            return $this->modified;
        }
        /**
         * @param \DateTime $modified
         */
        public function setModified($modified)
        {
            $this->modified = $modified;
        }
        /**
         * @return boolean
         */
        public function isComplete()
        {
            return (!is_null($this->getTitle()) &&
                !is_null($this->getAuthor()));
        }



    }


?>