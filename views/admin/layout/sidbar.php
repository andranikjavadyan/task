<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Tasks
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/task/admin/task/index" class="nav-link">
                                <p>All Tasks</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/task/admin/task/create" class="nav-link">
                                <p>Create</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if(!isset($_SESSION['user'])):?>
                <li class="nav-item has-treeview">
                    <a href="/task/admin/login" class="nav-link">
                        <p>
                            Login
                        </p>
                    </a>
                </li>
                <?php else:?>
                <li class="nav-item has-treeview">
                    <a href="/task/admin/logout" class="nav-link">
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
                <?php endif;?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>