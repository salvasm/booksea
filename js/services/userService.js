var app = angular.module("bookseaApp");
//modelo userService
app.service("userService", ['$http', 'API', function ($http, API) {
    return {
        login: function ($username, $password, onSuccess, onFail) {
            $http.post(API + '/login', {
                username: $username,
                password: $password
            }).then(onSuccess, onFail);
        }
    };

}]);
