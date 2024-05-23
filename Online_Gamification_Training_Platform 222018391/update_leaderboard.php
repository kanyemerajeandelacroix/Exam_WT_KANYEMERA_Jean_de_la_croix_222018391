<?php
include('database_connection.php');

// Check if leaderboard_id is set
if(isset($_REQUEST['leaderboard_id'])) {
    $acid = $_REQUEST['leaderboard_id'];
    
    $stmt = $connection->prepare("SELECT * FROM leaderboard WHERE leaderboard_id = ?");
    $stmt->bind_param("i", $acid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $y = $row['course_id'];
        $z = $row['points'];
    } else {
        echo "Leaderboard not found.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update leaderboard</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body bgcolor="gray">
<center>
    <!-- Update leaderboard form -->
    <h2><u>Update Form of leaderboard</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="course_id">Course ID:</label>
        <input type="text" name="course_id" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="points">Points:</label>
        <input type="text" name="points" value="<?php echo isset($z) ? $z : ''; ?>">
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
    $points = $_POST['points'];
    // Update the leaderboard in the database
    $stmt = $connection->prepare("UPDATE leaderboard SET course_id=?, points=? WHERE leaderboard_id = ?");
    $stmt->bind_param("sii", $course_id, $points, $acid);
    $stmt->execute();
    
    // Redirect to leaderboard.php
    header('Location: leaderboard.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
