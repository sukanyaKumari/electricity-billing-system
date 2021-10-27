<?php require_once("include/config.php");
if(isset($_SESSION['login'])){
    $data->redirect('bill');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bijli</title>
    <?php require_once("include/link.php");?>
</head>
<body> 
  <?php require_once("include/header.php");?>
    
   <div class="container mt-3">
       <div class="row">
           <div class="col-lg-3">
              <div class="list-group bg-light  shadow" style="border: 2px solid #17a2b8;">
                  <a href="about.php" class="list-group-item list-group-item-action border border-info">About Us<label class="float-right text-small">>></label></a>
                  <a href="users/connection.php" class="list-group-item list-group-item-action border border-info">New Connection<label class="float-right text-small">>></label></a>
                  <a href="users/userlogin.php" class="list-group-item list-group-item-action border border-info">User Login <label class="float-right text-small">>></label></a> 
                  <a href="" class="list-group-item list-group-item-action border border-info">Notification<label class="float-right text-small">>></label></a>
                  <a href="" class="list-group-item list-group-item-action border border-info">complen<label class="float-right text-small">>></label></a>
                  <a href="feedback.php" class="list-group-item list-group-item-action border border-info">Feedback<label class="float-right text-small">>></label></a>
                  <a href="help.php" class="list-group-item list-group-item-action border border-info">Help<label class="float-right text-small">>></label></a>
              </div>
               
           </div>
           <div class="col-lg-6 mx-auto">
                <div class="card" style="border: 2px solid #17a2b8;">
                   <div class="card-header" >Fill Your Details </div>
                    <div class="card-body" style="border-top: 2px solid #17a2b8;">
                        <form method="post">
                         <div class="form-group">
                             <label>Enter 10 Digit Consumer Nomber</label>
                             <input type="text" name="ca_number" class="form-control">
                         </div> 
                         <div class="form-group">
                          <label>select your city</label>
                             <select name="name" class="form-control ">
                                <?php
                                    $cuscalling = $data->callingData('connection');
                                    foreach($cuscalling as $cus):
                                    ?>
                                 <option value="<?= $cus['id'];?>"><?= $cus['city'];?></option>
                                 <?php endforeach;?>
                             </select>
                            </div>
                         <div class="form-group">
                             <input type="submit" name="send" class="btn btn-danger form-control">
                         </div>
                          
                        </form>
                         <?php
                   if(isset($_POST['send'])){
                       $ca_number = $_POST['ca_number'];
                       $result = $data->checkData('addcustomer',"ca_number='$ca_number'");
                       if($result==true):
                           $_SESSION['login'] = $ca_number;
                           $data->redirect('bill');
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