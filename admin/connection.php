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
     <div class="container mt-4">
         <h3 class="text-center mb-4" style="color:red; font-style:italic;">Add Connection</h3>
         <div class="row">
             <div class="col-lg-4">
                <div class="card">
                   <div class="card-body">
                       <form action="" method="post">
                           <div class="form-group">
                             <label>Customer Name</label>
                             <select name="name" class="form-control">
                                <?php
                                    $cuscalling = $data->callingData('connection');
                                    foreach($cuscalling as $cus):
                                    ?>
                                 <option value="<?= $cus['id'];?>"><?= $cus['name'];?></option>
                                 <?php endforeach;?>
                             </select>
                             
                           </div>
                           <div class="form-group">
                               <label>10-digit Consumer Account No.</label>
                               <input type="number" name="ca_number" class="form-control">
                           </div>
                           <div class="form-group">
                               <label>Pin Code</label>
                               <input type="number" name="pincode" class="form-control">
                           </div>
                           <div class="form-group">
                               <label>Plot No.</label>
                               <input type="number" name="plotno" class="form-control">
                           </div>
                           <div class="form-group">
                               <input type="submit" name="send" class="btn btn-success form-control">
                           </div>
                       </form>
                       <?php
           if(isset($_POST['send'])){
               $name = $_POST['name'];
               $ca_number = $_POST['ca_number'];
               $pincode = $_POST['pincode'];
               $plotno = $_POST['plotno'];
               $query = $data->insertData('addcustomer',"(name,ca_number,pincode,plotno) value ('$name','$ca_number','$pincode','$plotno')");
               
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
             <div class="col-lg-8">
                <table class="table">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>Customer Account No.</th>
                        <th>Connection starting Date</th>
                        <th>Pin Code</th>
                        <th>Plot No</th>
                        <th>Action</th>
                    </tr>
                    <?php
                 $connectioncalling = $data->callingData('addcustomer');
                 foreach($connectioncalling as $connect):
                 ?>
                    <tr>
                      <td><?= $connect['c_id'];?></td> 
                      <td><?= $connect['name'];?></td> 
                      <td><?= $connect['ca_number'];?></td> 
                      <td><?= $connect['cdate'];?></td> 
                      <td><?= $connect['pincode'];?></td> 
                      <td><?= $connect['plotno'];?></td> 
                      <td><a href="edit.php?id=<?= $connect['c_id'];?>" class="btn btn-info btn-sm">edit</a></td> 
                      <?php endforeach;?>
                    </tr>
                </table>
                 
             </div>
         </div>
     </div>
    
    
    
</body>
</html>