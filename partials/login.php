<?php include("../admin/config/constants.php"); ?>



<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="../css/login.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include('../partials/Navbar.php')?>
          <div class="center">
      <h1>Login</h1>

      <?php if (isset($_GET['add'])) { ?>
     		<p class="error"><?php echo $_GET['add']; ?></p>
     	<?php } ?>
       <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
    
  
      <form  action="" method="post" autocomplete="off">
        <div class="txt_field">
          <input type="text" name="username" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <a href="change_password.php" class="pass">Change Password?</a>
       

        <div class="gender-details">
          <input type="radio" name="usertype" id="dot-1" value="farmer" >
          <input type="radio" name="usertype" id="dot-2" value="officer" >
          <input type="radio" name="usertype" id="dot-3" value="admin" >
         
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Farmer</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Officer</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Admin</span>
            </label>
          </div>
        </div>



        <input type="submit"  name="submit" value="Login">
       
        <div class="signup_link">
          Not a user? <a href="register1.php">Signup</a>
          
        
        </div>
      </form>
    </div>
  </body>
</html>



<?php
if(isset($_POST['submit']))
{

    $username=$_POST['username'];
    $password=md5($_POST['password']); 
    $usertype=$_POST['usertype'];


    $sql="SELECT * FROM tbl_user WHERE (user_type='$usertype' AND username='$username') AND password='$password' ";

    $res=mysqli_query($conn,$sql);

    if (mysqli_num_rows($res) > 0) {
      
			$row = mysqli_fetch_assoc($res);
            if ($row['username'] === $username && $row['password'] === $password) {
            	$_SESSION['user_name'] = $row['username'];
            	$_SESSION['password'] = $row['password'];
            	$_SESSION['id'] = $row['id'];
             

             
     if($usertype=="admin")
     {

      header('location:'.SITEURL."admin/admin_page/display_user.php");
      exit();
     }
     if($usertype=="farmer")
     {
     
      header('location:'.SITEURL."partials/contact.php");
      exit();
     }
     else{
   
      header('location:'.SITEURL."partials/display_services.php");
      exit();
     }

          }else
          {
            header("Location: login.php?error=Incorect User name or password");
		        exit();
          }
        }
        else
          {
            header("Location: login.php?error=Incorect User name or password");
		        exit();
          }
  }          

?> 