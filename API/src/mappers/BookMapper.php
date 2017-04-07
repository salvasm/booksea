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
            $sql = "SELECT * FROM book WHERE idbook=$idbook";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":idbook", $farm_id);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function saveBook($book)
        {
            $sql = "INSERT INTO book (title, author) VALUES (:title, :author)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":author", $author);
            $stmt->execute();
        }
    }
?>