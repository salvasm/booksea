var app = angular.module("bookseaApp");
//modelo formatService
app.service("formatService", ['$http', 'API', function ($http, API) {
    return {
        getFormats: function (onSuccess, onFail) {
            $http({
                url: API + '/formats',
                method: "GET",
                params: {'foobar': new Date().getTime()}
            }).then(onSuccess, onFail);
        },
        // Obtener detalles de un libro
        getFormatsDetails: function ($id_format, onSuccess, onFail) {
            $http({
                url: API + '/format/id/'+$id_format,
                method: "GET"
            }).then(onSuccess, onFail);
        }
    };

}]);
