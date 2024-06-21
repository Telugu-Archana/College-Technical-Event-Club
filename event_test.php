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

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
} else {
    echo "No events found.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Table - Admin Page</title>
    <link rel="stylesheet" href="css/admin_event.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        
        h2 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a {
            color: #008CBA;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: #005684;
        }
    </style>
</head>
<body>
    <h2>Events Data - Admin Page</h2>
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
                <td><?php echo $event['description']; ?></td>
                <td><?php echo $event['image']; ?></td>
                <td><a href="<?php echo $event['register_link']; ?>" target="_blank"><?php echo $event['register_link']; ?></a></td>
                <td><a href="<?php echo $event['gallery_link']; ?>" target="_blank"><?php echo $event['gallery_link']; ?></a></td>
                <td><a href="<?php echo $event['feedback_link']; ?>" target="_blank"><?php echo $event['feedback_link']; ?></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <form method="post" action="admin_add_event.html">
                        <input type="submit" value="Add Event">
                    </form>
                    <form method="post" action="admin_update_event.html">
                        <input type="submit" value="Update Event">
                    </form>
</body>
</html>
