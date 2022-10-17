<?php include("../config/constants.php"); ?>

<?Php

$id= $_GET['id'];

$sql="DELETE FROM tbl_reply where id=$id";


$res=mysqli_query($conn,$sql);


if($res==true)
{
   
    header('location:'.SITEURL.'admin/admin_page/Reply_message.php');
}
else{
  
    header('location:'.SITEURL.'admin/admin_page/Reply_message.php');
}

?>