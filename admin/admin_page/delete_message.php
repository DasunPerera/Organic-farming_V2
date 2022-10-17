<?php include("../config/constants.php"); ?>

<?Php
$id= $_GET['id'];

$sql="DELETE FROM tbl_messages where id=$id";


$res=mysqli_query($conn,$sql);

if($res==true)
{
    $_SESSION['delete']="User Deleted Succesfully";
    header('location:'.SITEURL.'admin/admin_page/display_messages.php');
}
else{
    $_SESSION['delete']="Failed to Deleted the message";
    header('location:'.SITEURL.'admin/admin_page/display_messages.php');
}

?>