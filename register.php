<?php      
   $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "sign up";  
    $u=$_POST["email"];
    $f=$_POST["fname"];
    $l=$_POST["lname"];
    $r=$_POST["rollno"];
    $b=$_POST["branch"];
    $y=$_POST["year"];
    $g=$_POST["gender"];
    $p=$_POST["phone"];
    $w=$_POST["password"];
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
      die("Failed to connect with MySQL: ". mysqli_connect_error());  
          }  
         else
           {
            $sql = "INSERT INTO root VALUES ('$u','$f','$l','$r','$b','$y','$g','$p',' ','$w')";
            if(mysqli_query($con,$sql)){
               echo "<h1>successfully registered<h1>";
            }
            else{
               echo "error".mysqli_error($con);
            }
           }
?>