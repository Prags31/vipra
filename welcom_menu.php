<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="sign.css">
    <link rel="stylesheet" type="text/css" href="newstyle.css">
    <link rel="stylesheet" type="text/css" href="searchbar.css">

</head>
<body>
    <div class="heade">
    <div class="logo" >
        <img src="images/logotransp.png" height=200px width=230px>
   </div>
   <div class="topnav">
      
        <a href="hh1.php">Home</a>
        <a href="contact_us.php">Contact Us</a>
    
        <a href="about.php">About Us</a>
    
        <!--<a href="#home">Service</a>-->
    
    </div>
    
    <div>
    <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>

</div>
    
   
 
  <div class="subnav">
  
  <button class="subnavbtn"><img src="images/vpl.png"> <i class="fa fa-caret-down"></i>
    </button>

  
    <div class="subnav-content1 subnav-content">
        
        <div class="log1"> <a href="logout.php">Logout</a></div>
     </div>
  </div>
</div>
</div>
<div>

<?php include 'dropdown.php' ?>

</div></body>
</html>