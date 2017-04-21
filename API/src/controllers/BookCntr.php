<?php

namespace booksea\controllers;

use booksea\Exceptions\ElementNotFoundException;
use booksea\Exceptions\IncompleteDataException;
use booksea\models\Book;
use booksea\mappers\BookMapper;

    /**
     *
     * Class BookCntr
     *
     * @package booksea\controllers
     * @author Salvador Sánchez Méndez
     *
     */
    class BookCntr
    {
        /**
         *
         * @var BookMapper $bookMapper Objeto que ejecuta las acciones de gestión de los libros sobre la base de datos.
         */
        private $bookMapper;

        public function __construct()
        {
            $this->bookMapper = new BookMapper();
        }

        public function listBooks()
        {
            return $this->bookMapper->getAllBooks();
        }

        /**
         * @param int $idbook
         * @return array
         * @throws ElementNotFoundException
         */
        public function getBook($idbook)
        {
            $obtainedData = $this->bookMapper->getBookById($idbook);
            if (is_null($obtainedData)||!$obtainedData) throw new ElementNotFoundException("The book does not exist");
            return $obtainedData;
        }

        public function addBook($title, $author, $year, $isbn13, $isbn10, $language, $notes, $summary, $publisher, $format, $edition, $lent)
        {
            $book = new Book(null, $title, $author, $year, $isbn13, $isbn10, $language, $notes, $summary, $publisher, $format, $edition, $lent);
            if (!($book->isComplete())) throw new IncompleteDataException("The book data is not complete");
            $this->bookMapper->saveBook($book);
        }

        /**
         * @param int $idbook
         */
        public function removeBook($idbook)
        {
            $this->getBook($idbook);
            $this->bookMapper->removeBook($idbook);
        }

        /**
         * @param integer $idbook
         * @param string $title
         * @param string $author
         * @param DateTime $date
         */
        public function updateBook($idbook, $title, $author, $date)
        {
            $actualBook = Book::convertDataBaseToObject($this->getBook($idbook));
            $book = new Book($idbook, $title, $author, $date);

            $actualBook->merge($book);
            if (!($actualBook->isComplete())) throw new IncompleteDataException("The Book data is not complete");
            $this->bookMapper->updateBook($actualBook);
        }

    }

?>