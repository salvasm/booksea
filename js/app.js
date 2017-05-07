// var configApp = function ($routeProvider) {
//
//     $routeProvider.when("/home", {
//         controller: "bookCntr",
//         templateUrl: "views/home.html"
//     });
//
// };
//
// //creamos el modulo y le aplicamos la configuración
// var app = angular.module("bookseaApp", ["ngRoute"]).config(['$routeProvider', configApp]);
//

var app = angular.module('bookseaApp', ['ngRoute']);

app.config(['$routeProvider', function ($routeProvider) {
    $routeProvider.when('/home', {
        templateUrl: 'views/home.html',
        controller: 'bookCntr'
    }).otherwise({
        redirectTo: '/home'
    });
}]);

app.constant('API', 'API/src/index.php');