<?php      
   $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "sign up";  
    $u=$_POST["admin_id"];
    $p=$_POST["admin_password"];
  $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
   else
     {
 $sql = "SELECT * FROM admin WHERE admin_id='$u' and admin_password='$p'";
         $result = mysqli_query($con,$sql);
      $count = mysqli_num_rows($result);
    if($count == 1) {
        header("location:admin_main.html");
      }else {
		 header("location:adminindex.html");
  }
      }
    session_start();
$_SESSION['admin_id'] = $u;
exit();
?>
