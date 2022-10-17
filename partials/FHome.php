<?php include("../admin/config/constants.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/FHome1.css">
    <title>Officer Home</title>
</head>
<body>
<?php include('FNavbar.php')?>

     <h1 class="hh">Message Details</h1>
<div class="container">  
      <table border="1">  
           <tr>  
                <th>ID</th>  
                <th>Name</th>  
                <th>Email</th>  
                <th>Phone_Number</th>  
                <th>Message</th>  
                <th>Image</th>
                <th>Reply</th> 
           </tr>  
           <?php
           $sql="SELECT * FROM tbl_messages";

$res=mysqli_query($conn,$sql);

$rows=mysqli_num_rows($res);
$sn=1;

if($rows>0)
{

     while($rows=mysqli_fetch_assoc($res))
     {
          $id=$rows['id'];
          $username=$rows['username'];
          $email=$rows['email'];
          $phonenumber=$rows['phonenumber'];
          $message=$rows['message'];
          $image=$rows['image_name'];

          ?>
     <tr>
     <td><?php echo $sn++?></td>
    <td><?php echo $username?></td>
    <td><?php echo $email?></td>
    <td><?php echo $phonenumber?></td>
    <td><?php echo $message?></td>

    <td>
     <?php
if($image!="")
{
?>
<img src="<?php echo SITEURL; ?>images/upload/<?php echo $image;?>" width="180px">
<?php
}
else
{
     echo "image not added";
}
     ?>
    </td>
    <td><a href="<?php echo SITEURL;?>partials/reply.php? name=<?php echo $username;?>" class="btn">Send Reply</a></td>

    
    
     </tr>
          <?php

     }
      
}
else{

}



?>
 
      </table>  
 </div>
</body>
</html>