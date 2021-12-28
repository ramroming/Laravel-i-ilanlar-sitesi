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
                            class="hide-menu">Home</span></a></li>

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

                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                            href="{{route('admin_comment')}}" aria-expanded="false">
                        <i class="mdi mdi-comment-text-outline"></i>
                        <span class="hide-menu">Comments</span></a></li>

                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                            href="{{route('admin_faq')}}" aria-expanded="false">
                        <i class="fa fa-question-circle"></i>
                        <span class="hide-menu">FAQ</span></a></li>

                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                            href="{{route('admin_users')}}" aria-expanded="false">
                        <i class="fa fa-user-circle"></i>
                        <span class="hide-menu">Users</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                             href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                            class="hide-menu">Applications </span></a>

                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('admin_applications')}}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu"> All Applications
                                        </span></a></li>

                        <li class="sidebar-item"><a href="{{route('admin_applications_list',['status'=>'in-review'])}}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> in-review Applications
                                        </span></a></li>

                        <li class="sidebar-item"><a href="{{route('admin_applications_list',['status'=>'Accepted'])}}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> Accepted Applications
                                        </span></a></li>

                        <li class="sidebar-item"><a href="{{route('admin_applications_list',['status'=>'Rejected'])}}" class="sidebar-link"><i
                                    class="mdi mdi-note-plus"></i><span class="hide-menu"> Rejected Applications
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
