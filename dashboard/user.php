<!doctype html>
<html lang="en">
  <head>
  <?php include"header.php";?>



    <title>Inventory Management System</title>
  </head>
  <body>
    <?php include"navigation.php";?>
    <div class="margin4">
<div class="col-sm-15 col-md-10 mt-5 text-center">
  <form class="mx-5" action="" method="POST">

  <h4 class="  text-white p-2"style="background-color: #4b4276">List of Users</h4>
  <?php
  $sql ="SELECT * FROM `registration`";
  $result = mysqli_query($connection,$sql);
  $run = mysqli_num_rows($result);
  if ($run>0) {
     echo '<table class="table">
  <thead>
   <tr>
    <th scope="col">Requester Id</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">Mobile No:</th>
    <th scope="col">Action</th>
   </tr>
  </thead>
  <tbody>';
   
   while ($row=mysqli_fetch_assoc($result)) {
     echo '<tr>
    <th scope="row">'.$row['id'].'</th>
    <td>'.$row['user_name'].'</td>
    <td>'.$row['email'].'</td>
    <td>'.$row['mobile_number'].'</td>
    <td>
   
        <form action="" method="POST" class="d-inline">
          <input type="hidden" name="id" value='.$row['id'].'>
          <button type="submit" class="btn btn-danger mr-3" name="delete" value="">
            <i class="far fa-trash-alt"></i>
          </button>
        </form> 
        </td>
        
       </tr>';
}

 '</tbody>
 </table>';
   
 }
  ?>
        
</div>
<?php
if (isset($_REQUEST['delete'])) {
    $sql = "DELETE FROM `registration` WHERE `id`={$_REQUEST['id']}";
    $result = mysqli_query($connection,$sql);
    if ($result== TRUE) {
    echo '<meta http-equiv="refresh" content="0;URL=?closed"/>';
    }else{
      echo "Unable To Delete";
    }
 } 
 ?>
    
  </thead>
  <tbody>
  </table>
 </form>
</div>
</div>
    
</body>
</html>
