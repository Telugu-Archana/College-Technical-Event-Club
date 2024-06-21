<?php
$host = "localhost";
$user = "root";
$password = '';
$db_name = "sign up";

// Retrieve form data
$t = $_POST["title"];
$g = $_POST["gallery_link"];
$f = $_POST["feedback_link"];

// Establish connection
$con = mysqli_connect($host, $user, $password, $db_name);

if (mysqli_connect_errno()) {  
    die("Failed to connect with MySQL: " . mysqli_connect_error());  
} else {
    // Prepare and execute SELECT query
    $sql = "SELECT * FROM events WHERE title='$t'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }

    // Check if the event with the given title exists
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        // Event found, update gallery_link and feedback_link
        $sq = "UPDATE events SET gallery_link='$g', feedback_link='$f' WHERE title='$t'";
        
        if (mysqli_query($con, $sq)) {
            echo "<h1>Successfully updated event</h1>";
        } else {
            die("Update failed: " . mysqli_error($con));
        }
    } else {
        echo "<h1>No such events found</h1>";
    }

    mysqli_close($con);
}
?>
