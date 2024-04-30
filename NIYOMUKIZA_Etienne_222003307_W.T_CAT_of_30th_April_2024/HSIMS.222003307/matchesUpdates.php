<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>matcheas Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Add your CSS styles here */
                /* Add your CSS styles here */
                body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header img {
            width: 50px;
            margin-right: 20px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
            position: relative;
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
            border-radius: 5px;
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
            border-radius: 5px;
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
            border-radius: 5px;
        }

        .signin a:hover {
            background-color: #45a049;
        }

        main {
            padding: 20px;
            text-align: center;
        }

        .btn-success {
            padding: 8px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-success:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #4CAF50;
        }

        .btn-close {
            float: right;
            cursor: pointer;
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
    <?php
// Database connection parameters
require_once "databaseConnection.php";
?>

<main>
    <h2>Matches Records</h2>
    <div class="container">
        <!-- Link to add new match -->
        <a href="matches.php" class="btn btn-success">Add New</a>
    </div>
    <br><br><br>
    <table id="dataTable" class="table table-hover text-center">
        <tr>
            <th>ID</th>
            <th>Competition ID</th>
            <th>Team 1</th>
            <th>Team 2</th>
            <th>Date</th>
            <th>Venue</th>
            <th>Actions</th>
        </tr><?php
// Fetch data from the Matches table
$sql = "SELECT Matches.Match_ID, Matches.Competition_ID, Teams1.Team_Name AS Team1_Name, Teams2.Team_Name AS Team2_Name, Matches.Match_Date, Matches.Venue FROM Matches 
        INNER JOIN Teams AS Teams1 ON Matches.Team1_ID = Teams1.Team_ID 
        INNER JOIN Teams AS Teams2 ON Matches.Team2_ID = Teams2.Team_ID";
$result = $conn->query($sql);

// Output data of each row
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Match_ID"] . "</td>"; // Match ID
        echo "<td>" . $row["Competition_ID"] . "</td>"; // Competition ID
        echo "<td>" . $row["Team1_Name"] . "</td>"; // Team 1 Name
        echo "<td>" . $row["Team2_Name"] . "</td>"; // Team 2 Name
        echo "<td>" . $row["Match_Date"] . "</td>"; // Match Date
        echo "<td>" . $row["Venue"] . "</td>"; // Venue
        echo "<td>";
        // Edit and delete actions
        echo "<a href='edit_match.php?updateID=" . $row["Match_ID"] . "'><i class='fas fa-edit'></i></a>";
        echo "<a href='delete_match.php?deleteID=" . $row["Match_ID"] . "'><i class='fas fa-trash'></i></a>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No data found</td></tr>";
}

$conn->close();
?>

    </table>
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
