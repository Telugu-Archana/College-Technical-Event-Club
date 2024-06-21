<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Include your head content -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    
    <title>Computer Society Of India</title>
</head>

<body>
     <!-- NAVBAR START-->
     <nav class="navbar navbar-expand-sm fixed-top">
        <a href="" class="navbar-brand">CSI TechConnect</a>
        <div>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="main.html" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="committee.html" class="nav-link">Committee</a></li>
                <li class="nav-item"><a href="events.html" class="nav-link">Events</a></li>
                <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="profile.php" class="nav-link">Profile</a></li>
                <li class="nav-item"><a href="index.html" class="nav-link">Sign Out</a></li>
            </ul>
        </div>
    </nav>

    <!-- EVENT SECTION START -->
    <div class="container event">
        <div class="row text-center justify-content-center">
            <?php
            $conn = new mysqli("localhost", "root", "", "sign up");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $result = $conn->query("SELECT * FROM events");
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="offset-sm-1 col-sm-5">
                            <img src="' . $row['image_url'] . '" class="img-fluid" alt="">
                            <div class="event-content">
                                <h4>' . $row['title'] . '</h4>
                                <span>' . $row['description'] . '</span><br>
                                <a href="' . $row['gallery_link'] . '" class="nav-link">GALLERY</a>
                            </div>
                        </div>';
                }
            } else {
                echo "No events available";
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>

</html>
