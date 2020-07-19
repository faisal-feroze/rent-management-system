<nav id="sidebar" class="sidebar-wrapper">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <div class="sidebar-content">
    <div class="sidebar-brand">
      <a href="#">Rent System</a>
      <div id="close-sidebar">
        <i class="fas fa-times"></i>
      </div>
    </div>
    <div class="sidebar-header">
      <div class="user-pic">
        <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
          alt="User picture">
      </div>
      <div class="user-info">
        <span class="user-name">
          <strong><?php echo $_SESSION['first_name']." ".$_SESSION['last_name'];?></strong>
        </span>
        <span class="user-role">Administrator</span>
        <span class="user-status">
          <i class="fa fa-circle"></i>
          <span>Online</span>
        </span>
      </div>
    </div>

    <div class="sidebar-menu">
      <ul>
        <li class="header-menu">
          <span>General</span>
        </li>
        <li class="sidebar-dropdown dashboard">
          <a href="home.php?act=dashboard">
            <i class="fa fa-tachometer-alt"></i>
            <span>Dashboard</span>
            <!-- <span class="badge badge-pill badge-warning">New</span> -->
          </a>
        </li>
        <li class="sidebar-dropdown settings">
          <a href="home.php?act=settings">
            <i class="fa fa-shopping-cart"></i>
            <span>Settings</span>
            <!-- <span class="badge badge-pill badge-danger">3</span> -->
          </a>
        </li>

        <li class="sidebar-dropdown add_building">
          <a href="home.php?act=add_building">
            <i class="far fa-gem"></i>
            <span>Add Building</span>
          </a>
        </li>

        <li class="sidebar-dropdown add_flat">
          <a href="home.php?act=add_flat">
            <i class="far fa-gem"></i>
            <span>Add Flat</span>
          </a>
        </li>
        <li class="sidebar-dropdown tenant_info">
          <a href="home.php?act=tenant_info">
            <i class="fa fa-chart-line"></i>
            <span>Tenant</span>  <span id="tm">Management</span>
          </a>
        </li>

        <li class="sidebar-dropdown gen_bill">
          <a href="home.php?act=gen_bill">
            <i class="fa fa-globe"></i>
            <span>Generate Bill</span>
          </a>
        </li>

        <li class="sidebar-dropdown received_bill">
          <a href="home.php?act=received_bill">
            <i class="fa fa-chart-line"></i>
            <span>Receive bill</span>
          </a>
        </li>

        <li class="sidebar-dropdown ledger">
          <a href="home.php?act=ledger">
            <i class="fa fa-globe"></i>
            <span>Ledger Report</span>
          </a>
        </li>

        <li class="sidebar-dropdown">
          <a href="logout.php">
            <i class="fa fa-globe"></i>
            <span>Logout</span>
          </a>
        </li>

      </ul>
    </div>
    <!-- sidebar-menu  -->
  </div>
</nav>
