<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Match Record</title>
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
            <h2>Update Match Record</h2>
            <?php
            // Connection details
            require_once "databaseConnection.php";


            // Initialize ID variable
            $id = null;
            $updateMessage = null; // Initialize update message variable

            // Check if ID is set and form is submitted
            if (isset($_GET['updateID']) && isset($_POST['submit'])) {
                $id = $_POST['id']; // Get ID from hidden input
                $competition_id = $_POST['competition_id'];
                $team1_id = $_POST['team1_id'];
                $team2_id = $_POST['team2_id'];
                $match_date = $_POST['match_date'];
                $venue = $_POST['venue'];

                // Prepare and execute the UPDATE statement
                $stmt = $conn->prepare("UPDATE Matches SET Competition_ID=?, Team1_ID=?, Team2_ID=?, Match_Date=?, Venue=? WHERE Match_ID=?");
                $stmt->bind_param("iiisss", $competition_id, $team1_id, $team2_id, $match_date, $venue, $id);

                try {
                    if ($stmt->execute()) {
                        $updateMessage = "Record updated successfully"; // Set update message
                        echo "<script>
                                if(confirm('$updateMessage')) {
                                    window.location.href = 'matchesUpdates.php';
                                }
                              </script>";
                    } else {
                        $updateMessage = "Error updating record: " . $stmt->error; // Set error message
                        echo "<script>
                                alert('$updateMessage');
                                window.location.href = 'matchesUpdates.php';
                              </script>";
                    }
                } catch (Exception $e) {
                    // Handle error gracefully
                    echo "<script>
                            alert('Cannot update match record. Please check associated records and try again later.');
                            window.location.href = 'matchesUpdates.php';
                          </script>";
                }

                $stmt->close();
            }

            // Fetch existing data for the selected ID
            if (isset($_GET['updateID'])) {
                $id = $_GET['updateID'];
                $sql_select = "SELECT * FROM Matches WHERE Match_ID=?";
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

            <form method="POST" action="edit_match.php?updateID=<?php echo $id; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="competition_id">Competition ID:</label>
                    <input type="text" id="competition_id" name="competition_id" value="<?php echo isset($row['Competition_ID']) ? $row['Competition_ID'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="team1_id">Team 1 ID:</label>
                    <input type="text" id="team1_id" name="team1_id" value="<?php echo isset($row['Team1_ID']) ? $row['Team1_ID'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="team2_id">Team 2 ID:</label>
                    <input type="text" id="team2_id" name="team2_id" value="<?php echo isset($row['Team2_ID']) ? $row['Team2_ID'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="match_date">Match Date:</label>
                    <input type="date" id="match_date" name="match_date" value="<?php echo isset($row['Match_Date']) ? $row['Match_Date'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="venue">Venue:</label>
                    <input type="text" id="venue" name="venue" value="<?php echo isset($row['Venue']) ? htmlspecialchars($row['Venue']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Update" class="btn btn-primary">
                    <a href="matchesUpdates.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
