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
     <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3">
                <div class="list-group bg-light shadow">
                  <a href="index.php" class="list-group-item list-group-item-action active">Dashbord</a>
                  <a href="customer.php" class="list-group-item list-group-item-action ">Customer Details</a>
                  <a href="connection.php" class="list-group-item list-group-item-action">Add Connection</a>
                  <a href="addbill.php" class="list-group-item list-group-item-action">Add Bill</a>
                  <a href="showbill.php" class="list-group-item list-group-item-action">Show Bill</a>
              </div>
                
            </div>
            <div class="col-lg-9 bg-light">
                  <h2 class="mb-4 mt-1">welcome in bijli admin panel</h2>
                   <div class="row">
                    <div class="col-lg-3 mb-4">
                        <div class="card  py-3 text-white" style="background-color:#32bab5">
                            <div class="card-body">
                               <h5 class="text-center">Total Customer</h5>
                               <h4 class="text-center"> <?php 
                                    $table = $data->countData("connection");
                                    echo $table;
                                ?></h4>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-3 mb-4 ">
                        <div class="card  py-1 text-white" style="background-color:#b70d34">
                            <div class="card-body">
                               <h5 class="text-center">Approved Customer</h5>
                               <h4 class="text-center">

                                   <?php 
                                    $table = $data->countData("addcustomer","ca_number!='0'");
                                    echo $table;
                                ?>
                                
                                  
                            </h4>
                            </div>
                        </div>
                    </div>  
                    <div class="col-lg-3 mb-4">
                        <div class="card  py-1 text-white" style="background-color:#2171ce">
                            <div class="card-body">
                               <h5 class="text-center">Not Approved Customer</h5>
                               <h4 class="text-center"> 
                                   <?php 
                                    $table = $data->countData("addcustomer","ca_number='0'");
                                    echo $table;
                                ?>
                                
                                 </h4>
                            </div>
                        </div>
                    </div> 
                   
                   
                </div>
                  <a href="customer.php" class="btn btn-warning btn-lg px-5">Customer Details </a>
                  <a href="connection.php" class="btn btn-success btn-lg px-5">Add Connection</a>
                
               
            </div>
        </div>
         
     </div>
    
    
</body>
</html>
