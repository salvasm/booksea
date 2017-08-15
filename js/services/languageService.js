var app = angular.module("bookseaApp");
//modelo languageService
app.service("languageService", ['$http', 'API', function ($http, API) {
    return {
        getLanguages: function (onSuccess, onFail) {
            $http({
                url: API + '/languages',
                method: "GET",
                params: {'foobar': new Date().getTime()}
            }).then(onSuccess, onFail);
        }
    };

}]);

