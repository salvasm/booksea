var app = angular.module("bookseaApp");

app.controller("bookCntr",
    ['$scope', '$rootScope', '$location', 'bookService', '$uibModal',
        function ($scope, $rootScope, $location, bookService, $uibModal) {

    $scope.sortType     = 'title'; // set the default sort type
    $scope.sortReverse  = false;  // set the default sort order
    $scope.searchBook   = ''; // set the default search/filter term

    // Obtenemos todas los libros
    $scope.getBooks = function () {
        bookService.getBooks(function (response) {
            console.log(response.data);
            $scope.books = response.data;
        }, function (error) {
            console.log(error);
        });
    };

    // Show modal to see Details of a Book
    $scope.getBookDetails = function ($book) {
        var $modal = $uibModal.open({
            templateUrl: "views/dashboard/modals/infoBookModal.html",
            controller: "ModalShowDetailsBookCntr",
            resolve: {
                Book: $book
            }
        });

        $modal.result.then(function() {
            // Success
        }, function() {
            // Cancel
        });

    };

    // Show modal to Edit a Book
    $scope.editBookDetails = function ($book) {
        var $modal = $uibModal.open({
            templateUrl: "views/dashboard/modals/editBookModal.html",
            controller: "ModalShowDetailsBookCntr",
            resolve: {
                Book: $book
            }
        });

        $modal.result.then(function() {
            // Success
        }, function() {
            // Cancel
        });
    };

    // Remove a Book
    $scope.removeBook = function ($book) {

        var $id = $book.idbook;
        var $msg = {};
        $msg.text = "Are you sure of remove the book \"".concat($book.title).concat("\"?");

        var $modal = $uibModal.open({
            templateUrl: "views/dashboard/modals/confirmationModal.html",
            controller: "ModalConfirmationCntr",
            resolve: {
                msg: $msg
            }
        });

        $modal.result.then(function (result) {
            if (result) {
                bookService.removeBook($id, function (data) {
                    console.log(data);
                    $scope.$emit('books');
                }, $rootScope.errorResponse);
            }
        }, function() {
            // Cancel
        });
    };

    // Add new Book
    $scope.addBook = function () {
        var $modal = $uibModal.open({
            templateUrl: "views/dashboard/modals/newBookModal.html",
            controller: "ModalShowDetailsBookCntr",
            resolve: {
                Book: undefined
            }
        });

        $modal.result.then(function() {
            console.log(data);
        }, function() {
            // Cancel
        });
    };

    // Events
    $scope.$on('books', function () {
        $scope.getBooks();
    });

}]);


