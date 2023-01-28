<?php

@include 'config.php';

if(isset($_POST['add_service'])){

   $service_name = $_POST['service_name'];
   $service_price = $_POST['price'];
   $service_slot = $_POST['service_slot'];
   //$service_image = $_FILES['service_image']['name'];
   //$product_image_tmp_name = $_FILES['service_image']['tmp_name'];
   //$product_image_folder = 'uploaded_img/'.$service_image;

   if(empty($service_name) || empty($service_price) ||  empty($service_slot) ){
      $message[] = 'Please fill out all';
   
   }else{
      //check if service already existed
      $my_query="SELECT * FROM service_tbl WHERE service_name = '$service_name'";
      $upload = mysqli_query($conn,$my_query);
      if(mysqli_num_rows($upload) > 0){
         echo '
           <script>
            alert("Data already inserted");
            history.back();
            </script>
            ';

      }else{
         //if it does not exist, then do insertion
         $my_query = "INSERT INTO service_tbl(service_name, price,service_slot) VALUES('$service_name', '$service_price', '$service_slot')";  
         $upload = mysqli_query($conn,$my_query);
         //if($upload){//
         echo '
         <script>
         alert("Service successfully added");
         location.replace("manageservice.php");
         </script>
         ';
         }/*else{
               echo '
         <script>
         alert("Could not added");
         location.replace("manageservice.php");
         </script>
         ';
         }*/
      }
   }
      
//};


if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM service_tbl WHERE service_id = $id");
   header('location:manageservice.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Service</title>
  <link rel="stylesheet" href="css/service.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


  <style>

   .menu{
    list-style: none;
    background: black;
    padding: 0;
    margin: 0;
    text-align: center;
    
   }
   .menu li{
     display: inline-block;
   }
 
   .menu a{
    text-decoration: none;
    color: white;
    width: 100px;
    display: block;
    padding: 25px 20px;
    font-size: 12px; 
    text-transform: uppercase;
    font-weight: bold;
    text-align: center;
   }
 
   .menu a:hover{
    background: lightgreen;
 
   }
   div{
      float: left;
   } 

   #admin-product-form-container{
      width:38%;
      padding: 30px;
   }

   #product-display{
      width: 43%;
   }

    </style>
</head>
<body>
  <!-- Header -->
  <header class="w3-container w3-center w3-padding-48 w3-blue">
         <h1 class="w3-xxxmedium"><b>Manage Car Wash Service</b></h1>
         <h6>With <span class="w3-tag">JomCuci !</span></h6>
   </header>

  <nav class="menu">
  <ul>
    <li><a href="admin_page.php">Home</a></li>
    <li><a href="index.html">LogOut</a></li>
  </ul>
</nav>
<?php

if(isset($sucessmessage)){
   foreach($sucessmessage as $sucessmessage){
      echo '<span class="successmessage">'.$sucessmessage.'</span>';
   }
}

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
   
<div class="container">

   <div class="admin-product-form-container" id="admin-product-form-container">

      <form action="" method="post">
         <h3>ADD NEW SERVICE</h3>
         <input type="text" placeholder="Enter service name" name="service_name" class="box">
         <input type="number" placeholder="Enter service price" name="price" class="box">
         <!--<input type="file" accept="image/png, image/jpeg, image/jpg" name="service_image" class="box">-->
               <select name = "service_slot">
                  <option value = "pickup-select" name="service_slot" class="box">Choose a Slot</option>
                  <option value="slot 1: 10.00am-12.00pm">slot 1: 10.00am-12.00pm</option>
                  <option value="slot 2: 1.00pm-2.00pm">slot 2: 1.00pm-2.00pm</option>
                  <option value="slot 3: 2.15pm-4.15pm">slot 3: 2.15pm-4.15pm</option>
                  <option value="slot 4: 4.30pm-6.30pm">slot 4: 4.30pm-6.30pm</option>
                  <option value="slot 5: 7.00pm-8.00pm">slot 5: 7.00pm-8.00pm</option>
                  <option value="slot 6: 8.30am-9.30pm">slot 6: 8.30am-9.30pm</option>
               </select>
               <input type="submit" class="btn" name="add_service" value="submit">
      </form>

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM service_tbl");
   
   ?>
   <div class="product-display" id="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>service name</th>
            <th>service price</th>
            <th>service slot</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            
            <td><?php echo $row['service_name']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['service_slot']; ?></td>
            <td>
               <a href="update_service.php?edit=<?php echo $row['service_id']; ?>" class="btn"><i class="fa fa-edit">Edit</i></a>
               <a href="manageservice.php?delete=<?php echo $row['service_id']; ?>" class="btn"><i class="fa fa-trash">Delete</i></a>
              
            </td>
         </tr>
      <?php } ?> 
      </table>
   </div>

</div>

</body>
</html>