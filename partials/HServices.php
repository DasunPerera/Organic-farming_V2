<?php include("../admin/config/constants.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="../css/Service.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<!--Navbar-->

<?php include('Navbar.php')?>

<section class="service-search">
  <div class="container">
    <form action="<?php echo SITEURL; ?>admin/Search_service.php" method="POST">
    <input type="search" name="search" placeholder="search food" required>
    <input type="submit" name="submit" value="search" class="btn-service">
  </form>
  </div>
</section>


<div class="title">
  <h1>Services</h1>
</div>
 <div class="box-area">
  <div class="single-box">
    <div class="img-area"></div>
    <div class="img-text">
      <span class="header-text"><strong>Education & Training</strong></span>
<p>The department do some trainning programs to new farmers to start their work in a proper way.
  If anyone like to learn more he can join with agriculture school.
  .</p>
      
    </div>
  </div>

  <div class="single-box">
    <div class="img-area"></div>
    <div class="img-text">
      <span class="header-text"><strong>Seeds & Fruit Plant</strong></span>
<p>If you need seeds for your cultivation you can buy them at the lowest price from us.
  Also, we provide planes 
</p>
      
    </div>
  </div>

  <div class="single-box">
    <div class="img-area"></div>
    <div class="img-text">
      <span class="header-text"><strong>Import & Export Services</strong></span>
<p>Organic food has become a large marketing product in the world market. Therefore
  the government provides special support for farmers to export their products.
</p>
      
    </div>
  </div>

  <div class="single-box">
    <div class="img-area"></div>
    <div class="img-text">
      <span class="header-text"><strong>Agro Technology</strong></span>
<p> We provide different agro technologies such as crop Technology,
  farm mechanization,soil and water management, and ecological farming.
</p>
      
    </div>
  </div>

  <div class="single-box">
    <div class="img-area"></div>
    <div class="img-text">
      <span class="header-text"><strong>Bank Loan</strong></span>
<p>The government provide special concessional bank loans to farmers who loke to begin theire
  cultivation with oraganic farming methods. The loans issued by government banks.
</p>
      
    </div>
  </div>

  <div class="single-box">
    <div class="img-area"></div>
    <div class="img-text">
      <span class="header-text"><strong>Visiting</strong></span>
<p> The field officers provide consulting services to farmers who are willing to start organic farming.
  when you begin your cultivation our officers will do field visits and give monitor and advice.
</p>
      
    </div>
  </div>
 </div>


 <!--Footer -->

 <?php include('Footer.php')?>
</html>