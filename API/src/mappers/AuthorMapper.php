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

}

?>