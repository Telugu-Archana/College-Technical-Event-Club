<?php
// Assuming the user ID is stored in a session variable
session_start();

$host = "localhost";
$user = "root";
$password = '';
$db_name = "sign up";

$conn = new mysqli($host, $user, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user ID from the session or another source
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if ($user_id !== null) {
    $sql = "SELECT * FROM root WHERE id = '$user_id'";
    
    $result = $conn->query($sql);

    if ($result === false) {
        die("Query failed: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        $user = array(
            'name' => 'User Not Found',
            'csi_id' => '',
            'roll_no' => '',
            'email' => '',
            'gender' => '',
            'branch' => '',
            'year' => '',
            'phone' => '',
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
        <tr>
            <th>Name</th>
            <td><?php echo $user['fname']; ?> <?php echo $user['lname']; ?></td>
        </tr>
            <th>CSI ID</th>
            <td><?php echo $user['id']; ?></td>
        </tr>
        <tr>
            <th>Roll No</th>
            <td><?php echo $user['rollno']; ?></td>
        </tr>
        <tr>
            <th>email</th>
            <td><?php echo $user['email']; ?></td>
        </tr>
        <tr>
            <th>Gender</th>
            <td><?php echo $user['gender']; ?></td>
        </tr>
        <tr>
            <th>Branch</th>
            <td><?php echo $user['branch']; ?></td>
        </tr>
        <tr>
            <th>Year</th>
            <td><?php echo $user['year']; ?></td>
        </tr>
        <tr>
            <th>Phone No</th>
            <td><?php echo $user['phone']; ?></td>
        </tr>
    </table><br><br>
    <span> <a href="update_user_profile.php" class="nav-link">Update</a></span><br><br><br>
    <span>go back to the home page <a href="main.html" class="nav-link">Home</a></span>
    </center>
</body>
</html>
