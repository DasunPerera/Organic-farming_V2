<?php include("../config/constants.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../css/admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>message</title>
</head>
<body>
    <?php include("admin_navbar.php");?>

  
<div class="container">  
<div class="hed">  <h1>Message Details</h1></div>

      <table border="1">  
           <tr>  
                <th>ID</th>  
                <th>Username</th>  
                <th>Email</th>  
                <th>Phone_Number</th>  
                <th>Message</th> 
                <th>Image</th>
                <th>Action</th> 
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
          $Username=$rows['username'];
          $email=$rows['email'];
          $phonenumber=$rows['phonenumber'];
          $message=$rows['message'];
          $image=$rows['image_name'];
          

          ?>
     <tr>
     <td><?php echo $sn++?></td>
    <td><?php echo $Username?></td>
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
}?>
    </td>
    <td>
          <a href="<?php echo SITEURL;?>admin/admin_page/delete_message.php? id=<?php echo $id;?>" class="btn-delete">Delete Admin</a>
    </td>
 
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