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
            <li class="menu-header">News</li>
            <li class="dropdown{{ request()->is('post') ? ' active' : '' }} || {{ request()->is('post/create') ? ' active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Posts</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('post') ? ' active' : '' }}"><a class="nav-link" href="{{ route('posts.index') }}">List Posts</a></li>
                    <li class="{{ request()->is('post/create') ? ' active' : '' }}"><a class="nav-link" href="{{ route('posts.create') }}">Add Post</a></li>
                </ul>
            </li>
        </ul>

    </aside>
</div>