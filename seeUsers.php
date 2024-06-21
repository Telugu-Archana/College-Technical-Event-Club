<?php
$host = "localhost";
$user = "root";
$password = '';
$db_name = "sign up";

$conn = new mysqli($host, $user, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM root";
$result = $conn->query($sql);

if ($result === false) {
    die("Query failed: " . $conn->error);
}

$users = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
} else {
    echo "No users found.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="css/seeUsers.css">
</head>
<body>
    <h2>User Data </h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Roll No</th>
            <th>Branch</th>
            <th>Year</th>
            <th>Gender</th>
            <th>Phone</th>
         
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['fname']; ?></td>
                <td><?php echo $user['lname']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['rollno']; ?></td>
                <td><?php echo $user['branch']; ?></td>
                <td><?php echo $user['year']; ?></td>
                <td><?php echo $user['gender']; ?></td>
                <td><?php echo $user['phone']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <center>
    <form method="post" action="update_users.html">
                        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                        <input type="submit" value="Update CSI-id">
                    </form>
    </center>
</body>
</html>
