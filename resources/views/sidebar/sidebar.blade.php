<!-- START PAGE SIDEBAR -->
<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="#">{{ Session::get('resource')[0]['username'] }}</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="assets/images/users/avatar.png" alt="John Doe"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="assets/images/users/avatar.png" alt="John Doe"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">{{ Session::get('resource')[0]['username'] }}</div>
                    <div class="profile-data-title">{{  Session::get('resource')[0]['roles']}}</div>
                </div>
                <div class="profile-controls">
                    <a href="#" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <a href="#" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                </div>
            </div>
        </li>
        @if (Session::get('resource')[0]['roles'] == "PARKINGADMIN")
        <li class="xn-title">Navigation</li>
        <li class="active">
            <a href="{{ route('dashboard') }}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
        </li>

            <li class="xn-openable">
                <a href="#"><span class="fa fa-road"></span> <span class="xn-text">On Street</span></a>
                <ul>
                    <li><a href="{{ route('compliant') }}"><span class="fa fa-check-circle"></span> Compliant</a></li>
                    <li><a href="{{ route('noncompliant')}}"><span class="fa fa-unlock-alt"></span> Non Complient</a></li>
                    <li><a href="{{ route('clamped') }}"><span class="fa fa-lock"></span>Clamped</a></li>
                    <li><a href="{{ route('tounclamp') }}"><span class="fa fa-users"></span>To unclamp</a></li>
                    <li><a href="{{ route('unclamped') }}"><span class="fa fa-unlock"></span>Unclamped</a></li>
                    <!--   <li class="xn-openable">
                           <a href="#"><span class="fa fa-clock-o"></span> Timeline</a>
                           <ul>
                               <li><a href="pages-timeline.html"><span class="fa fa-align-center"></span> Default</a></li>
                               <li><a href="pages-timeline-simple.html"><span class="fa fa-align-justify"></span> Full Width</a></li>
                           </ul>
                       </li>-->
                    <!-- <li class="xn-openable">
                         <a href="#"><span class="fa fa-envelope"></span> Mailbox</a>
                         <ul>
                             <li><a href="pages-mailbox-inbox.html"><span class="fa fa-inbox"></span> Inbox</a></li>
                             <li><a href="pages-mailbox-message.html"><span class="fa fa-file-text"></span> Message</a></li>
                             <li><a href="pages-mailbox-compose.html"><span class="fa fa-pencil"></span> Compose</a></li>
                         </ul>
                     </li>
                     <li><a href="pages-messages.html"><span class="fa fa-comments"></span> Messages</a></li>
                     <li><a href="pages-calendar.html"><span class="fa fa-calendar"></span> Calendar</a></li>
                     <li><a href="pages-tasks.html"><span class="fa fa-edit"></span> Tasks</a></li>
                     <li><a href="pages-content-table.html"><span class="fa fa-columns"></span> Content Table</a></li>
                     <li><a href="pages-faq.html"><span class="fa fa-question-circle"></span> FAQ</a></li>
                     <li><a href="pages-search.html"><span class="fa fa-search"></span> Search</a></li>
                     <li class="xn-openable">
                         <a href="#"><span class="fa fa-file"></span> Blog</a>

                         <ul>
                             <li><a href="pages-blog-list.html"><span class="fa fa-copy"></span> List of Posts</a></li>
                             <li><a href="pages-blog-post.html"><span class="fa fa-file-o"></span>Single Post</a></li>
                         </ul>
                     </li>
                     <li class="xn-openable">
                         <a href="#"><span class="fa fa-sign-in"></span> Login</a>
                         <ul>
                             <li><a href="pages-login.html">App Login</a></li>
                             <li><a href="pages-login-website.html">Website Login</a></li>
                             <li><a href="pages-login-website-light.html"> Website Login Light</a></li>
                         </ul>
                     </li>
                     <li class="xn-openable">
                         <a href="#"><span class="fa fa-warning"></span> Error Pages</a>
                         <ul>
                             <li><a href="pages-error-404.html">Error 404 Sample 1</a></li>
                             <li><a href="pages-error-404-2.html">Error 404 Sample 2</a></li>
                             <li><a href="pages-error-500.html"> Error 500</a></li>
                         </ul>
                     </li>-->
                </ul>
            </li>
            <li class="xn-openable">
                <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Off-Street</span></a>
                <ul>

                    <li><a href="{{ route('offstreet') }}"><span class="fa fa-lock"></span>Off-Street</a></li>
                    <li><a href="#" data-container="body" data-toggle="popover" data-placement="right" data-content="Coming soon"><span class="fa fa-lock"></span>Country Bus</a></li>
                    <li><a href="#" data-container="body" data-toggle="popover" data-placement="right" data-content="Coming soon"><span class="fa fa-lock"></span>High Court</a></li>
                    <li><a href="#" data-container="body" data-toggle="popover" data-placement="right" data-content="Coming soon"><span class="fa fa-lock"></span>Sunken</a></li>
                </ul>
            </li>
            <li class="xn-title">Seasonal (Summary and Detailed) </li>
            <li class="xn-openable">
                <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">Seasonal</span></a>
                <ul>
                    <li><a href="{{ route('seasonal') }}"><span class="fa fa-heart"></span> Summary</a></li>
                    <li><a href="#" data-container="body" data-toggle="popover" data-placement="right" data-content="Coming soon"><span class="fa fa-cogs"></span> Detailed</a></li>
                </ul>
            </li>
            <li class="xn-openable">
                <a href="#"><span class="fa fa-pencil"></span> <span class="xn-text">Queries</span></a>
                <ul>
                    <!-- <li>
                         <a href="form-layouts-two-column.html"><span class="fa fa-tasks"></span> Form Layouts</a>
                         <div class="informer informer-danger">New</div>
                         <ul>
                             <li><a href="form-layouts-one-column.html"><span class="fa fa-align-justify"></span> One Column</a></li>
                             <li><a href="form-layouts-two-column.html"><span class="fa fa-th-large"></span> Two Column</a></li>
                             <li><a href="form-layouts-tabbed.html"><span class="fa fa-table"></span> Tabbed</a></li>
                             <li><a href="form-layouts-separated.html"><span class="fa fa-th-list"></span> Separated Rows</a></li>
                         </ul>
                     </li>-->
                    <li><a href="{{ route('queries') }}"><span class="fa fa-file-text-o"></span> All Queries</a></li>

                </ul>
            </li>
            <li class="xn-openable">
                <a href="#"><span class="fa fa-table"></span> <span class="xn-text">On-Street Summary</span></a>
                <ul>
                    <li><a href="{{ route('collections') }}"><span class="fa fa-align-justify"></span> By Collection</a></li>
                    <li><a href="{{ route('byagent') }}"><span class="fa fa-sort-alpha-desc"></span>By Attendants</a></li>

                   <!-- <li><a href="#" data-container="body" data-toggle="popover" data-placement="right" data-content="Coming Soon"><span class="fa fa-sort-alpha-desc"></span>Queries per Attendant</a></li>-->
                    <!--<li><a href="#" data-container="body" data-toggle="popover" data-placement="right" data-content="Coming Soon"><span class="fa fa-sort-alpha-desc"></span>By Vehicle Category</a></li>-->
                </ul>
            </li>
            <!--<li class="xn-openable">
                <a href="#"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">History</span></a>
                <ul>
                    <li><a href="{{ route('logs') }}"><span class="xn-text">Customer Hit Map</span></a></li>
                </ul>
            </li>-->
            <li>
                <a href="{{ route('waiver') }}"><span class="fa fa-map-marker"></span> <span class="xn-text">Waiver</span></a>
            </li>
            @elseif (Session::get('resource')[0]['roles'] == "UBPADMIN")

            <li class="xn-title">Navigation</li>
            <li class="active">
                <a href="{{ route('permits') }}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
            </li>
            <li class="xn-openable">
                <a href="#"><span class="fa fa-road"></span> <span class="xn-text">Applications</span></a>
                <ul>
                    <li><a href="{{ route('newapplications') }}"><span class="fa fa-check-circle"></span> New</a></li>
                    <li><a href="{{ route('renewals')}}"><span class="fa fa-unlock-alt"></span>Renewals</a></li>
                </ul>
            </li>
            <li class="xn-openable">
                <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Transactions</span></a>
                <ul>
                    <li><a href="{{ route('invoices') }}"><span class="fa fa-lock"></span>Invoives</a></li>
                    <li><a href="{{ route('receipts') }}"><span class="fa fa-lock"></span>Receipts</a></li>
                </ul>
            </li>
            <li class="xn-openable">
                <a href="#"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Business Summary</span></a>
                <ul>
                    <li><a href="{{ route('summaries') }}"><span class="xn-text">Summary</span></a></li>
                    <li><a href="{{ route('details') }}"><span class="xn-text">Detailed</span></a></li>
                </ul>
            </li>
            <li class="xn-openable">
                <a href="#"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Actionable Tab</span></a>
                <ul>
                    <li><a href="{{ route('approve') }}"><span class="xn-text">Inspected</span></a></li>
                </ul>
            </li>
        @endif


    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->