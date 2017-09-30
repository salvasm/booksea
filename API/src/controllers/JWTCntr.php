<?php

namespace experimentWebTool\controllers;

use Exception;
use booksea\Exceptions\TokenException;
use booksea\models\User;

date_default_timezone_set('Europe/Madrid');

/**
 * Clase encargada de gestionar los tokens de autentificación en el sistema
 *
 * @author Salvador Sánchez Méndez
 *
 */
class  JWTCntr
{
    /** @var string $SEC_KEY Cadena de caracteres que contiene la clave privada con la que se firmará el token
     */
    private static $SEC_KEY = "bookseapi";

    /** Esta funcion genera un token de autentificación en el sistema
     *
     * @param User $user Identificador único de usuario
     * @return string
     */
    public static function generateToken($user)
    {
        $header = array(
            "username" => $user->getUsername(),
            "name" => $user->getName(),
            "role" => $user->getRole(),
            "email" => $user->getEmail(),
            "iat" => time(),
            "nbf" => time(),
            "exp" => time() + 43200
        );
        return \JWT::encode($header, self::$SEC_KEY);
    }

    /**
     * Esta función comprueba la caducidad y la integridad del token de autentificación en el sistema
     *
     * @param $token
     * @return User
     * @throws TokenException
     */
    public function checkToken($token)
    {
        try {
            $jwt = ( array )\JWT::decode($token, self::$SEC_KEY, array(
                'HS256'
            ));
            return new User($jwt['username'], null, $jwt['role']);
        } catch (Exception $e) {
            throw new TokenException($e->getMessage());
        }
    }
}

?>