<?php
include('database_connection.php');

// Check if enrollment_id is set
if(isset($_REQUEST['enrollment_id'])) {
    $enid = $_REQUEST['enrollment_id'];
    
    $stmt = $connection->prepare("SELECT * FROM enrollments WHERE enrollment_id = ?");
    $stmt->bind_param("i", $enid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $y = $row['student_name'];
        $z = $row['course_id'];
    } else {
        echo "enrollments not found.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update enrollments</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body bgcolor="gray">
<center>
    <!-- Update enrollments form -->
    <h2><u>Update Form of enrollments</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="student_name">Student Name:</label>
        <input type="text" name="student_name" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="course_id">Course ID:</label>
        <input type="number" name="course_id" value="<?php echo isset($z) ? $z : ''; ?>">
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
    $student_name = $_POST['student_name'];
    $course_id = $_POST['course_id'];
    // Update the enrollments in the database
    $stmt = $connection->prepare("UPDATE enrollments SET student_name=?, course_id=? WHERE enrollment_id = ?");
    $stmt->bind_param("ssi", $student_name, $course_id, $enid);
    $stmt->execute();
    
    // Redirect to enrollments.php
    header('Location: enrollments.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
