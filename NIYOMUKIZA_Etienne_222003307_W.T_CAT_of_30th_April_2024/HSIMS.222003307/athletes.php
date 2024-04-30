<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New athlete</title>
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
<body>
<header> 
        <h1><img src="images/icon.png" alt="icon"> Athletes Form</h1>
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
                    <a href="match_officialsUpdates.php">Match Officials</a>
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
            <button type="button" onclick="window.location.href='athletesRecords.php'">Back</button>
    </div> <main>
    <h2>Add New Athlete</h2>
    <div class="container">
        <form action="athletes.php" method="POST" class="form">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br>
            <label for="age">Age:</label><br>
            <input type="number" id="age" name="age" required><br>
            <label for="gender">Gender:</label><br>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select><br>
            <label for="nationality">Nationality:</label><br>
            <input type="text" id="nationality" name="nationality" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="phone">Phone:</label><br>
            <input type="tel" id="phone" name="phone" required><br>
            <label for="residence">Residence:</label><br>
            <input type="text" id="residence" name="residence" required><br>
            <label for="team_id">Team ID:</label><br>
            <input type="number" id="team_id" name="team_id" required><br><br>
            <input type="submit" value="Submit">
            <input type="button" value="Cancel" onclick="window.location.href='athletes.php'">
        </form>
    </div>
    <div>
        <p>Athletes are the embodiment of determination, resilience, and passion. <br>
         They inspire us with their unwavering commitment to their craft, pushing the boundaries of human potential and achieving feats that seem impossible to the rest of us. 
         <br>Behind every victory, there's a story of countless hours of training, overcoming setbacks, and unwavering belief in oneself.</p>
        <br>
        <p>Athletes teach us the power of perseverance, showing that success is not just about talent but also about the relentless pursuit of excellence. 
            <br>They remind us that greatness is not achieved overnight but through consistent effort and dedication.</p>
        <br>
        <p>In the face of challenges, athletes demonstrate the importance of resilience, bouncing back from defeat with even greater determination. <br>
        They inspire us to never give up on our dreams, no matter how daunting the obstacles may seem.</p>
        <br>
        <p>Above all, athletes remind us that the human spirit is capable of incredible things. 
            <br>They motivate us to push beyond our limits, strive for greatness, and embrace the journey with courage and passion.</p>
    </div>
    <?php
// Database connection parameters

require_once "databaseConnection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $residence = $_POST['residence'];
    $teamID = $_POST['team_id']; // Corrected variable name

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO Athletes (Name, Age, Gender, Nationality, Email, Phone, Residence, Team_ID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisssssi", $name, $age, $gender, $nationality, $email, $phone, $residence, $teamID);

    // Check if the team ID exists in the Teams table
    $checkteamIDquery = "SELECT * FROM Teams WHERE Team_ID = ?";
    $stmt_check = $conn->prepare($checkteamIDquery);
    $stmt_check->bind_param("i", $teamID);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        // Execute the statement to insert the athlete
        if ($stmt->execute() === TRUE) {
            echo "New athlete added successfully";
        } else {
            echo "Error adding athlete: " . $stmt->error;
        }
    } else {
        echo "Error: Team ID $teamID does not exist";
    }

    $stmt->close();
    $stmt_check->close();
} else {
    echo "Error: Form not submitted";
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