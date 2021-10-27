<?php require_once("../include/config.php");
if(isset($_SESSION['log'])){
    $data->redirect('userdetail');
}
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
       <div class="col-lg-4 mx-auto">
         
           <div class="card">
               <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>  
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>  
                        <div class="form-group">
                            <input type="submit" name="login" value="login" class="btn btn-success form-control">
                        </div> 
                   </form>
                   <?php
                   if(isset($_POST['login'])){
                       $email = $_POST['email'];
                       $password = $_POST['password'];
                       $result = $data->checkData('connection',"email='$email' AND password='$password'");
                       if($result==true):
                           $_SESSION['log'] = $email;
                           $data->redirect('userdetail');
                       else:
                           echo "<small style='color:red'>Email Id or Password Is Incorrect Please Try Again</small>";
                       endif;
                   }
                   ?>
               </div>
           </div>
       </div>
   </div>
   </div>
    
</body>
</html>