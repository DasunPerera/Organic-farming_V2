
<?php include("../admin/config/constants.php");?> 

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Change Password</title>
	<link rel="stylesheet" href="../css/change_password.css">
</head>
<body>

    <form action="" method="post">
     	<h2>Change Password</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

     	<label>Old Password</label>
     	<input type="password" name="op" placeholder="Old Password" required>
     	<br>
     	<label>New Password</label>
     	<input type="password" name="np" placeholder="New Password" required>
     	<br>
        <label>Confirm New Password</label>
     	<input type="password" name="c_np" placeholder="Confirm New Password" required>
     	<br>
     	<button type="submit" name="submit">CHANGE</button>
          <a href="login.php" class="ca">Back</a>
     </form>
</body>
</html>

<?php
        

if (isset($_POST['submit'])){

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate(md5($_POST['op']));
	$np = validate(md5($_POST['np']));
	$c_np = validate(md5($_POST['c_np']));

	if($np==$c_np)
	{
    
        $id =$_SESSION['id'];
        $sql = "SELECT password
                FROM tbl_user WHERE 
                id='$id' AND password='$op'";

        $result = mysqli_query($conn, $sql);
	
        if(mysqli_num_rows($result) >0)
		{
        	$sql_2 = "UPDATE tbl_user
        	          SET password='$np'
        	          WHERE id='$id'";
        	mysqli_query($conn, $sql_2);
        	header("Location: change_password.php?success=Your password has been changed successfully");
	        exit();

        }else {
        	header("Location: change_password.php?error=Incorrect password");
	        exit();
        }
	}
	else
	{
		header("Location: change_password.php?error=Incorrect confirm password");
		exit();
	}

    
}

?>