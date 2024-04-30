<?php
// Connection details
require_once "databaseConnection.php";


// Initialize ID variable
$id = null;
$deleteMessage = null; // Initialize delete message variable

// Check if ID is set and deletion request is made
if (isset($_GET['deleteID'])) {
    $id = $_GET['deleteID'];

    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM Matches WHERE Match_ID=?");
    $stmt->bind_param("i", $id);

    try {
        if ($stmt->execute()) {
            $deleteMessage = "Record deleted successfully"; // Set delete message
            echo "<script>
                    if(confirm('$deleteMessage')) {
                        window.location.href = 'matchesUpdates.php';
                    }
                  </script>";
        } else {
            $deleteMessage = "Error deleting record: " . $stmt->error; // Set error message
            echo "<script>
                    alert('$deleteMessage');
                    window.location.href = 'matchesUpdates.php';
                  </script>";
        }
    } catch (Exception $e) {
        // Handle error gracefully
        echo "<script>
                alert('Cannot delete match record. Please delete associated records in the referencing table.');
                window.location.href = 'matchesUpdates.php';
              </script>";
    }

    $stmt->close();
}

$conn->close();
?>
