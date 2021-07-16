<!doctype html>
<html lang="en">
  <head>
  <?php include"header.php";?>



    <title>Inventory Management System</title>
  </head>
  <body>
    <?php include"navigation.php";?>

    <?php

    
    
    // if(isset($_GET['update_email']))
    // {
      
    //   $email = $_GET['update_email'];
    //   $query = "SELECT * FROM registration WHERE email = '$email'";
    //   $result = mysqli_query($connection, $query);
    //   if(!$query){
    //     die("QUERY FAILED!!".mysqli_error($connection));
    // }
      
    //   while($row = mysqli_fetch_assoc($result))
    //   {
    //     $name = $row['user_name'];
    //     $mobile = $row['mobile_number'];
    //   }

       
    


    if(isset($_POST['submit'])){

      $email= $_SESSION['email'];

      $name = $_POST['name'];
      $mobile = $_POST['mobile'];

      if($name == "" || $mobile == "")
      {
        ?>
        <script>
        
        alert("FILL IN THE BOTH FIELD");
        
        </script>

        <?php
      }
      
      else{
       
        $query = "UPDATE registration SET user_name = '$name', mobile_number = '$mobile' WHERE email = '$email'";
      $result = mysqli_query($connection, $query);
      if(!$query){
        die("QUERY FAILED!!!".mysqli_error($connection));
      }

      else{
        $message = '<div class="alert alert-success mt-2">DATA UPDATED SUCCESSFULLY</div>';
      }


      }
    
        
    }

    // }
    
    
    ?>
    <div class="">
<div class="col-sm-6 mt-5">
  <form class="mx-5" method="POST">
    <div class="form-group">
     
      <label for="email">Email</label>
      <input type="email" class="form-control" id="" value="<?php echo $_SESSION['email']; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="name">First Name</label>
      <input type="text" class="form-control" id="" name="name" value="<?php echo $_SESSION['user_name']; ?>">
    </div>
    
    <div class="form-group">
      <label for="name">Mobile Number</label>
      <input type="text" class="form-control" id="" name="mobile" value="<?php echo $_SESSION['mobile_number']; ?>">
    </div>
    <button type="submit" class="btn btn-info" name="submit">Update</button>
    <?php
    if(isset($message)){
      echo $message;
    }

    ?>
  </form>
</div>
</div>
</body>
</html>