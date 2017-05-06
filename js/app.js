var configApp = function($routeProvider){

    $routeProvider.when("/home", {
        controller: "bookCntr",
        templateUrl: "views/home.html"
    });

}

//creamos el modulo y le aplicamos la configuración
var app = angular.module("bookseaApp", ["ngRoute"]).config(configApp);