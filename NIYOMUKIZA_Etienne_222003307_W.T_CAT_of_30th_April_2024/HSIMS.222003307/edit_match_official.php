<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Tournament Official Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .btn-secondary {
            background-color: #ccc;
            color: #000;
        }

        .btn-secondary:hover {
            background-color: #999;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <main>
        <div class="container">
            <h2>Update Tournament Official Record</h2>
            <?php
            // Connection details
            require_once "databaseConnection.php";


            // Initialize ID variable
            $id = null;
            $updateMessage = null; // Initialize update message variable

            // Check if ID is set and form is submitted
            if (isset($_GET['updateID']) && isset($_POST['submit'])) {
                $id = $_POST['id']; // Get ID from hidden input
                $match_id = $_POST['match_id'];
                $name = $_POST['name'];
                $position = $_POST['position'];
                $nationality = $_POST['nationality'];
                $age = $_POST['age'];
                $background = $_POST['background'];

                // Prepare and execute the UPDATE statement
                $stmt = $conn->prepare("UPDATE TournamentOfficials SET Match_ID=?, Name=?, Position=?, Nationality=?, Age=?, Background=? WHERE ID=?");
                $stmt->bind_param("isssisi", $match_id, $name, $position, $nationality, $age, $background, $id);

                try {
                    if ($stmt->execute()) {
                        $updateMessage = "Record updated successfully"; // Set update message
                        echo "<script>
                                if(confirm('$updateMessage')) {
                                    window.location.href = 'matchOfficialsUpdates.php';
                                }
                              </script>";
                    } else {
                        $updateMessage = "Error updating record: " . $stmt->error; // Set error message
                        echo "<script>
                                alert('$updateMessage');
                                window.location.href = 'matchOfficialsUpdates.php';
                              </script>";
                    }
                } catch (Exception $e) {
                    // Handle error gracefully
                    echo "<script>
                            alert('Cannot update official record. Please check associated records and try again later.');
                            window.location.href = 'matchOfficialsUpdates.php';
                          </script>";
                }

                $stmt->close();
            }

            // Fetch existing data for the selected ID
            if (isset($_GET['updateID'])) {
                $id = $_GET['updateID'];
                $sql_select = "SELECT * FROM TournamentOfficials WHERE ID=?";
                $stmt_select = $conn->prepare($sql_select);
                $stmt_select->bind_param("i", $id);
                $stmt_select->execute();
                $result = $stmt_select->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                } else {
                    $updateMessage = "No record found for ID: $id"; // Set message if no record found
                }

                $stmt_select->close();
            }
            ?>

            <?php
            // Display update message if set
            if (!empty($updateMessage)) {
                echo '<div class="alert alert-success" role="alert">' . $updateMessage . '</div>';
            }
            ?>

            <form method="POST" action="edit_match_official.php?updateID=<?php echo $id; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="match_id">Match ID:</label>
                    <input type="text" id="match_id" name="match_id" value="<?php echo isset($row['Match_ID']) ? $row['Match_ID'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo isset($row['Name']) ? htmlspecialchars($row['Name']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="position">Position:</label>
                    <input type="text" id="position" name="position" value="<?php echo isset($row['Position']) ? htmlspecialchars($row['Position']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="nationality">Nationality:</label>
                    <input type="text" id="nationality" name="nationality" value="<?php echo isset($row['Nationality']) ? htmlspecialchars($row['Nationality']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="text" id="age" name="age" value="<?php echo isset($row['Age']) ? $row['Age'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="background">Background:</label>
                    <textarea id="background" name="background" required><?php echo isset($row['Background']) ? htmlspecialchars($row['Background']) : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Update" class="btn btn-primary">
                    <a href="matchOfficialsUpdates.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
