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

        public function getBook($idbook)
        {
            $obtainedData = $this->bookMapper->getBookById($idbook);
            if (is_null($obtainedData)||!$obtainedData) throw new ElementNotFoundException("The book does not exist");
            return $obtainedData;
        }

        public function addBook($title, $author, $date)
        {
            $book = new Book(null, $title, $author, $date);
            if (!($book->isComplete())) throw new IncompleteDataException("The book data is not complete");
            $this->bookMapper->saveBook($book);
        }

    }

?>
