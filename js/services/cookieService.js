var cookieModule = angular.module('cookieService' ,[]);

cookieModule.factory("cookieStore",['$rootScope','$cookies','$location', "$http",'API','jwtHelper',function($rootScope, $cookies, $location,$http,API,jwtHelper){
    return{
        login: function(token){
            var expiration = new Date();
            expiration.setDate(expiration.getDate() + 7);
            $cookies.put('jwtToken',token, {
                expires: expiration
            });
        }
    }

}]);