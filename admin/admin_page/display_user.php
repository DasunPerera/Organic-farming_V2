<?php include("../config/constants.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../css/admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>display_user</title>
</head>
<body>
    <?php include("admin_navbar.php");?>

  
<div class="container">  
<div class="hed">  <h1>User Details</h1></div>

      <table border="1">  
           <tr>  
                <th>ID</th>  
                <th>User Type</th>  
                <th>Username</th>  
                <th>Email</th>  
                <th>Phone_Number</th>  
                <th>Gender</th> 
                <th>Action</th> 
           </tr>  
           <?php
           $sql="SELECT * FROM tbl_user";

$res=mysqli_query($conn,$sql);

$rows=mysqli_num_rows($res);
$sn=1;

if($rows>0)
{

     while($rows=mysqli_fetch_assoc($res))
     {
          $id=$rows['id'];
          $Usertype=$rows['user_type'];
          $Username=$rows['username'];
          $email=$rows['email'];
          $phonenumber=$rows['phonenumber'];
          $gender=$rows['gender'];

          ?>
     <tr>
     <td><?php echo $sn++?></td>
    <td><?php echo $Usertype?></td>
    <td><?php echo $Username?></td>
    <td><?php echo $email?></td>
    <td><?php echo $phonenumber?></td>
    <td><?php echo $gender?></td>
    <td>
          <a href="<?php echo SITEURL;?>admin/admin_page/delete_user.php? id=<?php echo $id;?>" class="btn-delete">Delete user</a>
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