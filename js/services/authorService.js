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
        },
        // Obtener detalles de un libro
        getAuthorDetails: function ($id_author, onSuccess, onFail) {
            $http({
                url: API + '/getAuthorDetails',
                method: "GET",
                params: {
                    idauthor: $id_author
                }
            }).then(onSuccess, onFail);
        }
    };

}]);
