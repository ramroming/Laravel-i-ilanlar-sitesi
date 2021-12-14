<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                            href="{{route('adminHome')}}" aria-expanded="false"><i
                            class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a></li>

                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                            href="{{route('adminCategory')}}" aria-expanded="false"><i
                            class="mdi mdi-chart-bubble"></i><span
                            class="hide-menu">Categories</span></a></li>

                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                            href="{{route('admin_jobs')}}" aria-expanded="false"><i
                            class="mdi mdi-briefcase"></i><span
                            class="hide-menu">Jobs</span></a></li>

                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                            href="{{route('admin_settings')}}" aria-expanded="false"><i
                            class="mdi mdi-settings"></i><span
                            class="hide-menu">Settings</span></a></li>

                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                            href="{{route('admin_messages')}}" aria-expanded="false"><i
                            class="mdi mdi-message"></i><span
                            class="hide-menu">Contact messages</span></a></li>

                <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark"
                                            href="javascript:void(0)" aria-expanded="false"><i
                            class="mdi mdi-account-key"></i>
                        <span class="hide-menu">Authentication </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="authentication-login.html" class="sidebar-link"><i
                                    class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Login </span></a>
                        </li>
                        <li class="sidebar-item"><a href="authentication-register.html" class="sidebar-link"><i
                                    class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Register
                                        </span></a></li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
