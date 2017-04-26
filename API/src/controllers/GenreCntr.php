<?php

namespace booksea\controllers;

//use booksea\models\Gente;
use booksea\mappers\GenreMapper;

/**
 * Class GenreCntr
 *
 * @package booksea\controllers
 * @author Salvador Sánchez Méndez
 */
class GenreCntr
{
    /**
     * @var GenreMapper GenreCntr Objeto que ejecuta las acciones de gestión de los géneros sobre la base de datos.
     */
    private $genreMapper;

    /**
     * GenreCntr constructor.
     */
    public function __construct()
    {
        $this->genreMapper = new GenreMapper();
    }

    public function listGenres()
    {
        return $this->genreMapper->getAllGenres();
    }
}

?>