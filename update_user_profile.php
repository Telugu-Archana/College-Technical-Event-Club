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

// Retrieve user ID from the session or another source
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if ($user_id !== null) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $branch = $_POST['branch'];
        $year = $_POST['year'];
        $phone = $_POST['phone'];

        // Update user data in the database
        $update_sql = "UPDATE root SET fname='$fname', lname='$lname',  gender='$gender', branch='$branch', year='$year', phone='$phone' WHERE id='$user_id'";

        if ($conn->query($update_sql) === TRUE) {
            echo "Your data updated successfully";
        } else {
            echo "Error updating user data: " . $conn->error;
        }
    }

    // Fetch user data after the update
    $select_sql = "SELECT * FROM root WHERE id = '$user_id'";
    $result = $conn->query($select_sql);

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
   
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>   
            <tr>
                <th>First Name</th>
                <td><input type="text" name="fname" value="<?php echo $user['fname']; ?>"></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><input type="text" name="lname" value="<?php echo $user['lname']; ?>"></td>
            </tr>
        <tr>
            <th>Gender</th>
            <td><input type="text" name="gender" value="<?php echo $user['gender']; ?>"></td>
        </tr>
        <tr>
            <th>Branch</th>
            <td><input type="text" name="branch" value="<?php echo $user['branch']; ?>"></td>
        </tr>
        <tr>
            <th>Year</th>
            <td><input type="text" name="year" value="<?php echo $user['year']; ?>"></td>
        </tr>
        <tr>
            <th>Phone No</th>
            <td><input type="text" name="phone" value="<?php echo $user['phone']; ?>"></td>
        </tr>
        </table>
        <br>
        <input type="submit" value="Update">
        <br><br><br>
    <span>go back to the home page <a href="main.html" class="nav-link">Home</a></span>
    </form>

    </center>
</body>
</html>
