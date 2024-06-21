<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/events.css">
    <title>EVENTS</title>
</head>

<body>
    <!-- NAVBAR START-->
    <nav class="navbar navbar-expand-sm fixed-top">
        <a href="" class="navbar-brand">CSI TechConnect</a>
        <div>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="main.html" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="committee.html" class="nav-link">Committee</a></li>
                <li class="nav-item"><a href="events.php" class="nav-link">Events</a></li>
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
                            <br>;
                            <div class="event-content">
                                <h4>' . $row['title'] . '</h4>
                                <span>' . $row['description'] . '</span><br>
                                <a href="' . $row['register_link'] . '" class="nav-link">REGISTER</a>
                                <a href="' . $row['gallery_link'] . '" class="nav-link">GALLERY</a>
                                <a href="' . $row['feedback_link'] . '" class="nav-link">FEEDBACK</a>
                            </div>
                            <br>;
                            <br>;
                            <br>;
                        </div>';
                }
            }
            $conn->close();
            ?>
        </div>
    </div>
            <div class="offset-sm-1 col-sm-5">
                <img src="images/python.jpg" class="img-fluid" alt="">
                <div class="event-content">
                    <h4>Technical Quiz Competition</h4>
                    <span>
                        A technical quiz is a type of quiz that focuses on testing knowledge and understanding of
                        technical subjects, such as science, technology and engineering fields. It may include questions
                        related to concepts, theories and problem-solving techniques.
                    </span><br>
                    <a href="" class="nav-link">Register</a>
                    <a href="" class="nav-link">GALLERY</a>
                    <a href="" class="nav-link">Feedback</a>
                </div>
            </div>
        </div>
    </div><br><br><br><br><br><br><br><br><br>
    <!-- FOOTER SECTION -->
<footer>
    <p style="width: 100%; height:15vh; font-weight: bold;font-style: italic; background: #141D38; color:white;"><br> &copy;Computer Society Of India(CSI)- All Rights Reserved By CSE VIGNAN <br> 
       Made by Mr.Thilak Mr.Kartick Ms.Archana Ms.Sindhuja 
    </p>
</footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>

    <!--JAVASCRIPT-->
    <script>
        $(document).scroll(function () {
            $(".navbar").toggleClass("scroll", $(this).scrollTop() > $(".navbar").height());
        })
    </script>
</body>

</html>