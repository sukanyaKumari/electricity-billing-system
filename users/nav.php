<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a href="../index.php" class="navbar-brand font-weight-bold ml-5" style="font-style:oblique">BIJLI</a>
      <ul class="navbar-nav">
          <li class="nav-item">
              <a href="../about.php" class="nav-link">About</a>
          </li> 
          <li class="nav-item">
              <a href="../contact.php" class="nav-link">Contact Us</a>
          </li>
          <li class="nav-item">
              <a href="../help.php" class="nav-link">Help</a>
          </li>
      </ul>
     <ul class="navbar-nav ml-auto">
       <?php
        if(isset($_SESSION['log'])):?>
        <li class="nav-item">
            <a href="logout.php" class="btn btn-danger">logout</a>
        </li>
        <?php else:?>
        <li class="nav-item">
            <a href="userlogin.php" class="btn btn-dark">login</a>
        </li>
        <?php endif;?>
    </ul>
    
   </nav>