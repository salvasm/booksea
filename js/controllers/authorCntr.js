var app = angular.module("bookseaApp");

app.controller("authorCntr",
    ['$scope', '$rootScope', '$location', 'authorService', '$uibModal',
        function ($scope, $rootScope, $location, authorService, $uibModal) {


/*    //Abrir modal
    $scope.openNewAuthor = function (size, $author) {
        $uibModal.open({
            templateUrl: "views/dashboard/modals/confirmationModal.html",
            controller: "ModalShowDetailsAuthorCntr",
            size: size,
            resolve: {
                Items: function() //scope del modal
                {
                    return "Hola loko";
                }
            }
        });
    };*/

    //Show Details on Modal
    $scope.showAuthorDetails = function ($author) {

        var $id = $author.idauthor;
        var $msg = {};
        $msg.text = "Are you sure of remove the author \"".concat($author.name).concat("\"?");

        var $modal = $uibModal.open({
            templateUrl: "views/dashboard/modals/showDetailsModal.html",
            controller: "ModalShowDetailsAuthorCntr",
            // size: 'sm',
            resolve: {
               msg: $msg
            }
        });

        $modal.result.then(function (result) {
            if (result) {
                authorService.getAuthors(function (response) {
                    console.log(response.data);
                    $scope.authors = response.data;
                }, function (error) {
                    console.log(error);
                });
            }
        });

    };

}]);


