<?php

namespace booksea\controllers;

use booksea\Exceptions\ElementNotFoundException;
use booksea\Exceptions\IncompleteDataException;
use booksea\models\Language;
use booksea\mappers\LanguageMapper;

    class LanguageCntr
    {
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