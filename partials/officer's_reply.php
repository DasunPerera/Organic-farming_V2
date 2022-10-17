<?php include("../admin/config/constants.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reply</title>
</head>
<body>
   
<?php include('../partials/Navbar.php');
?>


<div class="container">  
<div class="hed">  <h1>Answer for you quection</h1></div>

      <table border="1">  
           <tr>  
                <th>ID</th>  
                <th>Officer name</th>  
                <th>Reply</th>  
           </tr>  
           <?php


$sql="SELECT * FROM tbl_user";

$res=mysqli_query($conn,$sql);

$rows=mysqli_num_rows($res);
$sn=1;


           $sql="SELECT * FROM tbl_reply";

$res=mysqli_query($conn,$sql);

$rows=mysqli_num_rows($res);
$sn=1;

if($rows>0)
{

     while($rows=mysqli_fetch_assoc($res))
     {
         
          $id=$rows['id'];
          $name=$rows['officer_name'];
          $reply=$rows['reply_message'];

          ?>
     <tr>
     <td><?php echo $sn++?></td>
    <td><?php echo $name?></td>
    <td><?php echo $reply?></td>

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
