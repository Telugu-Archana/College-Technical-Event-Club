<?php      
   $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "sign up";  
    $r=$_POST["rollno"];
    $e=$_POST["email"];
    $i=$_POST["id"];
  $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
   else
     {
 $sql = "SELECT * FROM root WHERE rollno='$r' and email='$e'";
         $result = mysqli_query($con,$sql);
      $count = mysqli_num_rows($result);
    if($count == 1) {
        $sq = "UPDATE root SET id='$i' WHERE rollno='$r' and email='$e'";
        if(mysqli_query($con,$sq)){
           echo "<h1>successfully id updated<h1>";
      }}
      else {
        echo "<h1>invalid user<h1>";
      }
    }
?>  
