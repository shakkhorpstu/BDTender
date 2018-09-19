<!-- Left Sidebar -->
<div class="left main-sidebar">
  <div class="sidebar-inner leftscroll">
    <div id="sidebar-menu">
      <ul>
        <li class="submenu">
          <a class="{{ (Route::is('admin.dashboard') ? 'active' : '') }}" href="{{ route('admin.dashboard') }}" title="Dashboard"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
        </li>

        <li class="submenu">
          <a class="{{ (Route::is('admin.category.index') ? 'active' : '') }}" href="{{ route('admin.category.index') }}" title="Category"><i class="fa fa-fw fa-bars"></i><span> Category </span> </a>
        </li>

        <li class="submenu">
          <a class="" title="Manage Appointment"><i class="fa fa-fw fa-table"></i> <span> Appointment </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled">
            <li><a href="">Uncompleted</a></li>
            <li><a href="">Completed</a></li>
          </ul>
        </li>
      </ul>

      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<!-- End Sidebar -->
