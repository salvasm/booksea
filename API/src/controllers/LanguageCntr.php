<?php

namespace booksea\controllers;

//use booksea\models\Language;
use booksea\Exceptions\ElementNotFoundException;
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

        /**
         * @param int $idlanguage
         * @return array
         * @throws ElementNotFoundException
         */
        public function getLanguage($idlanguage)
        {
            $obtainedData = $this->languageMapper->getLanguageById($idlanguage);
            if (is_null($obtainedData)||!$obtainedData) throw new ElementNotFoundException("The language does not exist");
            return $obtainedData;
        }
    }

?>