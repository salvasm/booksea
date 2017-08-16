<?php

namespace booksea\mappers;

//use booksea\models\Format;

class FormatMapper extends Mapper
{
    /**
     * Función encargada de recuperar todos los formatos
     *
     * @return array
     */
    public function getAllFormats()
    {
        $sql = "SELECT * FROM format ORDER BY idformat";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Función encargada de recuperar todos los datos de un formato (por su ID)
     *
     * @param int $idformat
     * @return array
     */
    public function getFormatById($idformat)
    {
        $sql = "SELECT * FROM format WHERE idformat=:idformat";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":idformat", $idformat);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

}

?>