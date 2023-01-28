<?php

@include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['update_service'])){
   
   $service_name = $_POST['service_name'];
   $price = $_POST['price'];
   $service_slot = $_POST['service_slot'];
   //$service_image_tmp_name = $_FILES['product_image']['tmp_name'];
   //$service_image_folder = 'uploaded_img/'.$product_image;

   if(empty($service_name) || empty($price) || empty($service_slot)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE service_tbl SET service_name='$service_name', price='$price', service_slot='$service_slot'WHERE service_id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         //move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $sucessmessage[] = 'Service succcessfully update';
         header('location:manageservice.php');
      }else{
         $message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/service.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
   <!-- Header -->
  <header class="w3-container w3-center w3-padding-48 w3-blue">
         <h1 class="w3-xxxmedium"><b>Update Car Wash Service</b></h1>
         <h6>With <span class="w3-tag">JomCuci !</span></h6>
   </header>
<?php
   if(isset($successmessage)){
      foreach($successmessage as $successmessage){
         echo '<span class="successmessage">'.$successmessage.'</span>';
      }
   }

   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM service_tbl WHERE service_id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">Edit Service</h3>
      <input type="text" class="box" name="service_name" value="<?php echo $row['service_name']; ?>" placeholder="enter the service name">
      <input type="number" min="0" class="box" name="price" value="<?php echo $row['price']; ?>" placeholder="enter the service price">
      <!--<input type="file" class="box" name="product_image"  accept="image/png, image/jpeg, image/jpg">-->
      <select name = "service_slot">
                  <option value = "pickup-select" name="service_slot" class="box">Choose a Slot</option>
                  <option value="slot 1: 10.00am-12.00pm">slot 1: 10.00am-12.00pm</option>
                  <option value="slot 2: 1.00pm-2.00pm">slot 2: 1.00pm-2.00pm</option>
                  <option value="slot 3: 2.15pm-4.15pm">slot 3: 2.15pm-4.15pm</option>
                  <option value="slot 4: 4.30pm-6.30pm">slot 4: 4.30pm-6.30pm</option>
                  <option value="slot 5: 7.00pm-8.00pm">slot 5: 7.00pm-8.00pm</option>
                  <option value="slot 6: 8.30am-9.30pm">slot 6: 8.30am-9.30pm</option>
               </select>
      <input type="submit" value="update" name="update_service" class="btn">
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>