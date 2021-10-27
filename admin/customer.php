<?php require_once("../include/config.php");
   if(!isset($_SESSION['admin_log'])){
    $data->redirect('login');
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>admin</title>
     <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
     <?php include "nav.php";?>
     <div class="container-fluid mt-4">
         <h3 class="text-center mb-4" style="color:red; font-style:italic;">All Customers Details</h3>
    
     <div class="row">
         <div class="col-10 mx-auto">
             <table class="table border shadow">
                 <tr style="background-color:#00d8ff">
                     <th>Customer Id</th>
                     <th>Customer Name</th>
                     <th>Contact</th>
                     <th>Email</th>
                     <th>Password</th>
                     <th>Address</th>
                     <th>City</th>
                     <th>State</th>
                     <th>Action</th>
                 </tr> 
                 <?php
                 $customercalling = $data->callingData('connection');
                 foreach($customercalling as $cus):
                 ?>
                 <tr>
                     <td><?= $cus['id'];?></td>
                     <td><?= $cus['name'];?></td>
                     <td><?= $cus['contact'];?></td>
                     <td><?= $cus['email'];?></td>
                     <td><?= $cus['password'];?></td>
                     <td><?= $cus['address'];?></td>
                     <td><?= $cus['city'];?></td>
                     <td><?= $cus['state'];?></td>
                     <td><a href="deletes.php?del=<?= $cus['id'];?>" class="btn btn-danger text-white btn-sm">Delete</a></td>
                     
                 </tr>
                 <?php endforeach;?>
             </table>
         </div>
     </div>
     </div>
    
</body>
</html>