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
     <div class="navbar navbar-expand-lg navbar-dark shadow" style="background-color:#5c5151">
     <a href="index.php" class="navbar-brand">Admin panal | Bijli</a>
     <form method="get" class="mx-auto form-inline" action="showbill.php">
         <input type="text" name="search" class="form-control" placeholder="search anyone bill by customer number" size="60">
         <input type="submit" name="find" class="btn btn-success">
     </form>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="index.php" class="nav-link">Home</a>
        </li>
        <?php
        if(isset($_SESSION['admin_log'])):?>
        <li class="nav-item">
            <a href="logout.php" class="btn btn-danger">logout</a>
        </li>
        <?php else:?>
        <li class="nav-item">
            <a href="login.php" class="btn btn-dark">login</a>
        </li>
        <?php endif;?>
    </ul>
       
</div>
     <div class="container mt-4">
         <h3 class="text-center mb-4" style="color:red; font-style:italic;">View Customer Bill</h3>
         <div class="row">
           
             <div class="col">
              
                 <table class="table border table-striped">
                     <tr>
                         <th>Consumer No.</th>
                         <th>Current reading</th>
                         <th>Previous</th>
                         <th>Total units</th>
                         <th>Charge per unit</th>
                         <th>discount</th>
                         <th>Amount</th>
                         <th>gst</th>
                         <th>Final Amount</th>
                         <th>Bill For Month</th>
                         <th>Due Date</th>
                     </tr>
                         <?php 
                 if(isset($_GET['find'])){
                     $search = $_GET['search'];
                      $billcalling = $data->callingData('addbill',"addbill.ca_number LIKE '%$search%'");
                 }
                 else{
                     $billcalling = $data->callingData('addbill');
                 }
                         
                         foreach($billcalling as $bill):
                   ?>
                   <tr>
                       <td><?= $bill['ca_number'];?></td>
                       <td><?= $bill['creading'];?></td>
                       <td><?= $bill['bill'];?></td>
                       <td><?= $bill['creading']+$bill['bill'];?></td>
                       <td><?= $bill['charge'];?></td>
                       <td><?= $bill['discount'];?></td>
                       <td><?=($bill['creading']+$bill['bill'])*$bill['charge'];?></td>
                       <td><?=($bill['creading']+$bill['bill'])*$bill['charge']*18/100;?></td>
                       <td><?= (($bill['creading']+$bill['bill'])*$bill['charge'])+(($bill['creading']+$bill['bill'])*$bill['charge']*18/100)-($bill['discount']);?></td>
                       <td><?= $bill['month_bill'];?></td>
                       <td><?= $bill['duedate'];?></td>
                   </tr>
                   <?php endforeach;?>
                 </table>
             </div>
         </div>
     </div>
    
    
    
</body>
</html>