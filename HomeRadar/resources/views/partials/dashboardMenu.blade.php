<!-- wrapper  -->
<div id="wrapper">
    <!-- dashbard-menu-wrap -->
    <div class="dashbard-menu-overlay"></div>
    <div class="dashbard-menu-wrap">
        <div class="dashbard-menu-close"><i class="fal fa-times"></i></div>
        <div class="dashbard-menu-container">
            <!-- user-profile-menu -->
            <div class="user-profile-menu">
                <h3>Main</h3>
                <ul class="no-list-style">
                    <li><a href="{{ url('dashboard') }}"><i class="fal fa-chart-line"></i> Dashboard</a></li>
                    <li><a href="{{ url('dashboard-myprofile') }}"><i class="fal fa-user-edit"></i> Edit profile</a></li>
                    <li><a href="{{ url('dashboard-messages') }}"><i class="fal fa-envelope"></i> Messages <span>3</span></a></li>
                    <li><a href="{{ url('dashboard-agents') }}"><i class="fal fa-users"></i> Agents List</a></li>
                    <li>
                        <a href="#" class="submenu-link"><i class="fal fa-plus"></i> Submenu</a>
                        <ul class="no-list-style">
                            <li><a href="#"><i class="fal fa-th-list"></i> Submenu 2</a></li>
                            <li><a href="#"><i class="fal fa-calendar-check"></i> Submenu 2</a></li>
                            <li><a href="#"><i class="fal fa-comments-alt"></i> Submenu 2</a></li>
                            <li><a href="#"><i class="fal fa-file-plus"></i> Submenu 2</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- user-profile-menu end -->

            <!-- user-profile-menu -->
            <div class="user-profile-menu">
                <h3>Listings</h3>
                <ul class="no-list-style">
                    <li><a href="{{ url('dashboard-listing-table') }}"><i class="fal fa-th-list"></i> My listings</a></li>
                    <li><a href="{{ url('dashboard-bookings') }}"><i class="fal fa-calendar-check"></i> Bookings <span>3</span></a></li>
                    <li><a href="{{ url('dashboard-review') }}" class="user-profile-act"><i class="fal fa-comments-alt"></i> Reviews <span>2</span></a></li>
                    <li><a href="{{ url('dashboard-add-listing') }}"><i class="fal fa-file-plus"></i> Add New</a></li>
                </ul>
            </div>
            <!-- user-profile-menu end -->
        </div>
        <div class="dashbard-menu-footer"> &#169; Homeradar 2022. All rights reserved.</div>
    </div>
    <!-- dashbard-menu-wrap end -->
</div>
<!-- wrapper end -->
