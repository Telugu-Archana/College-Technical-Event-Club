<?php      
   $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "sign up";  
	$e=$_POST["email"];
    $r=$_POST["rollno"];
	$p=$_POST["password"];
  $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
   else
     {
 $sql = "SELECT * FROM root WHERE rollno='$r' and password='$p' and email='$e'";
         $result = mysqli_query($con,$sql);
      $count = mysqli_num_rows($result);
    if($count == 1) {
        while ($row = $result->fetch_assoc()) {
            echo "<h1>your ID: ". $row["id"]."<h1>";
        }
    }
      else {
        echo "<h1>incorrect data<h1>";
      }
    }
?>  