<?php      
   $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "sign up";  
	
    $u=$_POST["id"];
    $p=$_POST["password"];
	    
  $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
   else
     {
 $sql = "SELECT * FROM root WHERE id='$u' and password='$p'";
         $result = mysqli_query($con,$sql);
      $count = mysqli_num_rows($result);
    if($count == 1) {
        header("location:main.html");
      }else {
		 header("location:index.html");
  }
      }
    session_start();
$_SESSION['id'] = $u;
exit();
?>