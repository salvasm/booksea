<?php
namespace booksea\mappers;

use booksea\models\Book;

class BookMapper extends Mapper
{
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
     * @param Book $book
     */
    public function saveBook($book)
    {
        $title = $book->getTitle();
        $author = $book->getAuthor();
        $date = $book->getDate()->format("Y-m-d");

        $sql = "INSERT INTO book (title, author, date) VALUES (:title, :author, :date)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":author", $author);
        $stmt->bindParam(":date", $date);
        $stmt->execute();
    }
}

?>