<?php
// Connection details
require_once "databaseConnection.php";


// Retrieve form data and sanitize input
$uname = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);

// Prepare SQL statement to prevent SQL injection
$sql = "SELECT * FROM UserAccounts WHERE Username=? AND Password=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $uname, $password);
$stmt->execute();

// Debug: Output SQL query
echo "SQL Query: $sql<br>";

// Check for SQL errors
if ($stmt->error) {
    die("SQL Error: " . $stmt->error);
}

$result = $stmt->get_result();

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Successful login, redirect to home page
    header("Location: home.html");
    exit();
} else {
    // Incorrect username or password
    echo "<script>
            alert('Incorrect username or password. Please try again.');
            window.location.href = 'SignIn.html';
          </script>";
}

// Close prepared statement
$stmt->close();

// Close database connection
$conn->close();
?>
