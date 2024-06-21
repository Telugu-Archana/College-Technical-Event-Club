<?php
session_start();
$host = "localhost";
$user = "root";
$password = '';
$db_name = "sign up";

$conn = new mysqli($host, $user, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user_id = isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : null;
if ($user_id !== null) {
    $sql = "SELECT * FROM admin WHERE admin_id = '$user_id'";
    $result = $conn->query($sql);
    if ($result === false) {
        die("Query failed: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        $user = array(
            'admin_id' => 'N/A',
            'role' =>'N/A',
            'name' => 'User Not Found',
            
        );
    }
} else {
    die("User ID is not provided");
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <title>User Data</title>
</head>
<body>
    <h2>Profile</h2>
    <center>
    <table>
            <th>ADMIN ID</th>
            <td><?php echo $user['admin_id']; ?></td>
        </tr>
        <tr>
            <th>Role</th>
            <td><?php echo $user['role']; ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?php echo $user['name']; ?></td>
        </tr>
        
            
    </table><br><br>
    <span>go back to the home page <a href="admin_main.html" class="nav-link">Home</a></span>
    </center>
</body>
</html>
