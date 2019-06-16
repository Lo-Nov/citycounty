
<nav class="navbar navbar-default navbar-fixed-top pri-grad">
    <div class="container-fluid">
        <div id="tour-fullwidth" class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="ti-close"></i></button>
            <a href="#">
                <h4 style="color: #ffffff;">NCC PARKING</h4>
            </a>
        </div>
        <!-- <form class="navbar-form navbar-left search-form">
            <input type="text" value="" class="form-control" placeholder="Search dashboard...">
            <button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
        </form> -->
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                @can('isAdmin')
                <li>
                    <a href="#" class="btn-toggle-rightsidebar">
                        <i class="ti-layout-sidebar-right"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                        <i class="ti-bell"></i>
                        <span class="badge bg-danger">5</span>
                    </a>
                    <ul class="dropdown-menu notifications">
                        <li>You have 5 new notifications</li>
                        <li>
                            <a href="#" class="notification-item">
                                <i class="fa fa-hdd-o custom-bg-red"></i>
                                <p>
                                    <span class="text">System space is almost full</span>
                                    <span class="timestamp">11 minutes ago</span>
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="notification-item">
                                <i class="fa fa-tasks custom-bg-yellow"></i>
                                <p>
                                    <span class="text">You have 9 unfinished tasks</span>
                                    <span class="timestamp">20 minutes ago</span>
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="notification-item">
                                <i class="fa fa-book custom-bg-green2"></i>
                                <p>
                                    <span class="text">Monthly report is available</span>
                                    <span class="timestamp">1 hour ago</span>
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="notification-item">
                                <i class="fa fa-bullhorn custom-bg-purple"></i>
                                <p>
                                    <span class="text">Weekly meeting in 1 hour</span>
                                    <span class="timestamp">2 hours ago</span>
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="notification-item">
                                <i class="fa fa-check custom-bg-green"></i>
                                <p>
                                    <span class="text">Your request has been approved</span>
                                    <span class="timestamp">3 days ago</span>
                                </p>
                            </a>
                        </li>
                        <li><a href="#" class="more">See all notifications</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" id="tour-help" class="dropdown-toggle" data-toggle="dropdown"><i class="ti-help"></i> <span class="hide">Help</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="ti-direction"></i> Basic Use</a></li>
                        <li><a href="#"><i class="ti-server"></i> Working With Data</a></li>
                        <li><a href="#"><i class="ti-lock"></i> Security</a></li>
                        <li><a href="#"><i class="ti-light-bulb"></i> Troubleshooting</a></li>
                    </ul>
                </li>
                @endcan
                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="assets/img/user.png" alt="Avatar">
                        <span>Welcome: {{ Session::get('resource')[0]['username'] }}</span>
                    </a>
                    <ul class="dropdown-menu logged-user-menu">
                        @can('isAdmin')
                        <li><a href="#"><i class="ti-user"></i> <span>My Profile</span></a></li>
                        <li><a href="appviews-inbox.html"><i class="ti-email"></i> <span>Message</span></a></li>
                        <li><a href="#"><i class="ti-settings"></i> <span>Settings</span></a></li>
                        @endcan
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                <i class="ti-power-off"></i> <span>Logout</span>                             </a>
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li> -->
                <li class="dropdown">
                    <a href="#" id="tour-help" class="dropdown-toggle" data-toggle="dropdown">
      									<span>You are Logged in as: {{ Session::get('resource')[0]['username'] }}</span>
      									<span class="hide">Help</span></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <span>
                      <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                          <i class="ti-power-off"></i> <span>Logout</span>                             </a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                </span>
                </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
