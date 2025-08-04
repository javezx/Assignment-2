<?php
// Include the database connection file
require 'db_connect.php';

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    
    // Sanitize the input to prevent SQL injection
    $book_id = $_GET['id'];

    // Prepare a SQL statement to delete the book
    $stmt = $conn->prepare("DELETE FROM books WHERE book_id = ?");

    // 'i' indicates the parameter is an integer
    $stmt->bind_param("i", $book_id);

    // Execute the statement
    if ($stmt->execute()) {
        // Deletion successful
        echo "Book deleted successfully!";
        // Optional: Redirect back to the display page
        // header("Location: display_books.php");
        // exit();
    } else {
        // Deletion failed
        echo "Error deleting book: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // If no ID was provided in the URL
    echo "Error: No book ID specified for deletion.";
}

// Close the connection
$conn->close();
?>