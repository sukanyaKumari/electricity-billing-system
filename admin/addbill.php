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
     <div class="container">
         <h3 class="text-center mb-4" style="color:red; font-style:italic;">Add Customer Bill</h3>
         <div class="row">
             <div class="col-lg-7 mx-auto">
                <div class="card">
                    <div class="card-body">
                         <form method="post">
                     <div class="form-group">
                         <label>Consumer No.</label>
                         <select name="ca_number" class="form-control">
                                <?php
                                    $callingca = $data->callingData('addcustomer');
                                    foreach($callingca as $cano):
                                    ?>
                                 <option value="<?= $cano['ca_number'];?>"><?= $cano['ca_number'];?>,(<?= $cano['c_id'];?>)</option>
                                 <?php endforeach;?>
                             </select>
                     </div> 
                     <div class="form-group">
                         <label>Previous Reading</label>
                         <input type="number" name="bill" class="form-control">
                     </div>
                     <div class="form-group">
                         <label>Current Reading</label>
                         <input type="number" name="creading" class="form-control">
                     </div>
                     <div class="form-group">
                         <label>Charge Per Unit</label>
                         <input type="number" name="charge" class="form-control">
                     </div>
                     <div class="form-group">
                         <label>discount</label>
                         <input type="number" name="discount" class="form-control">
                     </div>
                    <div class="form-group">
                         <label>Bill For month</label>
                         <input type="month" name="month_bill" class="form-control">
                     </div>
                    <div class="form-group">
                         <label>due date</label>
                         <input type="date" name="duedate" class="form-control">
                     </div>
                     <div class="group-form">
                         <input type="submit" name="billcharge" class="btn btn-success form-control">
                     </div>
                 </form>
                   <?php
                    if(isset($_POST['billcharge'])){
                       $ca_number = $_POST['ca_number'];
                       $bill = $_POST['bill'];
                       $creading = $_POST['creading'];
                       $charge = $_POST['charge'];
                       $discount = $_POST['discount'];
                       $month_bill = $_POST['month_bill'];
                       $duedate = $_POST['duedate'];
                       $query = $data->insertData('addbill',"(ca_number,bill,creading,charge,discount,month_bill,duedate) value   ('$ca_number','$bill','$creading','$charge','$discount','$month_bill','$duedate')");
               
                  if($query==true){
                     $data->redirect('addbill');
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