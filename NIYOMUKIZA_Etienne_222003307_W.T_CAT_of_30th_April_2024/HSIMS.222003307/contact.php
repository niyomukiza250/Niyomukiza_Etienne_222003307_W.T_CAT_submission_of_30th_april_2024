<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Huye Sports</title>
    <style>
        /* Internal CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 50;
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

        main {
            padding: 20px;
            text-align: left; /* Center align the content */
        }

        .container {
            width: 100%;
            margin: auto;
            padding: 20px;
            background-color: #acd4e9;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: #fff;
            text-transform: uppercase;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        main {
            padding: 20px;
        }

        form {
            margin-top: 20px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="email"],
        form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form textarea {
            height: 150px;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
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
    <main>   <h2>Contact Us</h2>
        <p>If you have any questions or feedback, please feel free to contact us using the form below:</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
            <input type="submit" value="Submit">
        </form>
        
        <?php
// Database connection parameters
require_once "databaseConnection.php";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare and execute the insertion query
    $stmt = $conn->prepare("INSERT INTO ContactUs (Name, Email, Message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    
    if ($stmt->execute() === TRUE) {
        // Display success message using JavaScript
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    alert("Message submitted successfully");
                });
              </script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

    </main>
    <P>Or you can get to us on:<br>
    Tel: 0787133985<br>
    Email: urhuyesports@gmail.com<br>
    </P>
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
