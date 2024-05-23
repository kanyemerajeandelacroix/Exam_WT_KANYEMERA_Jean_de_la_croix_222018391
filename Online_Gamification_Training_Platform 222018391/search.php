<?php
include('database_connection.php');

// Check if the 'query' GET parameter is set
if (isset($_GET['query'])) {
     
    // Sanitize input to prevent SQL injection
    $searchTerm = $connection->real_escape_string($_GET['query']);

    // Perform the search query for achievements
    $sql = "SELECT * FROM achievements WHERE achievement_name LIKE '%$searchTerm%'";
    $result_achievements = $connection->query($sql);

    // Perform the search query for assignments
    $sql = "SELECT * FROM assignments WHERE assignment_name LIKE '%$searchTerm%'";
    $result_assignments = $connection->query($sql);

    // Perform the search query for course materials
    $sql = "SELECT * FROM coursematerials WHERE material_name LIKE '%$searchTerm%'";
    $result_coursematerials = $connection->query($sql);

    // Perform the search query for courses
    $sql = "SELECT * FROM courses WHERE course_name LIKE '%$searchTerm%'";
    $result_courses = $connection->query($sql);

    // Perform the search query for enrollments
    $sql = "SELECT * FROM enrollments WHERE student_name LIKE '%$searchTerm%'";
    $result_enrollments = $connection->query($sql);

    // Perform the search query for gamification resources
    $sql = "SELECT * FROM gamificationresources WHERE resource_name LIKE '%$searchTerm%'";
    $result_gamificationresources = $connection->query($sql);

    // Perform the search query for instructors
    $sql = "SELECT * FROM instructors WHERE instructor_name LIKE '%$searchTerm%'";
    $result_instructors = $connection->query($sql);

    // Perform the search query for leaderboard
    $sql = "SELECT * FROM leaderboard WHERE points LIKE '%$searchTerm%'";
    $result_leaderboard = $connection->query($sql);

    // Perform the search query for submissions
    $sql = "SELECT * FROM submissions WHERE submission_date LIKE '%$searchTerm%'";
    $result_submissions = $connection->query($sql);
    
    // Output search results
    echo "<h2><u>Search Results:</u></h2>";

    // Display achievements
    echo "<h3>Achievements:</h3>";
    if ($result_achievements->num_rows > 0) {
        while ($row = $result_achievements->fetch_assoc()) {
            echo "<p>" . $row['achievement_name'] . "</p>";
        }
    } else {
        echo "<p>No achievements found matching the search term: " . $searchTerm . "</p>";
    }

    // Display assignments
    echo "<h3>Assignments:</h3>";
    if ($result_assignments->num_rows > 0) {
        while ($row = $result_assignments->fetch_assoc()) {
            echo "<p>" . $row['assignment_name'] . "</p>";
        }
    } else {
        echo "<p>No assignments found matching the search term: " . $searchTerm . "</p>";
    }

    // Display course materials
    echo "<h3>Course Materials:</h3>";
    if ($result_coursematerials->num_rows > 0) {
        while ($row = $result_coursematerials->fetch_assoc()) {
            echo "<p>" . $row['material_name'] . "</p>";
        }
    } else {
        echo "<p>No course materials found matching the search term: " . $searchTerm . "</p>";
    }

    // Display courses
    echo "<h3>Courses:</h3>";
    if ($result_courses->num_rows > 0) {
        while ($row = $result_courses->fetch_assoc()) {
            echo "<p>" . $row['course_name'] . "</p>";
        }
    } else {
        echo "<p>No courses found matching the search term: " . $searchTerm . "</p>";
    }

    // Display enrollments
    echo "<h3>Enrollments:</h3>";
    if ($result_enrollments->num_rows > 0) {
        while ($row = $result_enrollments->fetch_assoc()) {
            echo "<p>" . $row['student_name'] . "</p>";
        }
    } else {
        echo "<p>No enrollments found matching the search term: " . $searchTerm . "</p>";
    }

    // Display gamification resources
    echo "<h3>Gamification Resources:</h3>";
    if ($result_gamificationresources->num_rows > 0) {
        while ($row = $result_gamificationresources->fetch_assoc()) {
            echo "<p>" . $row['resource_name'] . "</p>";
        }
    } else {
        echo "<p>No gamification resources found matching the search term: " . $searchTerm . "</p>";
    }

    // Display instructors
    echo "<h3>Instructors:</h3>";
    if ($result_instructors->num_rows > 0) {
        while ($row = $result_instructors->fetch_assoc()) {
            echo "<p>" . $row['instructor_name'] . "</p>";
        }
    } else {
        echo "<p>No instructors found matching the search term: " . $searchTerm . "</p>";
    }

    // Display leaderboard
    echo "<h3>Leaderboard:</h3>";
    if ($result_leaderboard->num_rows > 0) {
        while ($row = $result_leaderboard->fetch_assoc()) {
            echo "<p>" . $row['points'] . "</p>";
        }
    } else {
        echo "<p>No leaderboard found matching the search term: " . $searchTerm . "</p>";
    }

    // Display submissions
    echo "<h3>Submissions:</h3>";
    if ($result_submissions->num_rows > 0) {
        while ($row = $result_submissions->fetch_assoc()) {
            echo "<p>" . $row['submission_date'] . "</p>";
        }
    } else {
        echo "<p>No submissions found matching the search term: " . $searchTerm . "</p>";
    }

    $connection->close();
} else {
    echo "No search term was provided.";
}
?>
