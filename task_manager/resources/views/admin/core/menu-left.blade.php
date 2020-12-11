<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-md-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{asset('assets/brand/coreui-pro.svg#full')}}"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{asset('assets/brand/coreui-pro.svg#signet')}}"></use>
        </svg>
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('admin.dashboard')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer')}}"></use>
                </svg>@lang('message.dashboard')<span class="badge badge-info">NEW</span></a></li>
        <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle')}}"></use>
                </svg>@lang('message.manage_user')</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('users.create')}}">@lang('message.add_user')</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('users.index')}}">@lang('message.user_list')</a></li>
            </ul>
        </li>
        <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-cursor')}}"></use>
                </svg>Manage Category</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="">Add Category</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('categories.index')}}">Category List</a></li>
            </ul>
        </li>
        <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-cursor')}}"></use>
                </svg>Manage Post</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="">Add To Post</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('posts.index')}}">Post List</a></li>
            </ul>
        </li>
        <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-cursor')}}"></use>
                </svg>Manage Customers</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('customers.create')}}">Add Customer</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('customers.index')}}">Customers List</a></li>
            </ul>
        </li>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-unfoldable"></button>
</div>
