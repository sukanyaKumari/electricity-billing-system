<?php require_once("../include/config.php");
if(isset($_SESSION['admin_log'])){
    $data->redirect('index');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>admin</title>
     <link rel="stylesheet" href="bootstrap.css">
</head>
<body style="background-color:#5c5151">
    <?php include "nav.php";?>
     <div class="container mt-5">
    
       <div class="row">
           <div class="col-lg-3 mx-auto shadow">
              <h5 class="text-center" style="font-style:italic; color: red;">Admin Login</h5>
               <form action="login.php" method="post">
                   <div class="mb-3">
                       <label class="text-white">Username</label>
                       <input type="text" name="username" class="form-control">
                   </div>
                   <div class="mb-3">
                       <label class="text-white">password</label>
                       <input type="password" name="password" class="form-control">
                   </div>
                   <div class="mb-3">
                       <input type="submit" name="admin_login" class="btn btn-success form-control">
                   </div>
               </form>
               <?php
           if(isset($_POST['admin_login'])){
               $username = $_POST['username'];
               $password = $_POST['password'];
               $query = $data->checkData('admin',"username='$username' AND password='$password'");
               
               if($query==true){
                   $_SESSION['admin_log'] = $username;
                   $data->redirect('index');
               } 
               else{
                   echo"fail";
               }
           }
           
           ?>
                
        </div>
       </div>
    </div>
    
</body>
</html>
