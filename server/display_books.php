<?php
// Include the database connection file
require 'db_connect.php';

// Initialize the search query variable
$search_query = "";
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_query = $_GET['search'];
}

// Build the SQL query conditionally
$sql = "SELECT * FROM books";
if (!empty($search_query)) {
    // We use a prepared statement for the search
    $sql .= " WHERE title LIKE ? OR author LIKE ?";
}

$stmt = $conn->prepare($sql);

if (!empty($search_query)) {
    // Add wildcards for the LIKE query
    $param = "%" . $search_query . "%";
    $stmt->bind_param("ss", $param, $param);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // If no search query, execute the simple query
    $result = $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Catalog</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .search-form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Our Book Catalog</h1>

    <div class="search-form">
        <form action="display_books.php" method="GET">
            <input type="text" name="search" placeholder="Search by title or author" value="<?php echo htmlspecialchars($search_query); ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <?php
    // Check if there are any books in the database
    if ($result && $result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Title</th><th>Author</th><th>Genre</th><th>Year</th><th>Action</th></tr>";

        // Loop through each row of the result set
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["book_id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["title"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["author"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["genre"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["publication_year"]) . "</td>";
            echo "<td><a href='delete_book.php?id=" . htmlspecialchars($row["book_id"]) . "'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No books found in the catalog.";
    }

    // Close the connection and statement (if used)
    if (isset($stmt)) {
        $stmt->close();
    }
    $conn->close();
    ?>
</body>
</html>