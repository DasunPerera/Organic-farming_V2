<?php include("../admin/config/constants.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/FHome1.css">
    <title>Document</title>
</head>
<body>
<?php include('FNavbar.php')?>
     <h1 class="hh">Services Table</h1>
<div class="container">  
      <table border="1">  
           <tr>  
                <th>ID</th>  
                <th>Title</th>  
                <th>Service</th>  
                <th>Image</th>
              
           </tr>  
           <?php
           $sql="SELECT * FROM service";

$res=mysqli_query($conn,$sql);

$rows=mysqli_num_rows($res);
$sn=1;

if($rows>0)
{

     while($rows=mysqli_fetch_assoc($res))
     {
          $id=$rows['id'];
          $title=$rows['title'];
          $service=$rows['text'];
          $image=$rows['image'];

          ?>
     <tr>
     <td><?php echo $sn++?></td>
    <td><?php echo $title?></td>
    <td><?php echo $service?></td>
    <td>
     <?php
if($image!="")
{
?>
<img src="<?php echo SITEURL; ?>images/service/<?php echo $image;?>" width="180px">
<?php
}
else
{
     echo "image not added";
}
     ?>
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