<?php

namespace booksea\controllers;

use booksea\Exceptions\ElementNotFoundException;
use booksea\Exceptions\AccessDeniedException;
use booksea\Exceptions\WrongCredentialsException;

use booksea\models\User;
use booksea\mappers\UserMapper;

/**
 * Class UserCntr
 *
 * @package booksea\controllers
 * @author Salvador Sánchez Méndez
 */
class UserCntr
{

    /**
     * @var UserCntr Objeto que ejecuta las acciones de gestión de los usuarios sobre la base de datos.
     */
    private $userMapper;

    /**
     * UserCntr constructor.
     */
    public function __construct()
    {
        $this->userMapper = new UserMapper();
    }


    /**
     * Función encargada de las comprobaciones para el inicio de sesión en el sistema de un usuario
     *
     * @param string $username Nombre único de usuario que quiere iniciar sesión
     * @param string $password Contraseña del usuario que pretente iniciar sesión
     * @return string
     * @throws \PDOException
     * @throws AccessDeniedException
     * @throws ElementNotFoundException
     * @throws WrongCredentialsException
     */
    public function login($username, $password)
    {
        $userGet = $this->getUserProfile($username);
        $user = User::convertDataBaseToObject($userGet);
        if (!password_verify($password, $user->getPassword())) throw new WrongCredentialsException("The password is invalid");
        //if ($user->getRole() == "user") throw new AccessDeniedException("You don't have access yet");
        $jwt = new JWTCntr();
        return $jwt->generateToken($user);
    }

    public function listUsers()
    {
        return $this->userMapper->getAllUsers();
    }

    /**
     * @param string $username
     * @return array
     * @throws ElementNotFoundException
     */
    public function getUserProfile($username)
    {
        $obtainedData = $this->userMapper->getUserProfile($username);
        if (is_null($obtainedData)||!$obtainedData) throw new ElementNotFoundException("The user does not exist");
        return $obtainedData;
    }

}

?>