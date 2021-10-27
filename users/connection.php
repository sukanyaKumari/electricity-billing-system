<?php require_once("../include/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bijli</title>
    <?php require_once("../include/link.php");?>
</head>
<body>
    <?php include "nav.php";?>
   <div class="container mt-5">
       <div class="row">
           <div class="col-lg-7 mx-auto">
              <h5 class="text-center mb-3">Register Customer</h5>
              <div class="card">
                  <div class="card-body">
                      <form action="" method="post">
                          <div class="form-group">
                              <label>Customer Name</label>
                              <input type="text" name="name" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Customer Contact</label>
                              <input type="number" name="contact" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Customer Email ID</label>
                              <input type="text" name="email" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Password</label>
                              <input type="password" name="password" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Customer Address</label>
                              <input type="text" name="address" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>City</label>
                              <input type="text" name="city" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>state</label>
                              <input type="text" name="state" class="form-control">
                          </div>
                          <div class="form-group">
                              <input type="submit" value="save" name="submit" class="btn btn-success form-control">
                          </div>
                      </form>
                         <?php
           if(isset($_POST['submit'])){
               $name = $_POST['name'];
               $contact = $_POST['contact'];
               $email = $_POST['email'];
               $password = $_POST['password'];
               $address = $_POST['address'];
               $city = $_POST['city'];
               $state = $_POST['state'];
               $query = $data->insertData('connection',"(name,contact,email,password,address,city,state) value ('$name','$contact','$email','$password','$address','$city','$state')");
               
               if($query==true){
                  $data->redirect('connection');
               } 
               else{
                   echo"fail";
               }
           }
           
           ?>
                  </div>
              </div>
           </div>
       </div>
   </div>
    
</body>
</html>