<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Team Record</title>
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
            <h2>Update Team Record</h2>
            <?php
            // Connection details
            require_once "databaseConnection.php";

            // Initialize ID variable
            $id = null;
            $updateMessage = null; // Initialize update message variable

            // Check if ID is set and form is submitted
            if (isset($_GET['updateID']) && isset($_POST['submit'])) {
                $id = $_POST['id']; // Get ID from hidden input
                $name = $_POST['name'];
                $coachID = $_POST['coachID'];
                $facilityID = $_POST['facilityID'];

                // Prepare and execute the UPDATE statement
                $stmt = $conn->prepare("UPDATE Teams SET Team_Name=?, Coach_ID=?, Training_Facility_ID=? WHERE Team_ID=?");
                $stmt->bind_param("siii", $name, $coachID, $facilityID, $id);

                try {
                    if ($stmt->execute()) {
                        $updateMessage = "Record updated successfully"; // Set update message
                        echo "<script>
                                if(confirm('$updateMessage')) {
                                    window.location.href = 'teamsRecords.php';
                                }
                              </script>";
                    } else {
                        $updateMessage = "Error updating record: " . $stmt->error; // Set error message
                        echo "<script>
                                alert('$updateMessage');
                                window.location.href = 'teamsRecords.php';
                              </script>";
                    }
                } catch (Exception $e) {
                    // Handle error gracefully
                    echo "<script>
                            alert('Cannot update team record. Please check associated records and try again later.');
                            window.location.href = 'teamsRecords.php';
                          </script>";
                }

                $stmt->close();
            }

            // Fetch existing data for the selected ID
            if (isset($_GET['updateID'])) {
                $id = $_GET['updateID'];
                $sql_select = "SELECT * FROM Teams WHERE Team_ID=?";
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

            <form method="POST" action="edit_team.php?updateID=<?php echo $id; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="name">Team Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo isset($row['Team_Name']) ? htmlspecialchars($row['Team_Name']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="coachID">Coach ID:</label>
                    <input type="text" id="coachID" name="coachID" value="<?php echo isset($row['Coach_ID']) ? $row['Coach_ID'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="facilityID">Training Facility ID:</label>
                    <input type="text" id="facilityID" name="facilityID" value="<?php echo isset($row['Training_Facility_ID']) ? $row['Training_Facility_ID'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Update" class="btn btn-primary">
                    <a href="teamsRecords.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
