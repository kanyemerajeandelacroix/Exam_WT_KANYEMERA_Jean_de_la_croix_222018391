<?php
include('database_connection.php');

// Check if instructor_id is set
if(isset($_REQUEST['instructor_id'])) {
    $acid = $_REQUEST['instructor_id'];
    
    $stmt = $connection->prepare("SELECT * FROM instructors WHERE instructor_id = ?");
    $stmt->bind_param("i", $acid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $y = $row['instructor_name'];
        $z = $row['email'];
    } else {
        echo "Instructors not found.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update instructors</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body bgcolor="gray">
<center>
    <!-- Update instructors form -->
    <h2><u>Update Form of instructors</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="instructor_name">Instructor Name:</label>
        <input type="text" name="instructor_name" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo isset($z) ? $z : ''; ?>">
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
    $instructor_name = $_POST['instructor_name'];
    $email = $_POST['email'];
    // Update the instructors in the database
    $stmt = $connection->prepare("UPDATE instructors SET instructor_name=?, email=? WHERE instructor_id = ?");
    $stmt->bind_param("ssi", $instructor_name, $email, $acid);
    $stmt->execute();
    
    // Redirect to instructors.php
    header('Location: instructors.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
