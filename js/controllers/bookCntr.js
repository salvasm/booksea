app.controller("bookCntr", function($scope, bookService){

    //obtenemos todas las notas
    $scope.notas = bookService.getNotas();

})