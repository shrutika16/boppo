<div class="container-fluid top-header">
    <div class="container">
        <nav class="nav">
            <a class="nav-link {{ (Request::segment(1) == 'dashboard' ? 'active' : '') }}" href="{{ route('dashboard.show') }}">Dashboard</a>
        </nav>
    </div>
</div>
