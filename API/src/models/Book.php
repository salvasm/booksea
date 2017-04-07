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
         * @param datetime $date
         * @param datetime $modified Fecha de modificación del libro
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
         * @return mixed
         */
        public function getAuthor()
        {
            return $this->author;
        }
        /**
         * @param mixed $author
         */
        public function setAuthor($author)
        {
            $this->author = $author;
        }

        /**
         * @return mixed
         */
        public function getTitle()
        {
            return $this->title;
        }
        /**
         * @param mixed $title
         */
        public function setTitle($title)
        {
            $this->title = $title;
        }

        /**
         * @return mixed
         */
        public function getDate()
        {
            return $this->date;
        }
        /**
         * @param mixed $date
         */
        public function setDate($date)
        {
            $this->date = $date;
        }

        /**
         * @return mixed
         */
        public function getModified()
        {
            return $this->modified;
        }
        /**
         * @param mixed $modified
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