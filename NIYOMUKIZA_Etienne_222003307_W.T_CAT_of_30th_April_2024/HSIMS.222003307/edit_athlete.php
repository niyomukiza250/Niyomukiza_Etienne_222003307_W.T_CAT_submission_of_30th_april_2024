<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Athlete Record</title>
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
            <h2>Update Athlete Record</h2>
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
                $age = $_POST['age'];
                $gender = $_POST['gender'];
                $nationality = $_POST['nationality'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $residence = $_POST['residence'];
                $teamID = $_POST['teamID'];

                // Prepare and execute the UPDATE statement
                $stmt = $conn->prepare("UPDATE Athletes SET Name=?, Age=?, Gender=?, Nationality=?, Email=?, Phone=?, Residence=?, Team_ID=? WHERE Athlete_ID=?");
                $stmt->bind_param("sisssssii", $name, $age, $gender, $nationality, $email, $phone, $residence, $teamID, $id);

                try {
                    if ($stmt->execute()) {
                        $updateMessage = "Record updated successfully"; // Set update message
                        echo "<script>
                                if(confirm('$updateMessage')) {
                                    window.location.href = 'athletesRecords.php';
                                }
                              </script>";
                    } else {
                        $updateMessage = "Error updating record: " . $stmt->error; // Set error message
                        echo "<script>
                                alert('$updateMessage');
                                window.location.href = 'athletesRecords.php';
                              </script>";
                    }
                } catch (Exception $e) {
                    // Handle error gracefully
                    echo "<script>
                            alert('Cannot update athlete record. Please check associated records and try again later.');
                            window.location.href = 'athletesRecords.php';
                          </script>";
                }

                $stmt->close();
            }

            // Fetch existing data for the selected ID
            if (isset($_GET['updateID'])) {
                $id = $_GET['updateID'];
                $sql_select = "SELECT * FROM Athletes WHERE Athlete_ID=?";
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

            <form method="POST" action="edit_athlete.php?updateID=<?php echo $id; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo isset($row['Name']) ? htmlspecialchars($row['Name']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" value="<?php echo isset($row['Age']) ? $row['Age'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <input type="text" id="gender" name="gender" value="<?php echo isset($row['Gender']) ? htmlspecialchars($row['Gender']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="nationality">Nationality:</label>
                    <input type="text" id="nationality" name="nationality" value="<?php echo isset($row['Nationality']) ? htmlspecialchars($row['Nationality']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo isset($row['Email']) ? $row['Email'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo isset($row['Phone']) ? $row['Phone'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="residence">Residence:</label>
                    <input type="text" id="residence" name="residence" value="<?php echo isset($row['Residence']) ? htmlspecialchars($row['Residence']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="teamID">Team ID:</label>
                    <input type="number" id="teamID" name="teamID" value="<?php echo isset($row['Team_ID']) ? $row['Team_ID'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Update" class="btn btn-primary">
                    <a href="athletesRecords.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
