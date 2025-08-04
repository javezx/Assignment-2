<?php
// Include the database connection file
require 'db_connect.php';

// Check if the form was submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Get the data from the form
  // These names MUST MATCH the 'name' attributes in register.html
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Basic server-side validation (optional, but good practice)
  if (empty($username) || empty($email) || empty($password)) {
    echo "Error: All fields are required.";
    exit;
  }

  // Hash the password for security
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Prepare an SQL statement to prevent SQL injection
  $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
  
  // 'sss' indicates the types of the parameters (string, string, string)
  $stmt->bind_param("sss", $username, $email, $hashed_password);

  // Execute the statement
  if ($stmt->execute()) {
    // Registration successful
    echo "Registration successful!";
  } else {
    // Registration failed
    echo "Error: " . $stmt->error;
  }

  // Close the statement and connection
  $stmt->close();
  $conn->close();
}
?>