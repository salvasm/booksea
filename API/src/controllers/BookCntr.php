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

        public function addBook($title, $author_data, $year, $isbn13, $isbn10, $language, $notes, $summary, $updated, $publisher, $format, $edition, $lent)
        {
            $book = new Book(null, $title, $author_data, $year, $isbn13, $isbn10, $language, $notes, $summary, null, $updated, $publisher, $format, $edition, $lent);
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
         * @param integer $author_data
         * @param integer $year
         * @param string $isbn13
         * @param string $isbn10
         * @param integer$language
         * @param string $notes
         * @param string $summary
         * @param \DateTime $updated
         * @param string $publisher
         * @param integer $format
         * @param string $edition
         * @param boolean $lent
         * @throws IncompleteDataException
         * @internal param string $author
         * @internal param DateTime $date
         */
        public function updateBook($idbook, $title, $author_data, $year, $isbn13, $isbn10, $language, $notes, $summary, $updated, $publisher, $format, $edition, $lent)
        {
            $actualBook = Book::convertDataBaseToObject($this->getBook($idbook));
            $book = new Book($idbook, $title, $author_data, $year, $isbn13, $isbn10, $language, $notes, $summary, $updated, $publisher, $format, $edition, $lent);

            $actualBook->merge($book);
            if (!($actualBook->isComplete())) throw new IncompleteDataException("The Book data is not complete");
            $this->bookMapper->updateBook($actualBook);
        }

    }

?>
