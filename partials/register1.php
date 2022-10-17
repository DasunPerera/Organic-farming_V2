
<?php include("../admin/config/constants.php");?>


<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="../css/register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

  <div class="container">
    <div class="title">Registration</div>

    <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

       <?php if (isset($_GET['add'])) { ?>
     		<p class="error"><?php echo $_GET['add']; ?></p>
     	<?php } ?>
    

    <div class="content">
      <form action="" method="post" autocomplete="off">
        <div class="user-details">
          <div class="input-box">
            <span class="details">User Type</span>
            <input type="text" placeholder="Enter user type" name="user_type" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="username" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email"  required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="phonenumber" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" name="password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" name="Cpassword" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="male">
          <input type="radio" name="gender" id="dot-2" value="female">
          <input type="radio" name="gender" id="dot-3" value="Prefer not to say">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Register">
        </div>
        <a href="login.php" class="ca">Back</a>
      </form>
    </div>
  </div>

</body>
</html>

 <?php
if(isset($_POST['submit']))
{
  
       $user_type=$_POST['user_type'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $phonenumber=$_POST['phonenumber'];
        $password=md5($_POST['password']); 
        $password=md5($_POST['Cpassword']); 
        $gender=$_POST['gender'];
   
      

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  
      $Utype = test_input($_POST["user_type"]);
      $name = test_input($_POST["username"]);
      $mobile = test_input($_POST["phonenumber"]);
      $pass = test_input($_POST["password"]);
      $Cpass = test_input($_POST["Cpassword"]);
      $email = test_input($_POST["email"]);
     
      if($user_type=="admin")
      {
        header("Location: register1.php?error=Invalid user type format");
        exit();
      }


      // check if name only contains letters and whitespace
      else if (!preg_match("/^[a-zA-Z-' ]*$/",$Utype)) {
        header("Location: register1.php?error=Invalid user type format");
        exit();
      }
      else if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        header("Location: register1.php?error=Invalid user name format");
        exit();
      }
        // check if e-mail address is well-formed
      else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: register1.php?error=Invalid email format");
        exit();      
        } 
       else if ($pass!=$Cpass) {
        header("Location: register1.php?error=Invalid confirm password");
        exit();
          
        }
        else if(!preg_match("/^[0-9]*$/",$mobile)){
          header("Location: register1.php?error=Invalid mobile number format");
          exit(); 
        }
        
      else{

   $sql= "INSERT INTO tbl_user SET
    
   user_type='$user_type',
   username='$username',
   email='$email',
   phonenumber='$phonenumber',
   password='$password',
   gender='$gender'
   
   ";

   

$res=mysqli_query($conn,$sql) or die(mysqli_connect_error());

if($res==TRUE)
{
  header("Location: login.php?add=User Added successfully");

}
else{
  header("Location: register1.php?add=Register process is Unsuccessful");
 
}
} 
}
   

  
?>


  



