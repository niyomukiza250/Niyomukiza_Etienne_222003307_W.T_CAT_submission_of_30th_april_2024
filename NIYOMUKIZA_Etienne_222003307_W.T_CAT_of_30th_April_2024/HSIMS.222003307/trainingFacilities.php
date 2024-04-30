<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Coach</title>
    <link rel="stylesheet" href="style.css">
    <style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header img {
            width: 50px; /* Adjust the width of the icon */
            margin-right: 20px; /* Add some spacing between the icon and text */
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
            position: relative; /* Added */
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 160px;
            z-index: 1;
            border-radius: 5px;
        }

        .dropdown-content a {
            color: #fff;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #555;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
        .search-engine {
            margin-right: 20px;
        }

        .search-engine input[type="text"] {
            padding: 5px;
            width: 150px;
        }

        .search-engine button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .search-engine button:hover {
            background-color: #45a049;
        }

        .signout {
            margin-right: 20px;
        }

        .signout a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            background-color: #f44336;
            border: none;
            cursor: pointer;
        }

        .signout a:hover {
            background-color: #d32f2f;
        }

        .signin {
            margin-right: 10px;
        }

        .signin a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            background-color: #4CAF50;
            border: none;
            cursor: pointer;
        }

        .signin a:hover {
            background-color: #45a049;
        }
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            position: fixed; /* or position: absolute; */
            bottom: 0;
            width: 100%; /* Ensure it spans the entire width */
        }

        .social-media {
            margin-top: 10px;
        }

        .social-media a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        .social-media a:hover {
            text-decoration: underline;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin: 20px;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        .description-container {
            background-color: #3498db;
            color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        .description {
            margin-bottom: 20px;
        }

        .form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>    <header> 
        <h1><img src="images/icon.png" alt="icon"> Huye Sports</h1>
        <div class="search-engine">
            <input type="text" placeholder="Search...">
            <button type="submit">Search</button>
</header>
<header>
    <nav>
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li class="dropdown">
                <a href="#">Sports Synergy</a>
                <div class="dropdown-content">
                    <a href="athletesRecords.php">Athletes</a>
                    <a href="teamsRecords.php">Teams</a>
                    <a href="coachesRecords.php">Coaches</a>
                    <a href="trainingFacilitiesRecords.php">Training Facilities</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#">Sports Activities</a>
                <div class="dropdown-content">
                    <a href="competitionsUpadates.php">Competitions</a>
                    <a href="matchesUpdates.php">Matches</a>
                    <a href="matchOfficialsUpdates.php">Match Officials</a>
                </div>
            </li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
      
    <div class="signout">
        <button onclick="confirmSignOut()">Sign Out</button>
        </div>
    </header>
<div>
            <button type="button" onclick="window.location.href='trainingFacilitiesRecords.php'">Back</button>
    </div> 
<div class="container">
    <div class="form-container">
        <h2>Add New Training Facility</h2>
        <form action="trainingFacilities.php" method="POST" class="form">
            Facility Type: <input type="text" name="facilityType" required><br>
            Location: <input type="text" name="location" required><br>
            Available Equipment: <input type="text" name="availableEquipment" required><br>
            <input type="submit" value="Submit">
            <input type="button" value="Cancel" onclick="window.location.href='trainingaFacilities.php'">
        </form>
    </div>
</div><?php
require_once "databaseConnection.php";


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $facilityType = $_POST['facilityType'];
    $location = $_POST['location'];
    $availableEquipment = $_POST['availableEquipment'];

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO TrainingFacilities (Facility_Type, Location, Available_Equipment) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $facilityType, $location, $availableEquipment);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>


<footer>
    <p>&copy; 2024 Huye Sports. All rights reserved.</p>
    <div class="social-media">
        <a href="#">Facebook</a>
        <a href="#">Twitter</a>
        <a href="#">Instagram</a>
    </div>
</footer>
<script>
    function confirmSignOut() {
        if (confirm("Are you sure you want to sign out?")) {
            window.location.href = "index.html";
        }
    }
</script>
</body>
</html>