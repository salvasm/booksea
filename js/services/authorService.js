var app = angular.module("bookseaApp");
//modelo authorService
app.service("authorService", ['$http', 'API', function ($http, API) {
    return {
        getAuthors: function (onSuccess, onFail) {
            $http({
                url: API + '/getAuthors',
                method: "GET",
                params: {'foobar': new Date().getTime()}
            }).then(onSuccess, onFail);
        }
    };

}]);
