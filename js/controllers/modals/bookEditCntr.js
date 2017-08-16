var app = angular.module("bookseaApp");

app.controller("ModalShowDetailsBookCntr",
    ['$scope', '$rootScope', '$filter', '$uibModalInstance', '$uibModal', 'bookService', 'authorService', 'languageService', 'Book',
        function ($scope, $rootScope, $filter, $uibModalInstance, $uibModal, bookService, authorService, languageService, Book) {

            $scope.init = function () {
                // Load all the authors on DB to the form
                authorService.getAuthors(function (response) {
                    $scope.allAuthors = response.data;

                    if (typeof Book !== "undefined")
                        $scope.authorSelected = $filter('filter')($scope.allAuthors, {idauthor: Book.author_data})[0];
                }, function (response) {
                    console.log("Error: " + response.data);
                });

                // Load all the languages on DB to the form
                languageService.getLanguages(function (response) {
                    $scope.allLanguages = response.data;

                    if (typeof Book !== "undefined")
                        $scope.languageSelected = $filter('filter')($scope.allLanguages, {idlanguages: Book.language})[0];
                }, function (response) {
                    console.log("Error: " + response.data);
                });

                // Save data to show
                if (typeof Book !== "undefined") {
                    $scope.created = Book.created;
                    $scope.edition = Book.edition;
                    $scope.format = Book.format;
                    $scope.book_id = Book.idbook;
                    $scope.isbn10 = Book.isbn10;
                    $scope.isbn13 = Book.isbn13;
                    $scope.language = Book.language;
                    $scope.lent = Book.lent;
                    $scope.notes = Book.notes;
                    $scope.publisher = Book.publisher;
                    $scope.summary = Book.summary;
                    $scope.title = Book.title;
                    $scope.updated = Book.updated;
                    $scope.year = Book.year;
                    //   $scope.author_data = Book.author_data;
                }
            };

            $scope.init();

            $scope.change = function () {
                // console.log($scope.author_data);
                // console.log($scope.selected['idauthor']);
                // console.log("Author: " + $scope.authorSelected['idauthor']);
                // console.log("Language: " + $scope.languageSelected['idlanguages']);
            };

            $scope.editBook = function () {
                bookService.editBook(
                    $scope.book_id,
                    $scope.title,
                    $scope.summary,
                    $scope.author_data,
                    $scope.year,
                    $scope.language,
                    $scope.lent
                ), function (data) {
                    console.log(data);
                    $rootScope.$broadcast('books');
                }, function (error) {
                    console.log(error);
                };
            };

            $scope.addBook = function () {
                bookService.addBook(
                    $scope.title, $scope.author_data, $scope.year, $scope.isbn13, $scope.isbn10,
                    $scope.language, $scope.notes, $scope.summary, $scope.publisher, $scope.format,
                    $scope.edition, $scope.edition,

                    function (data) {
                        console.log(data);
                        // Close modal after save
                        $uibModalInstance.dismiss();

                        $rootScope.$broadcast('books');
                    }, function (error) {
                        console.log(error);
                    });
            };

            $scope.cancel = function () {
                $uibModalInstance.dismiss();
            };

        }]);