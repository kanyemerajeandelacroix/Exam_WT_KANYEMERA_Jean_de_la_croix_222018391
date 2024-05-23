<?php
include('database_connection.php');

if(isset($_REQUEST['instructor_id'])) {
    $caid = $_REQUEST['instructor_id'];
    
    $stmt = $connection->prepare("DELETE FROM instructors WHERE instructor_id = ?");
    $stmt->bind_param("i", $caid);
    
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Record</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body bgcolor="grey">
        <form method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="instructor_id" value="<?php echo $caid; ?>">
            <input type="submit" value="Delete">
        </form>
        <?php
        if ($stmt->execute()) {
            echo "Record deleted successfully.<br><br><a href='instructors.php'>OK</a>";
        } else {
            echo "Error deleting data: " . $stmt->error;
        }
    ?>
    </body>
    </html>
    <?php

    $stmt->close();
} else {
    echo "instructor_id is not set.";
}

$connection->close();
?>
