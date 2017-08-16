var app = angular.module("bookseaApp");

app.controller("authorCntr",
    ['$scope', '$rootScope', '$location', 'authorService', '$uibModal',
        function ($scope, $rootScope, $location, authorService, $uibModal) {

    // Get authors (all)
    $scope.getAuthors = function () {
        authorService.getAuthors(function (response) {
            $scope.authors = response.data;
            console.log(response.data);

        }, function (error) {
            console.log(error);
        });
    };

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

    // Format Date Function
    $scope.formatDate = function(date){
        var dateOut = new Date(date);
        return dateOut;
    };

}]);


