<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LEADERBORD</title>
  <style>
    /* CSS styles for the page */
    /* Body style */
    body {
      margin: 0;
      padding: 0;
      font-family: 'Times New Roman', serif;
      background:seagreen;
    }
    /* Link styles */
    a {
      padding: 10px;
      color:white;
      text-decoration: none;
      margin-right: 15px;
    }
    a:visited {
      color: black;
    }
    a:link {
      color:black;
    }
    a:hover {
      background-color: black;
    }
    a:active {
      background-color: black;
    }
    /* Button style */
    button.btn {
      margin-left: 15px;
      margin-top: 4px;
    }
    /* Form input style */
    input.form-control {
      margin-left: 15px;
      padding: 8px;
    }
    /* Section style */
    section {
      padding: 71px;
      border-bottom: 1px solid #ddd;
    }
    /* Footer style */
    footer {
      text-align: center;
      padding: 15px;
      background-color: grey;
    }
    /* Header style */
    header {
      background-color: grey;
      padding: 10px;
      text-align: center;
    }
    /* Navigation menu style */
    ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
      display: flex;
      align-items: center;
    }
    li {
      margin-right: 10px;
    }
    li img {
      vertical-align: middle;
    }
    /* Dropdown menu style */
    .dropdown {
      position: relative;
      display: inline-block;
    }
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow:0;
      z-index: 1;
    }
    .dropdown:hover .dropdown-content {
      display: block;
    }
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }
    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }
    /* Table style */
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color:#green;
}
  </style>
</head>
<body bgcolor="gray">
  <!-- Header section -->
  <header>
   <h1 class="text-center text-white" style="font-family: impact; font-size: 50px; text-shadow: 1px 1px 15px blue; -webkit-text-stroke:0.1px white;"> LEADERBORD
  </header><br>
  <!-- Search form -->
  <form class="d-flex" role="search" action="search.php">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form><br>
  <!-- Navigation menu -->
  <ul>
    <li style="display: inline; margin-right: 10px;"><a href="./home.html" style="padding: 10px; color: white; background-color: lightpink; text-decoration: none; margin-right: 15px;">HOME</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="./about.html" style="padding: 10px; color: white; background-color: lightpink; text-decoration: none; margin-right: 15px;">ABOUT</a></li>
        <li style="display: inline; margin-right: 10px;"><a href="./contact.html" style="padding: 10px; color: white; background-color: lightpink; text-decoration: none; margin-right: 15px;">CONTACT</a></li>

    <!-- Dropdown menu for tables -->
    <li class="dropdown">
      <a href="#" style="padding: 20px; color: white; background-color:lightpink; text-decoration: none;">Tables</a>
      <div class="dropdown-content">
        <a href="./achievements.php">achievements</a>
        <a href="./assignments.php">assignments</a>
        <a href="./coursematerials.php">coursematerials</a>
        <a href="./courses.php">courses </a>
        <a href="./enrollments.php">enrollments</a>
        <a href="./gamificationresources.php">gamificationresources</a>
        <a href="./instructors.php">instructors</a>
        <a href="./leaderboard.php">leaderboard </a>
        <a href="./submissions.php">submissions</a>
      </div>
    </li>
    <!-- Dropdown menu for settings -->
    <li class="dropdown">
      <a href="#" style="padding: 20px; color: white; background-color:lightpink; text-decoration: none;">Settings</a>
      <div class="dropdown-content">
        <a href="login.html">Login</a>
        <a href="register.html">Register</a>
        <a href="logout.php">Logout</a>
      </div>
    </li>
  </ul>
</header>

<section>
    <h1>leaderboard Form</h1>
    <form method="post" action="leaderboard.php">
        <label for="leaderboard_id">Leaderboard ID:</label>
        <input type="number" id="leaderboard_id" name="leaderboard_id" required><br><br>
        <label for="course_id">Course ID:</label>
        <input type="number" id="course_id" name="course_id" required><br><br>
        <label for="points">Points:</label>
        <input type="text" id="points" name="points" required><br><br>
        <label for="gender">Gender:</label>
        <select name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br><br>
        <input type="submit" name="insert" value="Insert"><br><br>
    </form>
    <a href="./home.html">Go Back to Home</a>

    <!-- PHP Code to Insert Data -->
    <?php
    include('database_connection.php');

    // Check if the form is submitted for insert
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
        // Insert section
        $stmt = $connection->prepare("INSERT INTO leaderboard (leaderboard_id, course_id, points) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $leaderboard_id, $course_id, $points);

        // Set parameters from POST and execute
        $leaderboard_id = $_POST['leaderboard_id'];
        $course_id = $_POST['course_id'];
        $points = $_POST['points'];

        if ($stmt->execute()) {
            echo "New record has been added successfully.<br><br>";
        } else {
            echo "Error inserting data: " . $stmt->error;
        }

        $stmt->close();
    }
    ?>

    <!-- Displaying Table of leaderboard -->
    <center><h2>Table of leaderboard</h2></center>
    <table>
        <tr>
            <th>Leaderboard ID</th>
            <th>Course ID</th>
            <th>Points</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        include('database_connection.php');

        // SQL query to fetch data from the leaderboard table
        $sql = "SELECT * FROM leaderboard";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $leaderboard_id = $row["leaderboard_id"]; // Removed extra space after field name
                echo "<tr>
                    <td>" . $row["leaderboard_id"] . "</td>
                    <td>" . $row["course_id"] . "</td>
                    <td>" . $row["points"] . "</td> 
                    <td><a href='delete_leaderboard.php?leaderboard_id=$leaderboard_id'>Delete</a></td> 
                    <td><a href='update_leaderboard.php?leaderboard_id=$leaderboard_id'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No data found</td></tr>";
        }
        // Close connection
        $connection->close();
        ?>
    </table>
</section>

<footer>
    <center> 
        <b><h2 class="text-center text-white" style="font-family: impact; font-size: 30px; text-shadow: 1px 1px 15px blue; -webkit-text-stroke:0.1px white;">UR CBE BIT  HUYE CAMPUS PREPARED BY KANYEMERA
    </center>
</footer>
</body>
</html>
