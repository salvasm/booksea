<?php

namespace booksea\models;

/**
 * Modelo correspondiente a los usuarios
 *
 * @author Salvador Sánchez Méndez
 * @package booksea\models
 */
class User
{
    /**
     * @var string $username Username
     */
    private $username;
    /**
     * @var string $name Name of user
     */
    private $name;
    /**
     * @var string $email Mail address
     */
    private $email;
    /**
     * @var string $password User password
     */
    private $password;
    /**
     * @var integer $role Role of user
     */
    private $role;
    /**
     * @var /Datetime $created Date of user creation
     */
    private $created;
    /**
     * @var /Datetime $updated Date of user modification
     */
    private $updated;



    /**
     * User constructor.
     * @param string $username
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $role
     * @param /Datetime $created
     * @param /Datetime $updated
     */
    public function __construct($username = null, $name = null, $email = null, $password = null, $role = null, $created, $updated) {
        $this->setUsername($username);
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setRole($role);
        $this->setCreated($created);
        $this->setUpdated($updated);
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param int $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param mixed $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * @return boolean
     */
    public function isComplete()
    {
        return (!is_null($this->username) &&
            !is_null($this->email) &&
            !is_null($this->name)
        );
    }


    /**
     * Convierte un array que contiene arrays de datos obetnidos de la base de datos a un array de objetos User
     *
     * @param array $data
     * @return User
     */
    public static function convertDataBaseToObject($data)
    {
        isset($data['password']) || $data['password'] = "";
        return new User(
            $data['iduser'],
            $data['username'],
            $data['name'],
            $data['email'],
            $data['password'],
            $data['role'],
            $data['created'],
            $data['updated']
        );
    }

}

?>