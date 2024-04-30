<?php
require_once "databaseConnection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO UserAccounts (FullName, Email, Username, Password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullname, $email, $username, $password);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        // Successful signup, display success message using JavaScript
        echo "<script>
                  alert('You have successfully signed up! Click OK to continue.');
                  window.location.href = 'SignIn.html'; // Redirect to sign-in page
              </script>";
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Close connection
$conn->close();
?>
