<div id="sidebar-nav" class="sidebar lion-grad">
	<div class="pri-grad absolute-on-nav op-06"></div>
    <nav class="">
        <ul class="nav" id="sidebar-nav-menu">
            <!-- <li class="menu-group">MAIN NAVIGATION</li>
            <hr> -->
            <li class="panel">
                <a href="{{ route('dashboard') }}" class="active">
                    <i class="ti-home"></i> <span class="title">Dashboard</span></a>

            </li>
          
            <li class="panel">
                <a href="#subLayouts" data-toggle="collapse" data-parent="#sidebar-nav-menu" class="collapsed">
                    <i class ="ti-list-ol"></i>
                    <span class="title">Parking  Query by Status</span>
                    <i class="icon-submenu ti-angle-left"></i>
                </a>
                <div id="subLayouts" class="">
                    <ul class="submenu">
                        <li><a href="{{ route('paid.index') }}"> <i class="fa fa-money"></i>  Paid</a></li>
                        <li><a href="{{ route('unpaid.index') }}"> <i class="fa fa-unlock-alt"></i> To Clamp</a></li>
                        <li><a href="{{ route('clamped.index') }}"> <i class="fa fa-lock"></i> Clamped</a></li>
                        <li><a href="{{ route('dueunclamped.index') }}"> <i class="ti-arrow-right"></i> To Unclamp</a></li>
                        <li><a href="{{ route('unclamped.index') }}"> <i class="fa fa-unlock"></i> Unclamped</a></li>
                        <li><a href="{{ route('seasonal') }}"><i class="ti-angle-right"></i>Seasonal</a></li>
                        <li><a href="{{ route('queries') }}"><i class="ti-reload"></i>Queries</a></li>
                        <!-- <li><a href="{{ route('towed.index') }}"> </i><i class="ti-arrow-right"></i>  Towed</a></li>
                        <li><a href="{{ route('untowed.index') }}"></i> <i class="ti-arrow-right"></i> Untowed</a></li> -->
                    </ul>
                </div>
            </li>

            <li><a href="{{ route('dcollections') }}"><i class="ti-reload"></i>Detailed Queries</a></li>
            {{--<li><a href="{{ route('queries') }}"><i class="ti-reload"></i>Queries</a></li>--}}

            <li class="panel">
                <a href="#subPages" data-toggle="collapse" data-parent="#sidebar-nav-menu" class="collapsed">
                    <i class="ti-desktop"></i> <span class="title">Parking Summaries</span> <i class="icon-submenu ti-angle-left"></i></a>
                <div id="subPages" class="collapse">
                    <ul class="submenu">
                        <li><a href="{{ route('collections') }}"><i class="ti-money"></i>By Collection</a></li>
                        <li><a href="{{ route('admattendants') }}"><i class="ti-user"></i>By Attendant</a></li>

                    </ul>
                </div>
            </li>

			  {{--<li class="panel">--}}
                {{--<a href="{{ route('all.index') }}"><i class="ti-thumb-up"></i>--}}
                    {{--<span class="title"> Parking Query Statuses  </span></a>--}}
                {{--<div id="tables" class=" ">--}}

                {{--</div>--}}
            {{--</li>--}}
			
            <li class="panel">
                <a href="{{ route('history') }}"><i class="ti-thumb-up"></i>
                    <span class="title"> Customer Daily History</span></a>
                <div id="tables" class=" ">

                {{--</div>--}}
            {{--</li>--}}
            <li class="panel">
                <a href="{{ route('waiver') }}"><i class="ti-car"></i>
                    <span class="title">Parking Waivers </span></a>
                <div id="tables" class=" ">

                </div>
            </li>

        </ul>
    </nav>
</div>
