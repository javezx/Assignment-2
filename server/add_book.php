<?php
// Include the database connection file
require 'db_connect.php';

// Check if the form was submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Get the data from the form
  // These names must match the 'name' attributes in add_book.html
  $title = $_POST['title'];
  $author = $_POST['author'];
  $genre = $_POST['genre'];
  $publication_year = $_POST['publication_year'];

  // Prepare an SQL statement to prevent SQL injection
  $stmt = $conn->prepare("INSERT INTO books (title, author, genre, publication_year) VALUES (?, ?, ?, ?)");
  
  // 'sssi' indicates the types of the parameters (string, string, string, integer)
  $stmt->bind_param("sssi", $title, $author, $genre, $publication_year);

  // Execute the statement
  if ($stmt->execute()) {
    // Book added successfully
    echo "Book added successfully!";
  } else {
    // Failed to add book
    echo "Error: " . $stmt->error;
  }

  // Close the statement and connection
  $stmt->close();
  $conn->close();
}
?>