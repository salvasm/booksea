var app = angular.module("bookseaApp");

app.controller("ModalShowDetailsAuthorCntr",
    ['$scope', '$rootScope', '$uibModalInstance', '$uibModal', 'authorService', 'author',
        function ($scope, $rootScope, $uibModalInstance, $uibModal, authorService, author) {

    $scope.title = "Edit Author";
    $scope.name = "HOLIS";

    if (typeof author != "undefined") {
        // $scope.name = author.name;
        // $scope.title = "Edit Author \"".concat(farm.name).concat("\"");
    }

    $scope.save = function (param) {
        console.log(param)
    };

    $scope.cancel = function()
    {
        $uibModalInstance.dismiss();
    }

}]);
