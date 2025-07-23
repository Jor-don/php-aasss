<?php
require_once 'db_connect.php'; 

class Book {
    public $id;
    public $title;
    public $author;
    public $category;
    public  $description;
    public $status;

    public function __construct($id, $title, $author, $category, $description, $status) {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->category = $category;
        $this->description = $description;
        $this->status = $status;
    }

    public static function getAllBooks() {
        global $conn;
        $books = [];

        $sql = "SELECT * FROM books";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $books[] = new Book(
                $row['id'],
                $row['title'],
                $row['author'],
                $row['category'],
                $row['description'],
                $row['status']
            );
        }

        return $books;
    }
}
?>
