<?php

namespace booksea\mappers;

use booksea\models\Language;

class LanguageMapper extends Mapper
{
    /**
     * Función encargada de recuperar todos los idiomas
     *
     * @return array
     */
    public function getAllLanguages()
    {
        $sql = "SELECT * FROM language ORDER BY idlanguages";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}

?>