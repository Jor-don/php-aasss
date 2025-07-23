<?php
require_once '../Model/book.php';

$books = Book::getAllBooks(); // later, you will make this fetch from DB
?>

<!DOCTYPE html>
<html>
<head>
    <title>Browse Books</title>
    <link rel="stylesheet" href="../others/styles.css">
</head>
<body>
<header>
        <h1>Library Management System</h1>
        <nav>
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="browse.php">Browse Books</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>
    <h1>Book Catalogue</h1>

    <table border="1">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Description</th>
            <th>Status</th>
        </tr>

        <?php foreach ($books as $book): ?>
            <tr>
            <td><?php echo $book->title; ?></td>
            <td><?php echo $book->author; ?></td>
            <td><?php echo $book->category; ?></td>
            <td><?php echo $book->description; ?></td>
            <td>
            <?php
            if ($book->status == 1) {
                echo "Available";
            } else {
                echo "Not Available";
            }
            ?>
        </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>