<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
<!--        <form action="#" method="get" class="sidebar-form">-->
<!--            <div class="input-group">-->
<!--                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>-->
<!--              <span class="input-group-btn">-->
<!--                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>-->
<!--              </span>-->
<!--            </div>-->
<!--        </form>-->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>

            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Grouped</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('sitegraph') }}?site=Corporate">Corporate</a></li>
                    <li><a href="{{ url('sitegraph') }}?site=DAF">DAF</a></li>
                    <li><a href="{{ url('sitegraph') }}?site=Ga-Rankuwa">Ga-Rankuwa</a></li>
                    <li><a href="{{ url('sitegraph') }}?site=Neave">Neave</a></li>
                    <li><a href="{{ url('sitegraph') }}?site=Struandale">Struandale</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Per Site</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('levelgraph') }}?site=Corporate">Corporate</a></li>
                    <li><a href="{{ url('levelgraph') }}?site=DAF">DAF</a></li>
                    <li><a href="{{ url('levelgraph') }}?site=Ga-Rankuwa">Ga-Rankuwa</a></li>
                    <li><a href="{{ url('levelgraph') }}?site=Neave">Neave</a></li>
                    <li><a href="{{ url('levelgraph') }}?site=Struandale">Struandale</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Per Level</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('sitesgraph') }}?site=Shopfloor">Shopfloor</a></li>
                    <li><a href="{{ url('sitesgraph') }}?site=General_Staff">General Staff</a></li>
                    <li><a href="{{ url('sitesgraph') }}?site=Senior_Staff">Senior Staff</a></li>
                    <li><a href="{{ url('sitesgraph') }}?site=Middle_Management">Middle Management</a></li>
                    <li><a href="{{ url('sitesgraph') }}?site=Senior_Management">Senior Management</a></li>
                    <li><a href="{{ url('sitesgraph') }}?site=Junior_Management">Junior Management</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

<option></option>
<option></option>
<option></option>
