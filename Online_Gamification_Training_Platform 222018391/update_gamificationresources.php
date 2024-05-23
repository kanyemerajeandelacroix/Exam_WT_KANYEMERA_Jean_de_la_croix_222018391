<?php
include('database_connection.php');

// Check if resource_id is set
if(isset($_REQUEST['resource_id'])) {
    $acid = $_REQUEST['resource_id'];
    
    $stmt = $connection->prepare("SELECT * FROM gamificationresources WHERE resource_id = ?");
    $stmt->bind_param("i", $acid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $y = $row['resource_name'];
        $z = $row['course_id'];
    } else {
        echo "Gamification resources not found.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update gamificationresources</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body bgcolor="gray">
<center>
    <!-- Update gamificationresources form -->
    <h2><u>Update Form of gamificationresources</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="resource_name">Resource Name:</label>
        <input type="text" name="resource_name" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="course_id">Course ID:</label>
        <input type="text" name="course_id" value="<?php echo isset($z) ? $z : ''; ?>">
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
    $resource_name = $_POST['resource_name'];
    $course_id = $_POST['course_id'];
    // Update the gamificationresources in the database
    $stmt = $connection->prepare("UPDATE gamificationresources SET resource_name=?, course_id=? WHERE resource_id = ?");
    $stmt->bind_param("ssi", $resource_name, $course_id, $acid);
    $stmt->execute();
    
    // Redirect to gamificationresources.php
    header('Location: gamificationresources.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
