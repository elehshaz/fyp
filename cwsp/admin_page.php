<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Service Provider Page</title>
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="css/style.css">
   
   <style>
    .navbar ul{
    list-style: none;
    background: black;
    padding: 0;
    margin: 0;
    text-align: center;
    }
 
    </style>
</head>
<body>
 
	<!-- Header -->
   <header class="w3-container w3-center w3-padding-48 w3-blue">
         <h1 class="w3-xxxlarge"><b>JomCuci</b></h1>
         <h6>Welcome <span class="w3-tag">service provider !</span></h6>
   </header>
         
      <div class="navbar">
         <ul>
            <li><a href="#about">About</a></li>
            <li><a href="#management">Management</a></li>
            <li><a href="index.html">Logout</a></li>
         </ul>
 
       </div>
   </nav>

   <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="images/manwash.png" class="w3-image" width="700" height="700">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <br><br><br><br><br><h1 class="w3-center">Ultimate Car Wash Platform</h1>
      <h5 class="w3-center">Established 2023</h5><br>
      <p class="w3-large">We are driven by market demand to provide an online platform for excellent car wash service solutions. Our goal here is to enable entrepreneurs to be part of this thriving, sustainable sector and continue to provide the latest practices and innovations. This online platform enables you to 
      to promote your car wash shop to a larger market.<span class="w3-tag w3-light-grey"></p>
  </div>
  


<!-- Content -->
<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
    
  <!-- Grid -->
  <div class="w3-row-padding" id="management">
    <div class="w3-center w3-padding-64">
      <span class="w3-xlarge w3-bottombar w3-border-black w3-padding-16">Management</span>
    </div>

    <div class="w3-half w3-margin-bottom">
      <div class="w3-card-3">
        <img src="images/managecar.jpg"  style="width:100%">
        <div class="w3-container">
          <h3>Car Wash Service</h3>
          <p class="w3-opacity">Add, Edit, Delete</p>
          <p>Create your service session for customers reference to 
            make an appointment.</p><br><br>
          <a href="manageservice.php">
          <p><button class="w3-button w3-green w3-block">Manage</button></p>
        </div>
      </div>
    </div>

    <div class="w3-half w3-margin-bottom">
      <div class="w3-card-3">
        <img src="images/orders.png" style="width:100%">
        <div class="w3-container">
          <h3>Order List</h3>
          <p class="w3-opacity">View, Search, Sort</p>
          <p>Manage your list of orders by sorting them using booking 
            id or customers name.</p><br>
          <a href="manageorder.php">
          <p><button class="w3-button w3-green w3-block">Manage</button></p>
        </div>
      </div> 
    </div>
    </div>
  </div>

  <hr>
</body>
</html>