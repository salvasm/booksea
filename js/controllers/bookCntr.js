var app = angular.module("bookseaApp");

app.controller("bookCntr", ['$scope', 'bookService', function ($scope, bookService) {

    $scope.getBooks = function () {
        // obtenemos todas los libros
        bookService.getBooks(function (response) {
            console.log(response.data);
            $scope.books = response.data;
        }, function (error) {
            console.log(error);
        });
    };


    // $scope.notas = ["uno", "dos"];


}]);


