<?php
$conn = new mysqli("localhost", "root", "", "sign up");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$title = $_POST['title'];
$description = $_POST['description'];
$image_url = $_POST['image_url'];
$register_link = $_POST['register_link'];

$sql = "INSERT INTO events VALUES ('$title', '$description', '$image_url', '$register_link', '','')";
if ($conn->query($sql) === TRUE) {
    echo "<h1>Event added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
