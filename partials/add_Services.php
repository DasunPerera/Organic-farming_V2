<?php include("../admin/config/constants.php"); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Services</title>
	<link rel="stylesheet" type="text/css" href="../css/add_service.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>
<?php include('FNavbar.php')?>
	<div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>ADD Services</h2>
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
				<input type="text"  name="title" class="field" placeholder="Enter service" required>
				<textarea  name="service" placeholder="Describe the service" class="field" required></textarea>
        <div class="ii">
        Image: <input type="file" name="image" class="mm1">
        </div>
				<input class="btnn" type="submit" name="submit" value="ADD">
			</form>
			</div>
		</div>
	</div>

	
</body>
</html>



 <?php
if(isset($_POST['submit']))
{
    
    $title=$_POST['title'];
    $service=$_POST['service'];
   

if(isset($_FILES['image']['name']))
{
  $image_name=$_FILES['image']['name'];
  $source_path=$_FILES['image']['tmp_name'];
  $destination_path="../images/service/".$image_name; 
  $upload=move_uploaded_file($source_path,$destination_path);
 
  if($upload==false)
{
 
  $_SESSION['upload']="image"; 
header('location:'.SITEURL.'partials/add_Services.php');

}
}
else{
  $image_name="";
}

   $sql= "INSERT INTO service SET
    title='$title',
    text='$service',
    image='$image_name'
    ";
 
    
$res=mysqli_query($conn,$sql) or die(mysqli_connect_error());


if($res==TRUE)
{
 
  $_SESSION['add']=" Adding proccess successful"; 
header('location:'.SITEURL.'partials/add_Services.php');

}
else{
  $_SESSION['add']="Adding proccess unsuccessful";
  header('location:'.SITEURL.'add_partials/Services.php');
}
}

?>