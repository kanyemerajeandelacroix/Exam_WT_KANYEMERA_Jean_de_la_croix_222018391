<?php
include('database_connection.php');

// Check if submission_id is set
if(isset($_REQUEST['submission_id'])) {
    $acid = $_REQUEST['submission_id'];
    
    $stmt = $connection->prepare("SELECT * FROM submissions WHERE submission_id = ?");
    $stmt->bind_param("i", $acid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $y = $row['assignment_id'];
        $z = $row['submission_date'];
        $d = $row['submission_text'];
    } else {
        echo "Submission not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update submissions</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body bgcolor="gray">
<center>
    <!-- Update submissions form -->
    <h2><u>Update Form of submissions</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="assignment_id">Assignment ID:</label>
        <input type="text" name="assignment_id" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="submission_date">Submission Date:</label>
        <input type="date" name="submission_date" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        <label for="submission_text">Submission Text:</label>
        <input type="text" name="submission_text" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>
        <input type="hidden" name="submission_id" value="<?php echo $acid; ?>">
        <input type="submit" name="up" value="Update">
        
    </form>
</center>
</body>
</html>

<?php
include('database_connection.php');
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $assignment_id = $_POST['assignment_id'];
    $submission_date = $_POST['submission_date'];
    $submission_text = $_POST['submission_text'];
    $submission_id = $_POST['submission_id'];
    // Update the submissions in the database
    $stmt = $connection->prepare("UPDATE submissions SET assignment_id=?, submission_date=?, submission_text=? WHERE submission_id = ?");
    $stmt->bind_param("issi", $assignment_id, $submission_date, $submission_text, $submission_id);
    $stmt->execute();
    
    // Redirect to submissions.php
    header('Location: submissions.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
