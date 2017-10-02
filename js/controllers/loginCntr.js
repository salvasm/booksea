var app = angular.module("bookseaApp");

app.controller("loginCntr",
    ['$scope', '$rootScope', '$location', 'userService', '$uibModal', 'cookieStore',
        function ($scope, $rootScope, $location, userService, $uibModal, cookieStore) {

            $scope.errorCode = $location.search().err;

            $scope.login = function () {
                userService.login($scope.username, $scope.password,
                    function (data) {
                        cookieStore.login(data);
                        $rootScope.getProfile();
                        $location.path('/dashboard');
                        console.log(data);
                    }, function (data) {
                        $scope.message = data;
                        console.log(data);
                        $location.search('err', 2);
                    });
            }

}]);