<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="/" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
        </a>
        <div class="navbar-nav w-100">
            <a href="/" class="nav-item nav-link {{ Request::segment(1) === null ? 'active' : null }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="/journeys" class="nav-item nav-link {{ Request::segment(1) === 'journeys' ? 'active' : null }}"><i class="fa fa-th me-2"></i>Journeys</a>
            <a href="/stations" class="nav-item nav-link {{ Request::segment(1) === 'stations' ? 'active' : null }}"><i class="fa fa-keyboard me-2"></i>Stations</a>
        </div>
    </nav>
</div>