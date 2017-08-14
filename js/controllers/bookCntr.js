var app = angular.module("bookseaApp");

app.controller("bookCntr",
    ['$scope', '$rootScope', '$location', 'bookService', 'authorService', '$uibModal', '$log',
        function ($scope, $rootScope, $location, bookService, authorService, $uibModal) {

            $scope.sortType = 'title'; // set the default sort type
            $scope.sortReverse = false;  // set the default sort order
            $scope.searchBook = ''; // set the default search/filter term

            // Pagination system
            $scope.viewby = 10; // Num of items per page (10) by default
            $scope.totalItems = '';
            $scope.currentPage = 1; // Current selected page
            $scope.itemsPerPage = $scope.viewby;
            $scope.maxSize = 5; //Number of pager buttons to show

            $scope.setItemsPerPage = function (num) {
                $scope.itemsPerPage = num;
                $scope.currentPage = 1; //reset to first paghe
            };

            // Get books
            $scope.getBooks = function () {
                bookService.getBooks(function (response) {
                    $scope.books = response.data;

                    angular.forEach($scope.books, function (book) {
                        $scope.idauthor = book.author_data;

                        authorService.getAuthorDetails($scope.idauthor, function (response) {
                            $scope.books = response.data;
                        });


                    });
                    console.log(response.data);

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

                $modal.result.then(function () {
                    // Success
                }, function () {
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

                $modal.result.then(function () {
                    // Success
                }, function () {
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
                }, function () {
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

                $modal.result.then(function () {
                    console.log("Ha sido creado");
                }, function () {
                    // Cancel
                });
            };

            // Events
            $scope.$on('books', function () {
                $scope.getBooks();
            });

        }]);

// Pagination filter
app.filter('startFrom', function () {
    return function (input, start) {
        if (!input || !input.length) {
            return;
        }
        start = +start; //parse to int
        return input.slice(start);
    }
});