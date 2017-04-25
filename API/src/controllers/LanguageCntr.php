<?php

namespace booksea\controllers;

//use booksea\models\Language;
use booksea\mappers\LanguageMapper;

    /**
     * Class LanguageCntr
     *
     * @package booksea\controllers
     * @author Salvador Sánchez Méndez
     */
    class LanguageCntr
    {
        /**
         * @var LanguageMapper LanguageCntr Objeto que ejecuta las acciones de gestión de los idiomas sobre la base de datos.
         */
        private $languageMapper;

        /**
         * LanguageCntr constructor.
         */
        public function __construct()
        {
            $this->languageMapper = new LanguageMapper();
        }

        public function listLanguages()
        {
            return $this->languageMapper->getAllLanguages();
        }
    }

?>