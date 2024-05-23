
<?php
include('database_connection.php');

// Check if achievement_id is set
if(isset($_REQUEST['achievement_id'])) {
    $acid = $_REQUEST['achievement_id'];
    
    $stmt  = $connection->prepare("SELECT * FROM achievements WHERE achievement_id=?");
    $stmt ->bind_param("i", $acid);
    $stmt ->execute();
    $result = $stmt ->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $y = $row['achievement_name'];
        $z = $row['achievement_date'];
    } else {
        echo "achievements not found.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update achievements</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body bgcolor="gray"><center>
    <!-- Update achievements form -->
    <h2><u>Update Form of achievements</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="achievement_name">achievement_name:</label>
        <input type="text" name="achievement_name" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="achievement_date">achievement_date:</label>
        <input type="text" name="achievement_date" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
include('database_connection.php');
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $achievement_name = $_POST['achievement_name'];
    $achievement_date  = $_POST['achievement_date'];
    
    // Update the achievements in the database
    $stmt  = $connection->prepare("UPDATE achievements SET achievement_name=?, achievement_date=? WHERE achievement_id =?");
    $stmt  ->bind_param("ssd", $achievement_name, $achievement_date , $acid);
    $stmt  ->execute();
    
    // Redirect to achievements.php
    header('Location: achievements.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
