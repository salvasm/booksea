<?php

namespace booksea\mappers;

use booksea\models\Book;

class BookMapper extends Mapper
{
    /**
     * Función encargada de recuperar todos los libros
     *
     * @return array
     */
    public function getAllBooks()
    {
        $sql = "SELECT * FROM book ORDER BY idbook";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Función encargada de recuperar todos los datos de un libro (por su ID)
     *
     * @param int $idbook
     * @return array
     */
    public function getBookById($idbook)
    {
        $sql = "SELECT * FROM book WHERE idbook=:idbook";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":idbook", $idbook);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Función engargada de guardar un nuevo libro
     *
     * @param Book $book
     * @throws \PDOException
     */
    public function saveBook($book)
    {
        $title = $book->getTitle();
        $author_data = $book->getAuthorData();
        $year = $book->getYear();
        $isbn13 = $book->getIsbn13();
        $isbn10 = $book->getIsbn10();
        $language = $book->getLanguage();
        $notes = $book->getNotes();
        $summary = $book->getSummary();
        $updated = $book->getUpdated();
        $publisher = $book->getPublisher();
        $format = $book->getFormat();
        $edition = $book->getEdition();
        $lent = $book->getLent();

        $sql = "INSERT INTO book (title, author_data, year, isbn13, isbn10, language, notes, summary, updated, publisher, format, edition, lent) 
                VALUES (:title, :author_data, :year, :isbn13, :isbn10, :language, :notes, :summary, :updated, :publisher, :format, :edition, :lent)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":author_data", $author_data);
        $stmt->bindParam(":year", $year);
        $stmt->bindParam(":isbn13", $isbn13);
        $stmt->bindParam(":isbn10", $isbn10);
        $stmt->bindParam(":language", $language);
        $stmt->bindParam(":notes", $notes);
        $stmt->bindParam(":summary", $summary);
        $stmt->bindParam(":updated", $updated);
        $stmt->bindParam(":publisher", $publisher);
        $stmt->bindParam(":format", $format);
        $stmt->bindParam(":edition", $edition);
        $stmt->bindParam(":lent", $lent);
        $stmt->execute();
    }

    /**
     * Función encargada de modificar los datos de un libro (según ID)
     *
     * @param Book $book Modificar datos de un libro
     * @throws \PDOException
     */
    public function updateBook($book)
    {
        $idbook = $book->getIdbook();
        $title = $book->getTitle();
        $author = $book->getAuthorData();
        $year = $book->getYear();
        $sql = "UPDATE book SET title=:title, author=:author, year=:year WHERE idbook=:idbook";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":idbook", $idbook);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":author", $author);
        $stmt->bindParam(":year", $year);
        $stmt->execute();

    }

    /**
     * Función encargada de eliminar un libro (según ID)
     *
     * @param int $idbook
     */
    public function removeBook($idbook)
    {
        $sql = "DELETE FROM book WHERE idbook=:idbook";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":idbook", $idbook);
        $stmt->execute();
    }
}

?>