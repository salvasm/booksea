var app = angular.module('bookseaApp', ['ngRoute', 'ui.bootstrap', 'cookieService']);

app.config(['$routeProvider', '$locationProvider' , function ($routeProvider,$locationProvider) {
    $locationProvider.hashPrefix('');
    $routeProvider
        .when('/login', {
            templateUrl: 'views/login.html',
            controller: 'loginCntr'
        })
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