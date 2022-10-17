<?php include("../admin/config/constants.php"); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Contact us</title>
	<link rel="stylesheet" type="text/css" href="../css/contact1.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>
<?php include('../partials/Navbar.php')?>

<div class="message_link">
  
          <h4>Check your Messages:</h4> <a href="officer's_reply.php">Message</a>
        </div>
        <div class="message_link2">
      <a href="login.php">Log Out</a>
        </div>
        
	<div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>Contact Us</h2>
</br>
<?php

             if(isset($_SESSION['add']))
              {
                   echo $_SESSION['add'];
                   unset ($_SESSION['add']);
              }
              if(isset($_SESSION['upload']))
              {
                   echo $_SESSION['upload'];
                   unset ($_SESSION['upload']);
              }
            
    ?>
      <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

</br>

				<form action="" method="post" autocomplete="off" enctype="multipart/form-data">
				<input type="text"  name="username" class="field" placeholder="Your Name" required>
				<input type="text" name="email" class="field" placeholder="Your Email" required>
				<input type="text" name="phonenumber" class="field" placeholder="Phone" required>
				<textarea  name="message" placeholder="Message" class="field" required></textarea>
        <div class="ii">
        Image: <input type="file" name="image" class="mm">
        </div>
				<input class="btn" type="submit" name="submit" value="Submit">
			</form>
			</div>
		</div>
	</div>

	
</body>
</html>



 <?php
if(isset($_POST['submit']))
{
    
    $username=$_POST['username'];
    $email=$_POST['email'];
    $phonenumber=$_POST['phonenumber'];
    $message=$_POST['message']; 
  

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    $email = test_input($_POST["email"]);
    $name = test_input($_POST["username"]);
    $mobile = test_input($_POST["phonenumber"]);

       // check if name only contains letters and whitespace
       if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        header("Location: contact.php?error=Invalid user type format");
        exit();
      }
      else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location:  contact.php?error=Invalid email format");
        exit();  
      }
    else if(!preg_match("/^[0-9]*$/",$mobile)){
      header("Location:  contact.php?error=Invalid mobile number format");
      exit(); 
    }
    else{


if(isset($_FILES['image']['name']))
{
  $image_name=$_FILES['image']['name'];
  $source_path=$_FILES['image']['tmp_name'];
  $destination_path="../images/upload/".$image_name; 
  $upload=move_uploaded_file($source_path,$destination_path);
 
  if($upload==false)
{
 
  $_SESSION['upload']="image"; 
header('location:'.SITEURL.'partials/contact.php');

}
}
else{
  $image_name="";
}

   $sql= "INSERT INTO tbl_messages SET
    username='$username',
    email='$email',
    phonenumber='$phonenumber',
    message='$message',
    image_name='$image_name'
    ";
 
    
$res=mysqli_query($conn,$sql) or die(mysqli_connect_error());


if($res==TRUE)
{
 
  $_SESSION['add']="Data Adding successful "; 
header('location:'.SITEURL.'partials/contact.php');

}
else{
  $_SESSION['add']="Adding proccess unsuccessful";
  header('location:'.SITEURL.'partials/contact.php');
}
}
}
?>