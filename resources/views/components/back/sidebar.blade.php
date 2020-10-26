<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">{{ config('app.name') }}</a>
        </div>

        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">ASR</a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->is('dashboard') ? ' active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            
            @can('add_posts')
            <li class="menu-header">Posts</li>
            <li class="dropdown{{ request()->is('post') ? ' active' : '' }} || {{ request()->is('post/create') ? ' active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Post</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('post') ? ' active' : '' }}"><a class="nav-link" href="{{ route('posts.index') }}">List Post</a></li>
                    <li class="{{ request()->is('post/create') ? ' active' : '' }}"><a class="nav-link" href="{{ route('posts.create') }}">Add Post</a></li>
                </ul>
            </li>
            @endcan

            @can('add_categories')
            <li class="menu-header">Categories</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Category</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link" href="">List Posts</a></li>
                    <li class=""><a class="nav-link" href="">Add Post</a></li>
                </ul>
            </li>
            @endcan

            @can('add_roles')
            <li class="menu-header">Roles and Permissions</li>
            <li class="dropdown{{ request()->is('role-and-permission/roles') ? ' active' : '' }} ||
                {{ request()->is('role-and-permission/permissions') ? ' active' : '' }} ||
                {{ request()->is('role-and-permission/assignable') ? ' active' : '' }} ||
                {{ request()->is('role-and-permission/assign/user') ? ' active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Role - Permission</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('role-and-permission/roles') ? ' active' : '' }}"><a class="nav-link" href="{{ route('roles.index') }}">Role</a></li>
                    <li class="{{ request()->is('role-and-permission/permissions') ? ' active' : '' }}"><a class="nav-link" href="{{ route('permissions.index') }}">Permission</a></li>
                    <li class="{{ request()->is('role-and-permission/assignable') ? ' active' : '' }}"><a class="nav-link" href="{{ route('assign.create') }}">Assign Permission</a></li>
                    <li class="{{ request()->is('role-and-permission/assign/user') ? ' active' : '' }}"><a class="nav-link" href="{{ route('assign.user.create') }}">Give Role to User</a></li>
                </ul>
            </li>
            @endcan

            @can('view_users')
            <li class="menu-header">Management Users</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Users</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link" href="">List User</a></li>
                    <li class=""><a class="nav-link" href="">Add User</a></li>
                </ul>
            </li>
            @endcan
            
        </ul>

    </aside>
</div>