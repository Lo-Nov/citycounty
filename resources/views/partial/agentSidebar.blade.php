<div id="sidebar-nav" class="sidebar lion-grad">
	<div class="pri-grad absolute-on-nav op-06"></div>
    <nav>
        <ul class="nav" id="sidebar-nav-menu">
            <li class="panel">
                <a href="#dashboards" data-toggle="collapse" data-parent="#sidebar-nav-menu" class="active">
                    <i class="ti-dashboard"></i> <span class="title">Dashboard</span> <i class="icon-submenu
                    ti-angle-left"></i></a>
                <div id="dashboards" class="collapse in">
                    <ul class="submenu">
                        <li><a href="{{ route('agent') }}" class="active"> <i
                                        class="ti-angle-right"></i>Home</a></li>
                    </ul>
                </div>
            </li>
            <li class="panel">
                <a href="#subLayouts" data-toggle="collapse" data-parent="#sidebar-nav-menu" class="collapsed"><i class="ti-car"></i>
                    <span class="title">Parking Report</span> <i class="icon-submenu
                    ti-angle-left"></i></a>
                <div id="subLayouts" class="collapse ">
                    <ul class="submenu">
                        <li><a href="{{ route('queriedAgent.index') }}"><i class="ti-angle-right"></i>Queries </a></li>
                        <li><a href="{{ route('paidAgent.index') }}"><i class="ti-angle-right"></i>Paid</a></li>
                        <li><a href="{{ route('unpaidAgent.index') }}"><i class="ti-angle-right"></i>To clamp</a></li>
                        <li><a href="{{ route('clampedAgent.index') }}"><i class="ti-angle-right"></i>Clamped</a></li>
                        <li><a href="{{ route('unclampAgent.index') }}"><i class="ti-angle-right"></i>To Unclamped</a></li>
                        <li><a href="{{ route('unclampedAgent.index') }}"><i class="ti-angle-right"></i>Unclamped</a></li>
                        <li><a href="{{ route('seasonalAgent') }}"><i class="ti-angle-right"></i>Seasonal</a></li>
                        <li><a href="{{ route('towedAgent.index') }}"><i class="ti-angle-right"></i>Towed</a></li>
                        <li><a href="{{ route('untowedAgent.index') }}"><i class="ti-angle-right"></i>Untowed</a></li>
                    </ul>
                </div>
            </li>
            {{--<li class="panel">--}}
                {{--<a href="#tables" data-toggle="collapse" data-parent="#sidebar-nav-menu" class="collapsed"><i class="ti-calendar"></i>--}}
                    {{--<span class="title">Seasonal Report</span> <i class="icon-submenu--}}
                    {{--ti-angle-left"></i></a>--}}
                {{--<div id="tables" class="collapse ">--}}
                    {{--<ul class="submenu">--}}
                        {{--<li><a href="{{ route('seasonalAgent') }}"><i class="ti-angle-right"></i>All Vehicles</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</li>--}}
            {{--<li class="panel">--}}
                {{--<a href="#forms" data-toggle="collapse" data-parent="#sidebar-nav-menu" class="collapsed"><i class="ti-lock"></i>--}}
                    {{--<span class="title">Tow Report</span> <i class="icon-submenu--}}
                    {{--ti-angle-left"></i></a>--}}
                {{--<div id="forms" class="collapse ">--}}
                    {{--<ul class="submenu">--}}
                        {{--<li><a href="{{ route('towedAgent.index') }}"><i class="ti-angle-right"></i>Towed</a></li>--}}
                        {{--<li><a href="{{ route('untowedAgent.index') }}"><i class="ti-angle-right"></i>Untowed</a></li>--}}

                    {{--</ul>--}}
                {{--</div>--}}
            {{--</li>--}}
            <li class="panel">
                <a href="#subPages" data-toggle="collapse" data-parent="#sidebar-nav-menu" class="collapsed">
                    <i class="ti-user"></i> <span class="title">Attendant Report</span> <i class="icon-submenu ti-angle-left"></i></a>
                <div id="subPages" class="collapse ">
                    <ul class="submenu">
                        <li><a href="{{ route('attendants') }}"><i class="ti-bar-chart-alt"></i>Reports</a></li>
                    </ul>
                </div>
            </li>
        </ul>

        {{--<button type="button" class="btn-toggle-minified" title="Toggle Minified Menu"><i class="ti-arrows-horizontal"></i></button>--}}
    </nav>
</div>
