<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>achivements</title>
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
      box-shadow: 0px 8px 16px 0px black(0,0,0,0.2);
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
      background-color:#f2f2f2;
}
  </style>
</head>
<body bgcolor="gray">
  <!-- Header section -->
  <header>
   <h1 class="text-center text-white" style="font-family: impact; font-size: 50px; text-shadow: 1px 1px 15px blue; -webkit-text-stroke:0.1px white;">achievements
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
<body>
    <section>
    <h1>achievements Form</h1>
    <form method="post" action="achievements.php">
        <label for="achievement_id">achievement_id :</label>
        <input type="number" id="achievement_id" name="achievement_id" required><br><br>
        <label for="achievement_name">achievement_name</label>
        <input type="text" id="achievement_name" name="achievement_name" required><br><br>
         <label for="achievement_date">achievement_date</label>
        <input type="date" id="achievement_date" name="achievement_date" required><br>
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
        $stmt = $connection->prepare("INSERT INTO   achievements (achievement_id,   achievement_name, achievement_date) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $acid, $acname, $acdt);

        // Set parameters from POST and execute
        $acid = $_POST['achievement_id'];
        $acname = $_POST['achievement_name'];
        $acdt = $_POST['achievement_date'];

        if ($stmt->execute()) {
            echo "New record has been added successfully.<br><br>";
        } else {
            echo "Error inserting data: " . $stmt->error;
        }

        $stmt->close();
    }
    ?>

    <!-- Displaying Table of achievements -->
    <center><h2>Table of achievements </h2></center>
    <table>
        <tr>
            <th>achievement_id</th>
            <th>achievement_name</th>
            <th>achievement_date</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
         include('database_connection.php');


        // SQL query to fetch data from the achivements table
        $sql = "SELECT * FROM achievements";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $acid = $row["achievement_id"]; // Added this line to fetch achievement_id
                echo "<tr>
                    <td>" . $row["achievement_id"] . "</td>
                    <td>" . $row["achievement_name"] . "</td>
                    <td>" . $row["achievement_date"] . "</td> 
                    <td><a href='delete_achievements.php?achievement_id=$acid'>Delete</a></td> 
                    <td><a href='update_achievements.php?achievement_id=$acid'>Update</a></td> 
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
    <b><h2 class="text-center text-white" style="font-family: impact; font-size: 50px; text-shadow: 1px 1px 15px blue; -webkit-text-stroke:0.1px white;">UR CBE BIT  HUYE CAMPUS PREPARED BY KANYEMERA
  </center>
</footer>
</body>
</html>
