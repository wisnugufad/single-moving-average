<?php 
session_start();
if(isset($_SESSION['username']) && empty($_SESSION['username'])) {
  header('location: ../index.php');
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Lings Petshop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <?php 
      if ($_SESSION['role'] === 'ADMIN') {
      ?>
      <li class="nav-item">
        <a class="nav-link" href="InputPenjualan.php">Penjualan</a>
      </li>
      <?php
      }
      ?>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
      
      <span class="navbar-text" style="margin-right: 5px;">
      <?php echo $_SESSION['username']." (".$_SESSION['role'].")"; ?>
    </span>
      <a class="btn btn-danger my-2 my-sm-0" href="../models/logout.php" id="logout">Log Out</a>
    </form>
  </div>
</nav>