<?php include("../config/constants.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../css/admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/admin1.css">
    <title>Display_Reply</title>
</head>
<body>
    <?php include("admin_navbar.php");?>

  
<div class="container">  
<div class="hed">  <h1>Reply Details</h1></div>

      <table border="1">  
           <tr>  
                <th>ID</th>  
                <th>Officer Name</th>  
                <th>Message</th>  
                <th>Action</th>
               
           </tr>  
           <?php
           $sql="SELECT * FROM tbl_reply";

$res=mysqli_query($conn,$sql);

$rows=mysqli_num_rows($res);
$sn=1;

if($rows>0)
{

     while($rows=mysqli_fetch_assoc($res))
     {
          $id=$rows['id'];
          $officer=$rows['officer_name'];
          $reply=$rows['reply_message'];

          ?>
     <tr>
     <td><?php echo $sn++?></td>
    <td><?php echo $officer?></td>
    <td><?php echo $reply?></td>
    
    <td>
          <a href="<?php echo SITEURL;?>admin/admin_page/delete_reply.php? id=<?php echo $id;?>" class="btn-delete">Delete Admin</a>
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