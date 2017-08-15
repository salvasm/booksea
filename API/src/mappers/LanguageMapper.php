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

    /**
     * Función encargada de recuperar todos los datos de un idioma (por su ID)
     *
     * @param int $idlanguage
     * @return array
     */
    public function getLanguageById($idlanguage)
    {
        $sql = "SELECT * FROM language WHERE idlanguages=:idlanguages";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":idlanguages", $idlanguage);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

}

?>