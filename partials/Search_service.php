<?php include("../admin/config/constants.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/Search_service.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
</head>
<body>
    <div class="heading">
        <h2>Search Service</h2>
    </div>
    <div class="container-box">

<?php
if(isset($_POST['submit']))
{
    
$service=$_POST['search'];

$sql="SELECT * FROM service WHERE title LIKE '%$service%'";

$res=mysqli_query($conn,$sql);

$count=mysqli_num_rows($res);

if($count>0)
{
    while($row=mysqli_fetch_assoc($res))
    {
        $id=$row['id'];
        $title=$row['title'];
        $functions=$row['text'];
        $image_name=$row['image'];
        ?>

<div class="box">
            <div class="box-img">

            <?php
            if($image_name=="")
            {
echo "image is not available";
            }
            else
            {?>
                <img src="<?php echo SITEURL;?>images/service/<?php echo $image_name;?>" alt="">   
                <?php
            }
            ?>
                
                
            </div>
            <div class="box-content">
                <h3><?php echo $title?></h3>
                <p>
                    <?php echo $functions?>
                </p> 
            </div>
        </div>

        <?php
        
    }

}else{
    echo "service not found";
}

}

?>

    </div>
</body>
</html>