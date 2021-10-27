<?php require_once("../include/config.php");
   if(!isset($_SESSION['admin_log'])){
    $data->redirect('login');
}

if(isset($_GET['del'])){
    $id = $_GET['del'];
    $query = $data->deleteData("connection"," id='$id'");
    $data->redirect('customer');
}

?>
