
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New match</title>
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
            padding: 30px;
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
    <button type="button" onclick="window.location.href='matchesUpdates.php'">Back</button>
</div> 
<main>

<div class="container">
            <div class="form-container">
                <h2>Add New Match</h2>
                <!-- Match form -->
                <form action="matches.php" method="POST" class="form">
                    <label for="competitionID">Competition ID:</label><br>
                    <input type="text" id="competitionID" name="competitionID" required><br>
                    <label for="team1ID">Team 1 ID:</label><br>
                    <input type="text" id="team1ID" name="team1ID" required><br>
                    <label for="team2ID">Team 2 ID:</label><br>
                    <input type="text" id="team2ID" name="team2ID" required><br>
                    <label for="matchDate">Match Date:</label><br>
                    <input type="date" id="matchDate" name="matchDate" required><br>
                    <label for="venue">Venue:</label><br>
                    <input type="text" id="venue" name="venue" required><br><br>
                    <input type="submit" value="Submit">
                    <input type="button" value="Cancel" onclick="window.location.href='matches.php'">
                </form>
            </div>
        </div>

        <!-- PHP code to handle form submission -->
        <?php
require_once "databaseConnection.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $competitionID = $_POST['competitionID'];
    $team1ID = $_POST['team1ID'];
    $team2ID = $_POST['team2ID'];
    $matchDate = $_POST['matchDate'];
    $venue = $_POST['venue'];

    // Check if Competition_ID exists
    $checkCompetitionQuery = "SELECT * FROM Competitions WHERE Competition_ID = $competitionID";
    $result = $conn->query($checkCompetitionQuery);

    if ($result->num_rows > 0) {
        // Competition_ID exists
        // Check if Team1_ID exists
        $checkTeam1Query = "SELECT * FROM Teams WHERE Team_ID = $team1ID";
        $result = $conn->query($checkTeam1Query);

        if ($result->num_rows > 0) {
            // Team1_ID exists
            // Check if Team2_ID exists
            $checkTeam2Query = "SELECT * FROM Teams WHERE Team_ID = $team2ID";
            $result = $conn->query($checkTeam2Query);

            if ($result->num_rows > 0) {
                // Team2_ID exists
                // Insert into Matches table
                $stmt = $conn->prepare("INSERT INTO Matches (Competition_ID, Team1_ID, Team2_ID, Match_Date, Venue) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("iiiss", $competitionID, $team1ID, $team2ID, $matchDate, $venue);

                if ($stmt->execute() === TRUE) {
                    echo "New match record created successfully";
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Error: Team 2 ID does not exist";
            }
        } else {
            echo "Error: Team 1 ID does not exist";
        }
    } else {
        echo "Error: Competition ID does not exist";
    }
}

$conn->close();
?>

</main>
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