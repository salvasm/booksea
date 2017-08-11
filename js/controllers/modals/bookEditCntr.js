var app = angular.module("bookseaApp");

app.controller("ModalShowDetailsBookCntr",
    ['$scope', '$rootScope', '$uibModalInstance', '$uibModal', 'bookService', 'Book',
        function ($scope, $rootScope, $uibModalInstance, $uibModal, bookService, Book) {

            if (typeof Book != "undefined") {
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
                $scope.author_data = Book.author_data;
            }

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
                bookService.addBook($scope.title, $scope.author_data, $scope.language,
                    $scope.year,
                    function (data) {
                        console.log(data);
                        $rootScope.$broadcast('books');
                    }, function (error) {
                        console.log(error);
                    });
            };

            $scope.cancel = function () {
                $uibModalInstance.dismiss();
            };

        }]);