<?php

namespace booksea\controllers;

use booksea\models\Language;
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

        public function __construct()
        {
            $this->languageMapper = new LanguageCntr();
        }

        public function listLanguages()
        {
            return $this->languageMapper->getAllLanguages();
        }
    }

?>