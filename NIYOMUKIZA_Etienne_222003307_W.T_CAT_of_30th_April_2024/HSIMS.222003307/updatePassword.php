<?php

require_once "databaseConnection.php";

// Retrieve form data
$email = $_POST['email'];
$newPassword = $_POST['new_password'];

// Update password in the database
$sql = "UPDATE UserAccounts SET Password='$newPassword' WHERE Email='$email'";
if ($conn->query($sql) === TRUE) {
    // Password updated successfully, display success message using JavaScript
    echo "<script>
              var confirmed = confirm('Password updated successfully. Click OK to continue to sign in.');
              if (confirmed) {
                  window.location.href = 'SignIn.html'; // Redirect to sign-in page
              }
          </script>";
} else {
    echo "Error updating password: " . $conn->error;
}

// Close connection
$conn->close();
?>
