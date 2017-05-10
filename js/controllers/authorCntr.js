var app = angular.module("bookseaApp");

app.controller("authorCntr", ['$scope', 'authorService', function ($scope, authorService) {

    $scope.getAuthors = function () {
        // obtenemos todas los autores
        authorService.getAuthors(function (response) {
            console.log(response.data);
            $scope.authors = response.data;
        }, function (error) {
            console.log(error);
        });
    };

}]);


