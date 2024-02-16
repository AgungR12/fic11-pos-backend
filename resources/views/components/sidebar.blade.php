<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">POS Apps</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">POS</a>
        </div>
        <ul class="sidebar-menu">
            @if (Auth::user()->roles == 'admin')
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown @if(request()->route()->uri == 'home') active @endif">
                <a href="{{ route('home') }}"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                {{-- <ul class="dropdown-menu">
                    <li class='active'>
                        <a class="nav-link"
                            href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
                    </li>
                    <li class="active">
                        <a class="nav-link"
                            href="{{ url('dashboard-ecommerce-dashboard') }}">Ecommerce Dashboard</a>
                    </li>
                </ul> --}}
            </li>
            <li class="menu-header">Information</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa-solid fa-circle-info"></i><span>Information</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('superiority.index') }}">Superiority</a></li>
                    <li><a class="nav-link" href="{{ route('superiorityEvent.index') }}">Superiority Event</a></li>
                </ul>
            </li>
            <li class="menu-header">Pekerjaan</li>
            <li class="@if(
                        request()->route()->uri == 'work'||
                        request()->route()->uri == 'work.create'||
                        request()->route()->uri == 'work.edit') active @endif">
                <a class="nav-link" href="{{ route('work.index') }}"><i class="fa-solid fa-briefcase"></i>
                    </i> <span>Work</span>
                </a>
            </li>
            <li class="menu-header">Kelola</li>
            <li class="@if(
                        request()->route()->uri == 'gallery'||
                        request()->route()->uri == 'gallery.create'||
                        request()->route()->uri == 'gallery.edit') active @endif">
                <a class="nav-link" href="{{ route('gallery.index') }}"><i class="fa-solid fa-images"></i>
                    </i> <span>Gallery</span>
                </a>
            </li>
            <li class="@if(
                        request()->route()->uri == 'pricing'||
                        request()->route()->uri == 'pricing.create'||
                        request()->route()->uri == 'pricing.edit') active @endif">
                <a class="nav-link" href="{{ route('pricing.index') }}"><i class="fas fa-sack-dollar">
                    </i> <span>Pricing</span>
                </a>
            </li>
            <li class="@if(
                        request()->route()->uri == 'social'||
                        request()->route()->uri == 'social.create'||
                        request()->route()->uri == 'social.edit') active @endif">
                <a class="nav-link" href="{{ route('social.index') }}"><i class="fa-brands fa-google"></i>
                    </i> <span>Social Media</span>
                </a>
            </li>
            <li class="@if(
                        request()->route()->uri == 'description'||
                        request()->route()->uri == 'description.create'||
                        request()->route()->uri == 'description.edit') active @endif">
                <a class="nav-link" href="{{ route('description.index') }}"><i class="fas fa-book-open-reader">
                    </i> <span>Description</span>
                </a>
            </li>
            <li class="@if(
                        request()->route()->uri == 'working'||
                        request()->route()->uri == 'working.create'||
                        request()->route()->uri == 'working.edit') active @endif">
                <a class="nav-link" href="{{ route('working.index') }}"><i class="fas fa-clock">
                    </i> <span>Working Hours</span>
                </a>
            </li>
            <li class="@if(
                        request()->route()->uri == 'superiority'||
                        request()->route()->uri == 'superiority.create'||
                        request()->route()->uri == 'superiority.edit') active @endif">
                <a class="nav-link" href="{{ route('superiority.index') }}"><i class="fa-solid fa-folder-open">
                    </i> <span>Superiority</span>
                </a>
            </li>
            <li class="menu-header">Profile</li>
            <li class="@if(request()->route()->uri == 'profile') active @endif">
                <a href="{{ route('profile.index') }}" class="nav-link">
                    <i class="fas fa-store"></i><span>Profile</span>
                </a>
            </li>
            <li class="@if(request()->route()->uri == 'registrasi') active @endif">
                <a href="{{ route('register') }}" class="nav-link">
                    <i class="fa-solid fa-arrow-up-right-from-square text-primary"></i><span class="text-primary">Registrasi</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form action="{{ route('logout') }}" method="post" id="logout-form" clas="d-none">
                    @csrf
                </form>
            </li>
            @elseif(Auth::user()->roles == 'staff')
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='active'>
                        <a class="nav-link"
                            href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
                    </li>
                    <li class="active">
                        <a class="nav-link"
                            href="{{ url('dashboard-ecommerce-dashboard') }}">Ecommerce Dashboard</a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Products</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-box-open"></i><span>Products</span></a>
                <ul class="dropdown-menu">
                    <li class="@if(
                        request()->route()->uri == 'products'||
                        request()->route()->uri == 'products.create'||
                        request()->route()->uri == 'products.edit') active @endif">
                        <a class="nav-link" href="{{ route('products.index') }}">All Products</a>
                    </li>
                    <li class="@if(
                        request()->route()->uri == 'food') active @endif">
                        <a class="nav-link" href="{{ route('food') }}">Foods</a>
                    </li>
                    <li class="@if(
                        request()->route()->uri == 'drink') active @endif">
                        <a class="nav-link" href="{{ route('drink') }}">Drink</a>
                    </li>
                    <li class="@if(
                        request()->route()->uri == 'snack') active @endif">
                        <a class="nav-link" href="{{ route('snack') }}">Snack</a>
                    </li>
                    <li class="@if(
                        request()->route()->uri == 'special'||
                        request()->route()->uri == 'special.create'||
                        request()->route()->uri == 'special.edit') active @endif">
                        <a class="nav-link" href="{{ route('special.index') }}">Package</a>
            </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-cart-arrow-down"></i><span>Orders</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('order.index') }}">All Order</a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Customer</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-people-group"></i><span>Customer</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('event.index') }}">Events</a></li>
                    <li><a class="nav-link" href="{{ route('reservasi.index') }}">Reservasi</a></li>
                    <li class="@if(
                        request()->route()->uri == 'comments'||
                        request()->route()->uri == 'comments.create'||
                        request()->route()->uri == 'comments.edit') active @endif">
                        <a class="nav-link" href="{{ route('comments.index') }}">
                            <span>Testimonials</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Users</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Users</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('user.index') }}">Users</a></li>
                    <li class="@if(
                        request()->route()->uri == 'employee'||
                        request()->route()->uri == 'employee.create'||
                        request()->route()->uri == 'employee.edit') active @endif"><a class="nav-link" href="{{ route('employee.index') }}">Employee</a></li>
                </ul>
            </li>
            <li class="menu-header">Profile</li>
            <li class="@if(request()->route()->uri == 'profile') active @endif">
                <a href="{{ route('profile.index') }}" class="nav-link">
                    <i class="fas fa-store"></i><span>Profile</span>
                </a>
            </li>
            <li class="@if(request()->route()->uri == 'registrasi') active @endif">
                <a href="{{ route('register') }}" class="nav-link">
                    <i class="fa-solid fa-arrow-up-right-from-square text-primary"></i><span class="text-primary">Registrasi</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form action="{{ route('logout') }}" method="post" id="logout-form" clas="d-none">
                    @csrf
                </form>
            </li>
            @endif
        </ul>

        {{-- <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs"
                class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div> --}}
    </aside>
</div>
