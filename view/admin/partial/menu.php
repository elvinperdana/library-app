<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[4];
// var_dump($first_part);
// die;
?>

<!-- Nav bar Menu -->


<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-navbar-css" style="width: 280px;">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"></svg>
      <span class="fs-4">Admin Page</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="./index.php" class="nav-link text-white <?php if ($first_part=="index.php") echo "active"?>" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="./index.php"></use></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="./masterproduct.php" class="nav-link text-white <?php if ($first_part=="masterproduct.php" || $first_part=="masterproduct_add.php" || $first_part=="masterproduct_edit.php") echo "active"?>">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="./masterproduct.php"></use></svg>
          Master Product
        </a>
      </li>
      <li>
        <a href="./transaction.php" class="nav-link text-white <?php if ($first_part=="transaction.php") echo "active"?>">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="./transaction"></use></svg>
          Transaction
        </a>
      </li>
    </ul>
    <hr>
  </div>
