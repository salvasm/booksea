<?php

namespace booksea\mappers;

//use booksea\models\Genre;

class GenreMapper extends Mapper
{
    /**
     * Función encargada de recuperar todos los géneros
     *
     * @return array
     */
    public function getAllGenres()
    {
        $sql = "SELECT * FROM genre ORDER BY idgenre";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}

?>