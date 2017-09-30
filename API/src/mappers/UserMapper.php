<?php

namespace booksea\mappers;

//use booksea\models\User;

class UserMapper extends Mapper
{
    /**
     * Función encargada de recuperar todos los usuarios
     *
     * @return array
     */
    public function getAllUsers()
    {
        $sql = "SELECT iduser, username, name, email, role, created, updated FROM user ORDER BY iduser";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Función encargada de recuperar todos los datos de un autor (por su USERNAME)
     *
     * @param string $username
     * @return array
     */
    public function getUserProfile($username)
    {
        $sql = "SELECT iduser, username, name, email, role, created, updated FROM user WHERE username=:username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

}

?>