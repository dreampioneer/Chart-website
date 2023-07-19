 <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <h4 class="p-3"><?php echo ucfirst($name2); ?></h4>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <span> <?php echo UserRole($_SESSION['user_role']);?></span>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="./admin.php">Dashboard</a>
                  <a class="dropdown-item" href="./reports.php">Reports</a>
                  <a class="dropdown-item" href="./users.php">Users</a>
                  <a class="dropdown-item" href="./actions/logout.php">Log out</a>

                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
  <?php
function UserRole($role)
{
  switch ($role) {
    case 1:
      return 'Super Admin';
      break;
      case 2:
      return 'Limited Admin';
      break;
      case 3:
      return 'Pre-Weekend';
      break;
      case 4:
      return 'Retor';
      break;
    default:
     return 'User';
      break;
  }
}
?>
