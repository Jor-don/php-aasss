<?php
require_once '../Model/book.php';

$books = Book::getAllBooks();

foreach ($books as $book) {
    echo $book->id . "<br>";  
}
?>