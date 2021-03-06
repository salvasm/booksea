<?php

namespace booksea\mappers;

//use booksea\models\Author;

class AuthorMapper extends Mapper
{
    /**
     * Función encargada de recuperar todos los autores
     *
     * @return array
     */
    public function getAllAuthors()
    {
        $sql = "SELECT * FROM author ORDER BY idauthor";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Función encargada de recuperar todos los datos de un autor (por su ID)
     *
     * @param int $idauthor
     * @return array
     */
    public function getAuthorById($idauthor)
    {
        $sql = "SELECT * FROM author WHERE idauthor=:idauthor";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":idauthor", $idauthor);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

}

?>