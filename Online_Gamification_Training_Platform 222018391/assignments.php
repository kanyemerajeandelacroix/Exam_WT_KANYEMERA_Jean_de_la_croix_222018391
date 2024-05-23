<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>assignments</title>
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
    <h1 class="text-center text-white" style="font-family: impact; font-size: 50px; text-shadow: 1px 1px 15px blue; -webkit-text-stroke:0.1px white;">assignments
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
    <h1>assignments Form</h1>
        <form method="post" action="assignments.php">
        <label for="assignment_id">assignment_id :</label>
        <input type="number" id="assignment_id" name="assignment_id" required><br><br>
        <label for="course_id">course_id</label>
        <input type="number" id="course_id" name="course_id" required><br><br>
        <label for="assignment_name">assignment_name</label>
        <input type="text" id="assignment_name" name="assignment_name" required><br><br>
        <label for="deadline">deadline</label>
        <input type="date" id="deadline" name="deadline" required><br><br>
        <input type="submit" name="insert" value="Insert"><br><br>
    </form>
    <a href="./home.html">Go Back to Home</a>

    <!-- PHP Code to Insert Data -->
   <?php
    include('database_connection.php');

    // Check if the form is submitted for insert
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
        // Insert section
        $stmt = $connection->prepare("INSERT INTO   assignments (assignment_id,course_id, assignment_name,deadline) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $assid, $ciid, $assna, $asd);

        // Set parameters from POST and execute
        $assid = $_POST['assignment_id'];
        $ciid = $_POST['course_id'];
        $assna = $_POST['assignment_name'];
        $asd = $_POST['deadline'];

        if ($stmt->execute()) {
            echo "New record has been added successfully.<br><br>";
        } else {
            echo "Error inserting data: " . $stmt->error;
        }

        $stmt->close();
    }
    ?>

    <!-- Displaying Table of assignments -->
    <center><h2>Table of assignments </h2></center>
    <table>
        <tr>
            <th>assignment_id</th>
            <th>course_id</th>
            <th>assignment_name</th>
            <th>deadline</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
         include('database_connection.php');


        // SQL query to fetch data from the achivements table
        $sql = "SELECT * FROM assignments";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $assid = $row["assignment_id"]; // Added this line to fetch assignment_id
                echo "<tr>
                    <td>" . $row["assignment_id"] . "</td>
                    <td>" . $row["course_id"] . "</td>
                    <td>" . $row["assignment_name"] . "</td> 
                    <td>" . $row["deadline"] . "</td>
                    <td><a href='delete_assignments.php?assignment_id=$assid '>Delete</a></td> 
                    <td><a href='update_assignments.php?assignment_id=$assid '>Update</a></td> 
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
   <b><h2 class="text-center text-white" style="font-family: impact; font-size: 40px; text-shadow: 1px 1px 15px blue; -webkit-text-stroke:0.1px white;">UR CBE BIT  HUYE CAMPUS PREPARED BY KANYEMERA
  </center>
</footer>
</body>
</html>
