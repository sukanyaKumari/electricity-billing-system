<?php require_once("include/config.php");
$userBill = $_SESSION['login'];
if(!isset($_SESSION['login'])){
    $data->redirect('index');
}
$getBill = $data->callingData('addbill',"ca_number = '$userBill'");
$getName = $data->callingData('addcustomer JOIN connection ON addcustomer.name= connection.id',"ca_number = '$userBill'");
$getPay = $data->callingData('payment',"ca_number = '$userBill'");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bijli</title>
    <?php require_once("include/link.php");?>
    
</head>
<body>
   <?php require_once "navs.php";?> 
   <div class="container mt-3">
               <h5 class="text-center">Customer Name</h5>
               <h5 class="text-center"> <?= $getName[0]['name'];?></h5>
               <h5 class="text-center"> <?= $getName[0]['ca_number'];?></h5>
           
   <div class="row">
       <div class="col">
                <table class="table border table-striped">
                     <tr>
                        <th>Bill Id</th>
                        <th>Bill For Month</th>
                         <th>Current reading</th>
                         <th>Total units</th>
                         <th>Charge per unit</th>
                         <th>Discount</th>
                         <th>Final Amount</th>
                         <th>Due Date</th>
                         
                         
                     </tr>
                     <?php 
                     $billscalling = $data->callingData("addbill","ca_number='$userBill'");
                    $total = 0;
                    foreach($billscalling as $bills):?>
                   <tr>
                   <td><p><?= $bills['b_id'];?></p></td>
                       <td><?= $bills['month_bill'];?></td>
                       <td><?= $bills['creading'];?></td>
                       <td><?= $bills['creading']+$bills['bill'];?></td>
                       <td><?= $bills['charge'];?></td>
                       <td><?= $bills['discount'];?></td>
                        <td><?= (($bills['creading']+$bills['bill'])*$bills['charge'])+(($bills['creading']+$bills['bill'])*$bills['charge'])-($bills['discount']);?></td>
                        
                      <th><?=$bills['duedate'];?></th>
                      
                    <?php $total += (($bills['creading']+$bills['bill'])*$bills['charge'])+(($bills['creading']+$bills['bill'])*$bills['charge'])-($bills['discount']);?>
                   </tr>
                   <?php endforeach;?> 
                    <?php
                        $paytu = 0;
                        foreach($getPay as $p){$paytu+=$p['amount'];}
                    ?>
        
                 </table>
                 <div class="row">
                     <div class="col-lg-5 mx-auto">
                        <?php if($total-$paytu == 0):?>
                         <a href="" data-toggle="modal" class="btn btn-block btn-success btn-lg">Paid <?=$total-$paytu;?>/-</a>
                         <?php else: ?>
                            <a href="#pay" data-toggle="modal" class="btn btn-block btn-info btn-lg">due <?=$total-$paytu;?>/-</a>
                            <?php endif;?>
                     </div>
                 </div>
                 <div class="modal fade" id="pay">
                    <div class="modal-dialog">
                         <div class="modal-content">
                         <div class="modal-header">
                         <div class="row">
                             <div class="col-lg-6"><h5>Payment Details</h5></div>
                             <div class="col-lg-4"><img src="Essential-Minimal-Payment-Icons.jpg" width="100%" height="25px"></div>
                             <div  class="modal-body">
                                 <form action="bill.php" method="post">
                                      <div class="form-group">
                                         <label>Customer Number</label>
                                             <select name="ca_number" class="form-control">
                                                <?php
                                                  $callingbill = $data->callingData('addbill');
                                                    foreach($callingbill as $bill):
                                                        ?>
                                                     <option value="<?= $bill['ca_number'];?>" <?php if($bill['ca_number'] == $userBill){echo"selected";}?>><?= $bill['ca_number'];?></option>
                                                     <?php endforeach;?>
                                                 </select>
                                      </div>  
                                        <div class="form-group">
                                         <label>Amount</label>
                                            <input type="number" name="amount" class="form-control" value="<?=$total-$paytu;?>">
                                      </div> 
                                      <div class="form-group">
                                            <input type="submit" name="pay" value="payment" class="btn btn-success form-control">
                                      </div>
                                 </form>
                                
                             </div>
                             
                         </div>
                         
                         </div>
                     </div>
                    </div>
                 </div>
                 <div class="row">
                     <div class="col-lg-5 mt-4 mx-auto">
                        <div class="card">
                           <div class="card-header"> <h5 class="text-center">Payment History</h5></div>
                            <div class="card-body">
                             <table class="table border-0">
                             <tr>
                                 <th class="border-0 border-bottom">Payment</th>
                                 <th class="border-0 text-right border-bottom">Payment Timing</th>
                             </tr>   
                         <?php
                                
                                 
                         $paycalling = $data->callingData('payment',"ca_number='$userBill'");
                         foreach($paycalling as $pc):?>
                         
                             <tr>
                                 <td class="border-0 "><p><?= $pc['amount'];?></p></td>
                                 <td class="border-0 text-right"><p><?= $pc['timestp'];?></p></td>
                             </tr>
                        
                         <?php endforeach;?>
                         
                            </table>
                         
                            </div>
                        </div>
                     </div>
                 </div>
          <?php
           if(isset($_POST['pay'])){
               $ca_number = $_POST['ca_number'];
               $amount = $_POST['amount'];
               $query = $data->insertData('payment',"(ca_number,amount) value ('$ca_number','$amount')");
               
               if($query==true){
                  $data->redirect('bill');
               } 
               else{
                   echo"fail";
               }
           }
           
           ?>
       </div>
   </div>
 
   
   </div> 
   <?php require_once("include/footer.php");?>
</body>

</html>