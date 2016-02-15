<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">

        <div class="pull-left info">
            {if $isAdmin}
                <p>Hello, {Registry::getCurrentUser()->first_name}</p>
            {/if}
        </div>
    </div>

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li>
            <a href="{Url::get('SystemRoute','Main', 'Index')}">
                <i class="fa fa-th"></i> <span>Admin Panel</span>
            </a>
        </li>
        {if $isAdmin}
            <li>
                <a href="{Url::get('SystemRoute','Main', 'Index')}">
                    <i class="fa fa-th"></i> <span>Users</span>
                </a>
            </li>
            <li>
                <a href="{Url::get('SystemRoute','Payments', 'Index')}">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Payments</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>

            <li>
                <a href="{Url::get('SystemRoute','Pages', 'Index')}">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Pages</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
        {elseif $current_user->iduser }
            <li>
                <a href="{Url::get('SystemRoute','Boot', 'Index/1')}">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Personal</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
            <li>
                <a href="{Url::get('SystemRoute','Boot', 'Index/2')}">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Statistics</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
            <li>
                <a href="{Url::get('SystemRoute','Boot', 'Index/3')}">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Online Help</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
            <li>
                <a href="{Url::get('SystemRoute','Boot', 'Index/4')}">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Bonus</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
            <li>
                <a href="{Url::get('SystemRoute','Boot', 'Index/5')}">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Account</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>

            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        {/if}
    </ul>
</section>
<!-- /.sidebar -->