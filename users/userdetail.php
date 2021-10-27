<?php require_once("../include/config.php");
$user = $_SESSION['log'];
if(!isset($_SESSION['log'])){
    $data->redirect('userlogin');
}
$getCustomer = $data->callingData('addcustomer JOIN connection ON addcustomer.name= connection.id',"email = '$user'");
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
       <div class="col">
                  <?php
                   if($getCustomer[0]['ca_number']!=0):?>
                   <h1 class="h4 text-center mb-4" style="color:green">Your Registration is Approved</h1>
           <table class="table border shadow">
              
               <tr style="background-color:#00d8ff">
                   <th>ID</th>
                   <th>name</th>
                   <th>contact</th>
                   <th>address</th>
                   <th>city</th>
                   <th>state</th>
                   <th>C.A Number</th>
                   <th>starting data</th>
                   <th>pin code</th>
                   <th>plot number</th>
               </tr> 
              
               <tr>
                   <th><?= $getCustomer[0]['c_id'];?></th>
                   <th><?= $getCustomer[0]['name'];?></th>
                   <th><?= $getCustomer[0]['contact'];?></th>
                   <th><?= $getCustomer[0]['address'];?></th>
                   <th><?= $getCustomer[0]['city'];?></th>
                   <th><?= $getCustomer[0]['state'];?></th>
                   <th><?= $getCustomer[0]['ca_number'];?></th>
                   <th><?= $getCustomer[0]['cdate'];?></th>
                   <th><?= $getCustomer[0]['pincode'];?></th>
                   <th><?= $getCustomer[0]['plotno'];?></th>
               </tr>
               
           </table>
           <?php else: ?>
            <h1 class="h3 text-center" style="color:red">Your Registration Is Not Approved</h1>
            <p class="h6 text-center text-danger">Wait For Admin Approval</p>
            <?php endif;?>
       </div>
   </div>
   </div>
    
</body>
</html>