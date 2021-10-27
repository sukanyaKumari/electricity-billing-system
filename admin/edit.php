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
         <h3 class="text-center mb-4" style="color:red; font-style:italic;">Edit Connection</h3>
         <div class="row">
             <div class="col-lg-6 mx-auto">
                 <?php
                 $c_id = $_GET['id'];
                  $callingcust = $data->callingData('addcustomer',"c_id='$c_id'");
                  $row = $callingcust;
                 ?>
                <div class="card">
                   <div class="card-body">
                       <form action="" method="post">
                          
                           <div class="form-group">
                               <label>10-digit Consumer Account No.</label>
                               <input type="number" name="ca_number" value="<?= $row[0]['ca_number'];?>" class="form-control">
                           </div>
                           <div class="form-group">
                               <label>Pin Code</label>
                               <input type="number" name="pincode"  value="<?= $row[0]['pincode'];?>"  class="form-control">
                           </div>
                           <div class="form-group">
                               <label>Plot No.</label>
                               <input type="number" name="plotno" value="<?= $row[0]['plotno'];?>"  class="form-control">
                           </div>
                           <div class="form-group">
                               <input type="submit" name="send" class="btn btn-success form-control">
                           </div>
                       </form>
                       <?php
                        if(isset($_POST['send'])){
                        $edit_id = $_GET['id'];
                        $ca_number = $_POST['ca_number'];
                        $pincode = $_POST['pincode'];
                        $plotno = $_POST['plotno'];
                        $query = $data->editData("addcustomer","
                        ca_number = '$ca_number',
                        pincode = '$pincode',
                        plotno = '$plotno'","c_id='$edit_id'");
                        if($query==true){
                            echo "edit hoga";
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