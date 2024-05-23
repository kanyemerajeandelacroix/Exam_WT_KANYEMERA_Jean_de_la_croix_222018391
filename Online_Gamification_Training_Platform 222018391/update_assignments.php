<?php
include('database_connection.php');

// Check if assignment_id is set
if(isset($_REQUEST['assignment_id'])) {
    $acid = $_REQUEST['assignment_id'];
    
    $stmt = $connection->prepare("SELECT * FROM assignments WHERE assignment_id = ?");
    $stmt->bind_param("i", $acid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $y = $row['course_id'];
        $z = $row['assignment_name'];
        $d = $row['deadline'];
    } else {
        echo "Assignment not found.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update assignments</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body bgcolor="gray">
<center>
    <!-- Update assignments form -->
    <h2><u>Update Form of assignments</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="course_id">Course ID:</label>
        <input type="number" name="course_id" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="assignment_name">Assignment Name:</label>
        <input type="text" name="assignment_name" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        <label for="deadline">Deadline:</label>
        <input type="date" name="deadline" value="<?php echo isset($d) ? $d : ''; ?>">
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
    $course_id = $_POST['course_id'];
    $assignment_name = $_POST['assignment_name'];
    $deadline = $_POST['deadline'];
    // Update the assignments in the database
    $stmt = $connection->prepare("UPDATE assignments SET course_id=?, assignment_name=?, deadline=? WHERE assignment_id = ?");
    $stmt->bind_param("isss", $course_id, $assignment_name, $deadline, $acid);
    $stmt->execute();
    
    // Redirect to assignments.php
    header('Location: assignments.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
