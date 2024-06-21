<?php      
   $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "sign up";  
	$e=$_POST["email"];
    $u=$_POST["id"];
    $r=$_POST["rollno"];
    $o=$_POST["pswd"];
	$p=$_POST["password"];
  $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
   else
     {
 $sql = "SELECT * FROM root WHERE id='$u' and password='$o' and email='$e' and rollno='$r'";
         $result = mysqli_query($con,$sql);
      $count = mysqli_num_rows($result);
    if($count == 1) {
        $sq = "UPDATE root SET password='$p' WHERE rollno='$r'";
        if(mysqli_query($con,$sq)){
           echo "<h1>successfully password changed</h1>";
      }
    }
      else {
        echo "<h1>incorrect data</h1>";
      }
    }
?>  