<?php
require_once '../Model/db_connect.php';
require_once '../Model/book.php';

// add
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $category = $_POST["category"];
    $description = $_POST["description"];
    $status = $_POST["status"];

    $stmt = $conn->prepare("INSERT INTO books (title, author, category, description, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $title, $author, $category, $description, $status);
    $stmt->execute();
    $stmt->close();
    $success = "Book added successfully!";
}
// delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM books WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $success = "Book deleted successfully!";
}

// FETCH books
$books = Book::getAllBooks();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Catalogue Management</title>
    <link rel="stylesheet" href="../others/styles.css">
</head>
<body>
<a href="../View/home.html">
    <button type="button">Back to Home</button>
</a>
    <h2>Catalogue Management (Admin)</h2>
    <?php if ($success): ?>
    <p style="color:green;"><?= $success ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Author:</label><br>
        <input type="text" name="author" required><br><br>

        <label>Category:</label><br>
        <input type="text" name="category" required><br><br>

        <label>Description:</label><br>
        <textarea name="description" required></textarea><br><br>

        <label>Status:</label>
        <select name="status">
            <option value="1">Available</option>
            <option value="0">Not Available</option>
        </select><br><br>

        <button type="submit" name="add">Add Book</button>
    </form>

    <hr>

    <h3>Book List</h3>
    <table border="1" cellpadding="8">
        <tr>
            <th>Title</th><th>Author</th><th>Category</th><th>Description</th><th>Status</th><th>Action</th>
        </tr>
        <?php foreach ($books as $book): ?>
        <tr>
            <td><?php echo htmlspecialchars($book->title); ?></td>
            <td><?php echo htmlspecialchars($book->author); ?></td>
            <td><?php echo htmlspecialchars($book->category); ?></td>
            <td><?php echo htmlspecialchars($book->description); ?></td>
            <td>
            <?php
            if ($book->status == 1) {
                echo "Available";
            } else {
                echo "Not Available";
            }
            ?>
        </td>
            <td><a href="?delete=<?= $book->id ?>" onclick="return confirm('Delete this book?')">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <form method="get">
    <button type="submit">Refresh</button>
</form>
</body>

</html>
