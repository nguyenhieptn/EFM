    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="img/avatar3.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Hello,{{ Auth::user()->name}}</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="active">
                <a href="{{ URL::to('admin/dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ URL::to('admin/income')}}">
                    <i class="fa fa-sign-out"></i> <span>Expense</span>
                </a>
            </li>
            <li>
                <a href="{{ URL::to('admin/income')}}">
                    <i class="fa fa-sign-in"></i> <span>Income</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Report</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/charts/morris.html"><i class="fa fa-angle-double-right"></i> Month</a></li>
                    <li><a href="pages/charts/flot.html"><i class="fa fa-angle-double-right"></i> Year</a></li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-angle-double-right"></i>Week</a></li>
                </ul>
            </li>

            <li class="treeview" >
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Category</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ URL::to('admin/category/1') }}"><i class="fa fa-angle-double-right"></i> Expense</a></li>
                    <li><a href="{{ URL::to('admin/category/0') }}"><i class="fa fa-angle-double-right"></i> Income</a></li>

                </ul>
            </li>
            <li>
                <a href="{{ URL::to('admin/account') }}">
                    <i class="fa fa-sign-out"></i> <span>Accounts</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->