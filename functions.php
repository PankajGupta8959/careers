

<?php


function login(){

    

    global $connection;


    $email = $_POST['email'];
       $password = $_POST['password'];

       $query = "SELECT * FROM registration WHERE email = '$email'";
       $user_query = mysqli_query($connection, $query);
       if(!$user_query){
           die("QUERY FAILED!!".mysqli_error($connection));
       }

       while($row = mysqli_fetch_assoc($user_query)){

        $db_id = $row['id'];
        $db_name = $row['user_name'];
        $db_email = $row['email'];
        $db_mobile = $row['mobile_number'];
        $db_password = $row['password'];
        $db_user_role = $row['user_role'];

        if($db_email == $email && $db_password == $password)
        {
            $_SESSION['id'] = $db_id;
            $_SESSION['user_name'] = $db_name;
            $_SESSION['email'] = $db_email; 
            $_SESSION['mobile_number'] = $db_mobile; 
            $_SESSION['password'] = $db_password;
            $_SESSION['user_role'] = $db_user_role;

            header("Location: dashboard/profile.php?update_email=$email");
        }

        else{

            $message = '<div class="alert alert-warning mt-2">Email Or Password Is Wrong</div>';
           
        }
       }
}




?>


