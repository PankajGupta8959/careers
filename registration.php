<?php include "header.php"; ?>
<?php include "navbar.php"; ?>

<style>
  body {
    color: #fff;
    background-color: rgb(234, 211, 150);
    font-family: 'Roboto', sans-serif;
  }

  .form-control {
    height: 41px;
    background: #f2f2f2;
    box-shadow: none !important;
    border: none;
  }

  .form-control:focus {
    background: #e2e2e2;
  }

  .form-control,
  .btn {
    border-radius: 3px;
  }

  .signup-form {
    width: 400px;
    margin: 30px auto;
  }

  .signup-form form {
    color: #999;
    border-radius: 3px;
    margin-bottom: 15px;
    background: #fff;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
  }

  .signup-form h2 {
    color: #333;
    font-weight: bold;
    margin-top: 0;
  }

  .signup-form hr {
    margin: 0 -30px 20px;
  }

  .signup-form .form-group {
    margin-bottom: 20px;
  }

  .signup-form input[type="checkbox"] {
    margin-top: 3px;
  }

  .signup-form .row div:first-child {
    padding-right: 10px;
  }

  .signup-form .row div:last-child {
    padding-left: 10px;
  }

  .signup-form .btn {
    font-size: 16px;
    font-weight: bold;
    background: #3598dc;
    border: none;
    min-width: 140px;
  }

  .signup-form .btn:hover,
  .signup-form .btn:focus {
    background: #2389cd !important;
    outline: none;
  }

  .signup-form a {
    color: #fff;
    text-decoration: underline;
  }

  .signup-form a:hover {
    text-decoration: none;
  }

  .signup-form form a {
    color: #3598dc;
    text-decoration: none;
  }

  .signup-form form a:hover {
    text-decoration: underline;
  }

  .signup-form .hint-text {
    padding-bottom: 15px;
    text-align: center;
    color: #333;
  }
</style>
</head>

<body>



  <?php



  if (isset($_POST['submit'])) {
    $username            = $_POST['user'];
    $username1           = $_POST['user1'];
    $email               = $_POST['email'];
    $mobile              = $_POST['mobile'];
    $password            = $_POST['pass'];
    $confirm_password    = $_POST['conpass'];
    $image               = $_FILES['image']['name'];
    $tempname             = $_FILES['image']['tmp_name'];
    move_uploaded_file($tempname,"dashboard/dataimage/$image");

    $qry = "SELECT * FROM `registration` WHERE email = '$email'";

    $resultt = mysqli_query($connection, $qry);

    $num = mysqli_num_rows($resultt);

    if ($num > 0) {
  ?>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script>
        swal({
          title: "Opps",
          text: "Email Already Exist!! Try With New Email",
          icon: "error",
        });
        //window.open('registration.php','_self');
      </script>

  <?php
    } else {

      $query = "INSERT INTO registration (user_name, user_name1,email, mobile_number, password, confirm_password, user_role,image) ";
      $query .= "VALUES ('$username','$username1', '$email', '$mobile', '$password', '$confirm_password', 'admin','$image')";


      $user_query = mysqli_query($connection, $query);

      if (!$user_query) {

        die("Query Failed!!" . mysqli_error($connection));
      } else {
        $message = '<div class="alert alert-success mt-2">Your Registration Has Been Submitted</div>';
      }
    }
  }


  ?>





  <div class="signup-form">
    <form action="" method="post" onsubmit="return validation()" enctype="multipart/form-data">
      <h2 class="text-center">Registration🤗🙃</h2>
      <p>Please fill in this form to create an account!!!🥺</p>
      <hr>
      <div class="form-group">

        <input type="text" class="form-control" placeholder="First Name" name="user" id="user">
        <!-- <div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div> -->
        <span id="username" class="text-danger font-weight-bold"></span>

      </div>
      <div class="form-group">

        <input type="text" class="form-control" placeholder="Last Name" name="user1" id="user1">
        <!-- <div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div> -->
        <span id="username1" class="text-danger font-weight-bold"></span>

      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Email" name="email" id="email">
        <span id="emailsid" class="text-danger font-weight-bold"></span>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Mobile Number" name="mobile" id="MobileNumber">
        <span id="mobileno" class="text-danger font-weight-bold"></span>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="pass" id="Pass">
        <span id="passwords" class="text-danger font-weight-bold"></span>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Confirm Password" name="conpass" id="conpass">
        <span id="confrmpass" class="text-danger font-weight-bold"></span>
      </div>
      <div class="form-group">
        <input type="file" class="form-control"  name="image"  required="requires">
        <span id="image" class="text-danger font-weight-bold"></span>
      </div>


      <div class="form-group">
        <button type="submit" class="btn btn-primary mt-5 btn-block shadow-sm font-weight-bold" name="submit" value="submit" id="submit">Sign Up</button>
        <?php
        if (isset($message)) {
          echo $message;
        } ?>
      </div>
    </form>
    <div class="hint-text">Already have an account?<a href="login.php">Login Here</a></div>




  </div>



  <script type="text/javascript">
    function validation() {
      var user = document.getElementById('user').value;
      var user1 = document.getElementById('user1').value;
      var email = document.getElementById('email').value;
      var MobileNumber = document.getElementById('MobileNumber').value;
      var Pass = document.getElementById('Pass').value;
      var conpass = document.getElementById('conpass').value;



      if (user == "") {
        document.getElementById('username').innerHTML = "** please enter the username field";
        return false;
      }
      if ((user.length <= 2) || (user.length > 20)) {
        document.getElementById('username').innerHTML = "** length should be between 2 and 20";
        return false;

      }
      if (!isNaN(user)) {
        document.getElementById('username').innerHTML = "** Number is not allowed ";
        return false;
      }
      if (user1 == "") {
        document.getElementById('username1').innerHTML = "** please enter the username field";
        return false;
      }
      if ((user1.length <= 2) || (user1.length > 20)) {
        document.getElementById('username1').innerHTML = "** length should be between 2 and 20";
        return false;

      }
      if (!isNaN(user1)) {
        document.getElementById('username1').innerHTML = "** Number is not allowed ";
        return false;
      }


      if (email == "") {
        document.getElementById('emailsid').innerHTML = "** please enter the email field";
        return false;
      }
      if (email.indexOf('@') <= 0) {
        document.getElementById('emailsid').innerHTML = "** @ invalid postion";
        return false;
      }
      if ((email.charAt(email.length - 4) != '.') && (email.charAt(email.length - 3) != '.')) {

        document.getElementById('emailsid').innerHTML = "** . invalid postion";
        return false;
      }

      if (MobileNumber == "") {
        document.getElementById('mobileno').innerHTML = "** please enter the Mobile Number field";
        return false;
      }
      if (isNaN(MobileNumber)) {
        document.getElementById('mobileno').innerHTML = "** characters are not allowed";
        return false;
      }
      if (MobileNumber.length != 10) {
        document.getElementById('mobileno').innerHTML = "** there should be 10 digits";
        return false;
      }




      if (Pass == "") {
        document.getElementById('passwords').innerHTML = "** please enter the password field";
        return false;
      }
      if ((Pass.length <= 2) || (Pass.length > 20)) {
        document.getElementById('passwords').innerHTML = "** length should be between 5 and 20";
        return false;
      }
      if (Pass != conpass) {
        document.getElementById('confrmpass').innerHTML = "** password and confirm password are not same";
        return false;
      }



      if (conpass == "") {
        document.getElementById("confrmpass").innerHTML = "** please enter the confirm password field";
        return false;
      }









    }
  </script>

</body>

</html>