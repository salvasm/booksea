var app = angular.module("bookseaApp");

app.controller("ModalConfirmationCntr",
    ['$scope', '$rootScope', '$uibModalInstance', '$uibModal', 'msg',
        function ($scope, $rootScope, $uibModalInstance, $uibModal, msg) {

            $scope.msg = msg.text;

            $scope.accept = function () {
                $uibModalInstance.close(true);
            };

            $scope.cancel = function () {
                $uibModalInstance.close(false);
            };

        }]);