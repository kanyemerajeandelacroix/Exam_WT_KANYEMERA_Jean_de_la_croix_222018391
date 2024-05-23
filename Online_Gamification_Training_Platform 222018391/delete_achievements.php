<?php
include('database_connection.php');

if(isset($_REQUEST['achievement_id'])) {
    $acaid = $_REQUEST['achievement_id'];
    
    $stmt = $connection->prepare("DELETE FROM achievements WHERE achievement_id = ?");
    $stmt->bind_param("i", $acaid);
    
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
            <input type="hidden" name="achievement_id" value="<?php echo $acaid; ?>">
            <input type="submit" value="Delete">
        </form>
        <?php
        if ($stmt->execute()) {
            echo "Record deleted successfully.<br><br><a href='achievements.php'>OK</a>";
        } else {
            echo "Error deleting data: " . $stmt->error;
        }
    ?>
    </body>
    </html>
    <?php

    $stmt->close();
} else {
    echo "achievement_id is not set.";
}

$connection->close();
?>
