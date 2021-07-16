<!DOCTYPE html>
<html lang="en">
<head>
 <?php include"header.php";?>
  
  <style>   
  body{
    background-color: rgba(255, 255, 128, .5);
  }  
.login-form {
    width: 340px;
    margin: 50px auto;
    font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>
</head>
<body>

    <?php include"navbar.php";?>


   <?php
   
   if(isset($_POST['submit']))
   {
       $email = $_POST['email'];
       $password = $_POST['password'];

       login($email, $password);

   }
   
   ?>



  
<div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">Log in😇😊</h2>       
        <div class="form-group">
            <input type="text" class="form-control" name ="email" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name ="password"placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Log in</button>
            <?php if(isset($message)){
                echo $message;
            } ?>
        </div>
        
        <div class="clearfix">
            <label class="float-left "><a href="registration.php">Create an account</a></label>
            <a href="#" class="float-right">Forgot Password?🙄</a>
        </div>        
    </form>
    
</div>

</body>
</html>