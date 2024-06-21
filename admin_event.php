<?php
$host = "localhost";
$user = "root";
$password = '';
$db_name = "sign up";

$conn = new mysqli($host, $user, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM events";
$result = $conn->query($sql);

if ($result === false) {
    die("Query failed: " . $conn->error);
}

$events = array();


    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    
} 

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - Admin </title>
    <link rel="stylesheet" href="css/admin_event.css">
</head>
<body>
    <h2>Events</h2>
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Register</th>
            <th>Gallery</th>
            <th>Feedback</th>
        </tr>
        <?php foreach ($events as $event) : ?>
            <tr>
                <td><?php echo $event['title']; ?></td>
                <td class="description"><?php echo $event['description']; ?></td>
                <td><a href="<?php echo $event['image_url']; ?>" target="_blank"><?php echo $event['image_url']; ?></a></td>
                <td class="register"><a href="<?php echo $event['register_link']; ?>" target="_blank"><?php echo $event['register_link']; ?></a></td>
                <td class="gallery"><a href="<?php echo $event['gallery_link']; ?>" target="_blank"><?php echo $event['gallery_link']; ?></a></td>
                <td class="feedback"><a href="<?php echo $event['feedback_link']; ?>" target="_blank"><?php echo $event['feedback_link']; ?></a></td>
            </tr>
        <?php endforeach; ?>
    </table><br>
    <center>
    <form method="post" action="admin_add_event.html">
                        <input type="submit" value="Add Event">
                    </form><br>
                    <form method="post" action="admin_update_event.html">
                        <input type="submit" value="Update Event">
                    </form>
</body>
</html>
