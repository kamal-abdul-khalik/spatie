<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">{{ config('app.name') }}</a>
        </div>

        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}"></a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->is('dashboard') ? ' active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i
                        class="fab fa-laravel"></i></i><span>Dashboard</span></a>
            </li>

            @can('add_posts')
                <li class="menu-header">Posts</li>
                <li
                    class="dropdown{{ request()->is('posts') ? ' active' : '' }} || {{ request()->is('posts/create') ? ' active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-newspaper"></i>
                        <span>Post</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->is('posts') ? ' active' : '' }}"><a class="nav-link"
                                href="{{ route('posts.index') }}">List Post</a></li>
                        <li class="{{ request()->is('posts/create') ? ' active' : '' }}"><a class="nav-link"
                                href="{{ route('posts.create') }}">Add Post</a></li>
                    </ul>
                </li>
            @endcan

            @can('add_categories')
                <li class="{{ request()->is('categories') ? ' active' : '' }}">
                    <a href="{{ route('categories.index') }}"
                        class="nav-link {{ request()->is('categories') ? ' active' : '' }}"><i class="fas fa-columns"></i>
                        <span>Category</span></a>
                </li>
            @endcan

            @can('add_tags')
                <li class="{{ request()->is('tags') ? ' active' : '' }}">
                    <a href="{{ route('tags.index') }}" class="nav-link {{ request()->is('tags') ? ' active' : '' }}"><i
                            class="fas fa-tags"></i> <span>Tag</span></a>
                </li>
            @endcan

            @can('add_roles')
                <li class="menu-header">Roles and Permissions</li>
                <li
                    class="dropdown{{ request()->is('role-and-permission/roles') ? ' active' : '' }} ||
                {{ request()->is('role-and-permission/permissions') ? ' active' : '' }} ||
                {{ request()->is('role-and-permission/assigns') ? ' active' : '' }} ||
                {{ request()->is('role-and-permission/permissionUsers') ? ' active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-tag"></i>
                        <span>Role - Permission</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->is('role-and-permission/roles') ? ' active' : '' }}"><a class="nav-link"
                                href="{{ route('roles.index') }}">Role</a></li>
                        <li class="{{ request()->is('role-and-permission/permissions') ? ' active' : '' }}"><a
                                class="nav-link" href="{{ route('permissions.index') }}">Permission</a></li>
                        <li class="{{ request()->is('role-and-permission/assigns') ? ' active' : '' }}"><a class="nav-link"
                                href="{{ route('assigns.create') }}">Assign Permission</a></li>
                        <li class="{{ request()->is('role-and-permission/permissionUsers') ? ' active' : '' }}"><a
                                class="nav-link" href="{{ route('permissionUsers.create') }}">Give Role to User</a></li>
                    </ul>
                </li>
            @endcan
        </ul>

    </aside>
</div>
