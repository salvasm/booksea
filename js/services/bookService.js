var app = angular.module("bookseaApp");
//modelo bookService
app.service("bookService", ['$http', 'API', function ($http, API) {
    return {
        // Obtener todos los libros
        getBooks: function (onSuccess, onFail) {
            $http({
                url: API + '/books',
                method: "GET",
                params: {'foobar': new Date().getTime()}
            }).then(onSuccess, onFail);
        },
        // Obtener detalles de un libro
        getBookDetails: function ($id_book, onSuccess, onFail) {
            $http({
                url: API + '/book/id/'+$id_book,
                method: "GET"
            }).then(onSuccess, onFail);
        },
        editBook: function ($book_id, $book_title, $book_summary,
                            $author_data, $year, $language, $lent,
                            onSuccess, onFail) {
            $http.put(API + '/updateBook', {
                $book_id: $book_id,
                $book_title: $book_title,
                $book_summary: $book_summary,
                $author_data: $author_data,
                $year: $year,
                $language: $language,
                $lent: $lent
            }).then(onSuccess, onFail);
        },
        addBook: function ($title, $author_data, $year, $isbn13, $isbn10, $language, $notes, $summary,
                           $publisher, $format, $edition, $lent, onSuccess, onFail) {

            $http.post(API + '/addBook', {
                title: $title,
                author_data: $author_data.idauthor,
                year: $year,
                isbn13: $isbn13,
                isbn10: $isbn10,
                language: $language.idlanguages,
                notes: $notes,
                summary: $summary,
                publisher: $publisher,
                format: $format,
                edition: $edition,
                lent: 0
            }).then(onSuccess, onFail);
        },
        removeBook: function ($book_id, onSuccess, onFail) {
            $http.put(API + '/removeBook', {
                idbook: $book_id
            }).then(onSuccess, onFail);
        }
    };

}]);