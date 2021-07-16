
<!doctype html>
<html lang="en">
  <head>
  <?php include"header.php";?>
  <?php include"../functions.php";?>



    <title>Inventory Management System</title>
  </head>
  <body>
  <?php
    
    if(isset($_POST['update'])){

      $email= $_SESSION['email'];

      $password = $_POST['password'];
      
      if($password== "")
      {
        ?>
        <script>
        
        alert("FILL IN THE BOTH FIELD");
        
        </script>

        <?php
      }
      
      else{
       
        $query = "UPDATE registration SET password = '$password', confirm_password = '$password' WHERE email = '$email'";
      $result = mysqli_query($connection, $query);
      if(!$query){
        die("QUERY FAILED!!!".mysqli_error($connection));
      }

      else{
        $message = '<div class="alert alert-success mt-2">DATA UPDATED SUCCESSFULLY</div>';
      }


      }
    
        
    }

    ?>
    <?php include"navigation.php";?>

    
    
   
    
    
   
    <div class="">
<div class="col-sm-9 col-md-10 mt-10">
  <div class="row">
    <div class="col-sm-6">
      <form class="mt-5 mx-5" method="POST">
        <div class="form-group">
          <label for="">Email</label>
          <input type="text" class="form-control" id=""  value="<?php echo $_SESSION['email']; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="">New Password</label>
          <input type="password" class="form-control" id="" placeholder="New Password" name="password">
        </div>
        <?php
    if(isset($message)){
      echo $message;
    }
    ?>
        <button type="submit" class="btn btn-info mr-4 mt-4" name="update">Update</button>
       
      </form>

    </div>

  </div>
</div>
</div>
</body>
</html>