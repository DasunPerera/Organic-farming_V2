<?php include("../admin/config/constants.php");

if(isset($_GET['name']))
{
    $_SESSION['idr']=$_GET['name'];
   

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reply.css">
    <title>Document</title>
</head>
<body>
<?php include('../partials/Navbar.php')?>
    <div class="container">
        <div class="contact-box">
        <div class="right">
            <h2>Reply</h2>
            <?php
             if(isset($_SESSION['add']))
              {
                   echo $_SESSION['add'];
                   unset ($_SESSION['add']);
              }
              ?>
        <form action="" method="POST" autocomplete="off">
            <input  class="field" type="text" name="name" placeholder="Enter name ">
            <textarea name="message" placeholder="Message" class="field"></textarea>
            <input class="btn" type="submit" name="submit" value="submit">
        </form>
        </div>

    </div>
</body>
</html>



 <?php
if(isset($_POST['submit']))
{
  
    $fullname=$_POST['name'];
    $username=$_POST['message'];


 
   $sql= "INSERT INTO tbl_reply SET
    
    officer_name='$fullname',
    reply_message='$username'
    
    ";

$res=mysqli_query($conn,$sql) or die(mysqli_connect_error());

if($res==TRUE)
{
    $_SESSION['add']="Reply sent successfully"; 
  header('location:'.SITEURL.'partials/reply.php');

}
else{
  $_SESSION['add']="Reply not send "; 
  header('location:'.SITEURL.'partials/reply.php');
}

}
?>