<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <div class="logo"><a href="./admin.php" class="simple-text logo-normal">
        <!-- https://materializecss.com/icons.html -->
          SENSORS
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="./admin.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
         <?php if($_SESSION['user_role'] != 4 ){ ?>
          <li class="nav-item ">
            <a class="nav-link" href="./reports.php">
              <i class="material-icons">chat_bubble</i>
              <p>Fixed Reports</p>
            </a>
          </li>
          <?php } ?>
          <?php if($_SESSION['user_role'] != 4 ){ ?>
           <li class="nav-item ">
             <a class="nav-link" href="./realtime.php">
               <i class="material-icons">live_tv</i>
               <p>Realtime Reports</p>
             </a>
           </li>
           <?php } ?>

           <?php if($_SESSION['user_role'] != 4 && $_SESSION['user_role'] != 3){ ?>
          <li class="nav-item ">
            <a class="nav-link" href="./users.php">
              <i class="material-icons">list</i>
              <p>User List</p>
            </a>
          </li>
          <?php } ?>
          </ul>
      </div>
    </div>
