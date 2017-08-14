<?php

namespace booksea\controllers;

//use booksea\models\Author;
use booksea\Exceptions\ElementNotFoundException;
use booksea\mappers\AuthorMapper;

/**
 * Class AuthorCntr
 *
 * @package booksea\controllers
 * @author Salvador Sánchez Méndez
 */
class AuthorCntr
{
    /**
     * @var AuthorMapper AuthorCntr Objeto que ejecuta las acciones de gestión de los autores sobre la base de datos.
     */
    private $authorMapper;

    /**
     * AuthorCntr constructor.
     */
    public function __construct()
    {
        $this->authorMapper = new AuthorMapper();
    }

    public function listAuthors()
    {
        return $this->authorMapper->getAllAuthors();
    }

    /**
     * @param int $idauthor
     * @return array
     * @throws ElementNotFoundException
     */
    public function getAuthor($idauthor)
    {
        $obtainedData = $this->authorMapper->getAuthorById($idauthor);
        if (is_null($obtainedData)||!$obtainedData) throw new ElementNotFoundException("The author does not exist");
        return $obtainedData;
    }

}

?>