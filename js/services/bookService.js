var app = angular.module("bookseaApp");
//modelo bookService
app.service("bookService", ['$http', 'API', function ($http, API) {
    return {
        getBooks: function (onSuccess, onFail) {
            $http({
                url: API + '/getBooks',
                method: "GET",
                params: {'foobar': new Date().getTime()}
            }).then(onSuccess, onFail);
        },
        getBooks2: function (onSuccess, onFail) {
            $http({
                url: API + '/getBooks',
                method: "GET",
                params: {'foobar': new Date().getTime()}
            }).then(onSuccess, onFail);
        }
    };

}]);
//
// var app = angular.module('experimentWeb');
//
// app.factory('breedingService',['$http','API',function($http,API){
//     return{
//         getBreedings: function(onSuccess, onFail){
//             $http({
//                 url: API+'/getBreedings',
//                 method: "GET",
//                 params: { 'foobar': new Date().getTime() }
//             }).success(onSuccess).error(onFail);
//         },