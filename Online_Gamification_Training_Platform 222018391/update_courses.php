<?php
include('database_connection.php');

// Check if course_id is set
if(isset($_REQUEST['course_id'])) {
    $acid = $_REQUEST['course_id'];
    
    $stmt = $connection->prepare("SELECT * FROM courses WHERE course_id = ?");
    $stmt->bind_param("i", $acid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $y = $row['course_name'];
        $z = $row['instructor_id'];
    } else {
        echo "Course not found.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update courses</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body bgcolor="gray">
<center>
    <!-- Update courses form -->
    <h2><u>Update Form of courses</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="course_name">Course Name:</label>
        <input type="text" name="course_name" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="instructor_id">Instructor ID:</label>
        <input type="number" name="instructor_id" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form>
</center>
</body>
</html>

<?php
include('database_connection.php');
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $course_name = $_POST['course_name'];
    $instructor_id = $_POST['instructor_id'];
    // Update the courses in the database
    $stmt = $connection->prepare("UPDATE courses SET course_name=?, instructor_id=? WHERE course_id = ?");
    $stmt->bind_param("ssi", $course_name, $instructor_id, $acid);
    $stmt->execute();
    
    // Redirect to courses.php
    header('Location: courses.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
