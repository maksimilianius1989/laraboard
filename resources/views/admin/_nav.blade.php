<ul class="nav nav-tabs mb-3">
    <li class="nav-item"><a href="{{ route('admin.home') }}" class="nav-link{{ $page == '' ? ' active' : '' }}">Dashboard</a></li>
    @can('manage-adverts')
        <li class="nav-item"><a href="{{ route('admin.adverts.adverts.index') }}" class="nav-link{{ $page === 'adverts' ? ' active' : '' }}">Adverts</a></li>
    @endcan
    @can('manage-regions')
        <li class="nav-item"><a href="{{ route('admin.regions.index') }}" class="nav-link{{ $page === 'regions' ? ' active' : '' }}">Regions</a></li>
    @endcan
    @can('manage-adverts-categories')
        <li class="nav-item"><a href="{{ route('admin.adverts.categories.index') }}" class="nav-link{{ $page === 'adverts_categories' ? ' active' : '' }}">Categories</a>
        </li>
    @endcan
    @can('manage-users')
        <li class="nav-item"><a href="{{ route('admin.users.index') }}" class="nav-link">Users</a></li>
    @endcan
</ul>