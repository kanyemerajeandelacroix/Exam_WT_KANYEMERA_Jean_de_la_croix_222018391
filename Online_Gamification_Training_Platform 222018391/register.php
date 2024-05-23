<?php
include('database_connection.php');
// Handling POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieving form data
    $fname  = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['Username'];
    $email = $_POST['email'];
    $telephone = $_POST['Telephone'];
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $activation_code = $_POST['activation_code'];
     // Preparing SQL query
    $sql = "INSERT INTO users (firstname, lastname, username, email,    telephone , password , activation_code) VALUES ('$fname','$lname','$username', '$email', '$telephone','$password','$activation_code')";
     // Executing SQL query
    if ($connection->query($sql) === TRUE) {
        // Redirecting to login page on successful registration
        header("Location: login.html");
        exit();

    } else {
        // Displaying error message if query execution fails
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}


// Closing database connection
$connection->close();
?>
