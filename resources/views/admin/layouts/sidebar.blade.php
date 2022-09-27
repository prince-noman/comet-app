<!-- Sidebar -->
{{-- <div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"> 
                    <span>Main</span>
                </li>
                <li> 
                    <a href="{{ route('admin.dashboard') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>

                @if (in_array('Slider', json_decode(Auth::guard('admin')->user()->role->permissions)))
                <li> 
                    <a href="{{ route('slider.index') }}"><i class="fe fe-vector"></i> <span>Slider</span></a>
                </li>
                @endif

                @if (in_array('Testimonials', json_decode(Auth::guard('admin')->user()->role->permissions)))
                <li> 
                    <a href="index.html"><i class="fe fe-star-o"></i> <span>Testimonials</span></a>
                </li>
                @endif

                @if (in_array('Our Client', json_decode(Auth::guard('admin')->user()->role->permissions))) 
                <li> 
                    <a href="index.html"><i class="fe fe-user"></i> <span>Our Client</span></a>
                </li>
                @endif

                @if (in_array('Portfolio', json_decode(Auth::guard('admin')->user()->role->permissions))) 
                <li class="submenu">
                    <a href="#"><i class="fe fe-layout"></i> <span>Portfolio</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoice-report.html">Portfolio</a></li>
                        <li><a href="invoice-report.html">Category</a></li>
                        <li><a href="invoice-report.html">Tags</a></li>
                    </ul>
                </li>
                @endif

                @if (in_array('Our Team', json_decode(Auth::guard('admin')->user()->role->permissions))) 
                <li> 
                    <a href="index.html"><i class="fe fe-users"></i> <span>Our Team</span></a>
                </li>
                @endif

                @if (in_array('Posts', json_decode(Auth::guard('admin')->user()->role->permissions))) 
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Posts</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoice-report.html">All Posts</a></li>
                        <li><a href="invoice-report.html">Category</a></li>
                        <li><a href="invoice-report.html">Tags</a></li>
                    </ul>
                </li>
                @endif

                @if (in_array('Users', json_decode(Auth::guard('admin')->user()->role->permissions))) 
                <li class="menu-title"> 
                    <span>Admin Options</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-user-plus"></i> <span> Admin Users</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('admin-user.index') }}">Users</a></li>
                        <li><a href="{{ route('role.index') }}">Role</a></li>
                        <li><a href="{{ route('permission.index') }}">Permission</a></li>
                    </ul>
                </li>
                @endif
                @if (in_array('Theme Options', json_decode(Auth::guard('admin')->user()->role->permissions)))
                <li> 
                    <a href="index.html"><i class="fe fe-pencil"></i> <span>Theme Options</span></a>
                </li>
                @endif
                @if (in_array('Settings', json_decode(Auth::guard('admin')->user()->role->permissions)))
                <li> 
                    <a href="index.html"><i class="fe fe-gear"></i> <span>Settings</span></a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div> --}}
<!-- /Sidebar -->


<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"> 
                    <span>Main</span>
                </li>
                <li> 
                    <a href="{{ route('admin.dashboard') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>

                @if (in_array('Slider', json_decode(Auth::guard('admin')->user()->role->permissions)))
                <li> 
                    <a href="{{ route('slider.index') }}"><i class="fe fe-vector"></i> <span>Slider</span></a>
                </li>
                @endif

                @if (in_array('Testimonials', json_decode(Auth::guard('admin')->user()->role->permissions)))
                <li> 
                    <a href="{{ route('testimonial.index') }}"><i class="fe fe-star-o"></i> <span>Testimonials</span></a>
                </li>
                @endif

                @if (in_array('Our Client', json_decode(Auth::guard('admin')->user()->role->permissions))) 
                <li> 
                    <a href="index.html"><i class="fe fe-user"></i> <span>Our Client</span></a>
                </li>
                @endif

                @if (in_array('Portfolio', json_decode(Auth::guard('admin')->user()->role->permissions))) 
                <li class="submenu">
                    <a href="#"><i class="fe fe-layout"></i> <span>Portfolio</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoice-report.html">Portfolio</a></li>
                        <li><a href="invoice-report.html">Category</a></li>
                        <li><a href="invoice-report.html">Tags</a></li>
                    </ul>
                </li>
                @endif

                @if (in_array('Our Team', json_decode(Auth::guard('admin')->user()->role->permissions))) 
                <li> 
                    <a href="index.html"><i class="fe fe-users"></i> <span>Our Team</span></a>
                </li>
                @endif

                @if (in_array('Posts', json_decode(Auth::guard('admin')->user()->role->permissions))) 
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Posts</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoice-report.html">All Posts</a></li>
                        <li><a href="invoice-report.html">Category</a></li>
                        <li><a href="invoice-report.html">Tags</a></li>
                    </ul>
                </li>
                @endif

                @if (in_array('Users', json_decode(Auth::guard('admin')->user()->role->permissions))) 
                <li class="menu-title"> 
                    <span>Admin Options</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-user-plus"></i> <span> Admin Users</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('admin-user.index') }}">Users</a></li>
                        <li><a href="{{ route('role.index') }}">Role</a></li>
                        <li><a href="{{ route('permission.index') }}">Permission</a></li>
                    </ul>
                </li>
                @endif
                @if (in_array('Theme Options', json_decode(Auth::guard('admin')->user()->role->permissions)))
                <li> 
                    <a href="index.html"><i class="fe fe-pencil"></i> <span>Theme Options</span></a>
                </li>
                @endif
                @if (in_array('Settings', json_decode(Auth::guard('admin')->user()->role->permissions)))
                <li> 
                    <a href="index.html"><i class="fe fe-gear"></i> <span>Settings</span></a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->