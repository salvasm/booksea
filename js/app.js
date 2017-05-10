// var configApp = function ($routeProvider) {
//
//     $routeProvider.when("/home", {
//         controller: "bookCntr",
//         templateUrl: "views/dashboard.html"
//     });
//
// };
//
// //creamos el modulo y le aplicamos la configuración
// var app = angular.module("bookseaApp", ["ngRoute"]).config(['$routeProvider', configApp]);
//

var app = angular.module('bookseaApp', ['ngRoute']);

app.config(['$routeProvider', '$locationProvider' , function ($routeProvider,$locationProvider) {
    $locationProvider.hashPrefix('');
    $routeProvider
        .when('/dashboard', {
            templateUrl: 'views/dashboard/dashboard.html',
            controller: 'bookCntr'
        })
        .when('/books', {
            templateUrl: 'views/dashboard/books.html',
            controller: 'bookCntr'
        })
        .when('/authors', {
            templateUrl: 'views/dashboard/authors.html',
            controller: 'authorCntr'
        })
        .otherwise({
            redirectTo: '/dashboard'
        });
}]);

app.constant('API', 'API/src/index.php');