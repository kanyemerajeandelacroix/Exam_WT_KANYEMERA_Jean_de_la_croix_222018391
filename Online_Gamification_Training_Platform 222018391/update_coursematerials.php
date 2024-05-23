<?php
include('database_connection.php');

// Check if material_id is set
if(isset($_REQUEST['material_id'])) {
    $acid = $_REQUEST['material_id'];
    
    $stmt = $connection->prepare("SELECT * FROM coursematerials WHERE material_id = ?");
    $stmt->bind_param("i", $acid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $y = $row['course_id'];
        $z = $row['material_name'];
        $d = $row['material_type'];
        $v = $row['material_url'];
    } else {
        echo "coursematerials not found.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update coursematerials</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body bgcolor="gray">
<center>
    <!-- Update coursematerials form -->
    <h2><u>Update Form of coursematerials</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="course_id">Course ID:</label>
        <input type="number" name="course_id" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="material_name">material_name:</label>
        <input type="text" name="material_name" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        <label for="material_type">material_type:</label>
        <input type="text" name="material_type" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>
         <label for="material_url">material_url:</label>
        <input type="text" name="material_url" value="<?php echo isset($v) ? $v : ''; ?>">
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
    $material_name = $_POST['material_name'];
    $material_type = $_POST['material_type'];
    $material_url = $_POST['material_url'];
    // Update the coursematerials in the database
    $stmt = $connection->prepare("UPDATE coursematerials SET course_id=?, material_name=?, material_type=? ,material_url=? WHERE material_id = ?");
    $stmt->bind_param("issss", $course_id, $material_name, $material_type, $material_url, $acid);
    $stmt->execute();
    
    // Redirect to coursematerials.php
    header('Location: coursematerials.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
