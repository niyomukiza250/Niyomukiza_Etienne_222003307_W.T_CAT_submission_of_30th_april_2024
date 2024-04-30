<?php

require_once "databaseConnection.php";

// Retrieve form data
$email = $_POST['email'];
$newUsername = $_POST['new_username'];

// Update username in the database
$sql = "UPDATE UserAccounts SET Username='$newUsername' WHERE Email='$email'";
if ($conn->query($sql) === TRUE) {
    // Username updated successfully, display message using JavaScript
    echo "<script>
              alert('Username updated successfully. Click OK to continue.');
              window.location.href = 'SignIn.html'; // Redirect to sign-in page
          </script>";
} else {
    echo "Error updating username: " . $conn->error;
}

// Close connection
$conn->close();
?>
