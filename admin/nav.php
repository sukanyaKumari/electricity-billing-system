<div class="navbar navbar-expand-lg navbar-dark shadow" style="background-color:#5c5151">
     <a href="index.php" class="navbar-brand">Admin panal | Bijli</a>
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