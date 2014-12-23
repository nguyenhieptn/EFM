    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">

                <img src="{{ URL::asset('img/avatar3.png') }}" class="img-circle" alt="User Image" />

            </div>
            <div class="pull-left info">
                <p>Hello, {{ Sentry::getUser()->first_name." ".Sentry::getUser()->last_name }}</p>

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
                <a href="{{ URL::to('dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li><a href="{{ URL::to('finance/income') }}"><i class="fa  fa-sign-in"></i>Income</a></li>
            <li><a href="{{ URL::to('finance/expense') }}"><i class="fa fa-sign-out"></i>Expense</a></li>
            <li><a href="{{ URL::to('finance/report') }}"><i class="fa  fa-keyboard-o"></i>Report</a></li>
            <li class="treeview" >
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Configuration</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ URL::to('finance/category/1') }}"><i class="fa fa-angle-double-right"></i>Category Expense</a></li>
                    <li><a href="{{ URL::to('finance/category/0') }}"><i class="fa fa-angle-double-right"></i>Category Income</a></li>

                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->