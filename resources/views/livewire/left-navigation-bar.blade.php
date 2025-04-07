    <!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

	<div class="sidebar-header">
		<div class="sidebar-title">
			Navigation
		</div>
		<div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
			<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
		</div>
	</div>

	<div class="nano">
		<div class="nano-content">
			<nav id="menu" class="nav-main" role="navigation">

				<ul class="nav nav-main">
					@foreach ($navRoutes as $navRoute)
						<li class="{{ count($navRoute->childRoutes) ? 'nav-parent':'' }}">
                            @if (count($navRoute->childRoutes))
							    <a class="nav-link"  href="#">
                            @else
							    <a class="nav-link" href="{{ $navRoute->route_name ? route($navRoute->route_name) : url($navRoute->slug) }}">
                            @endif
								{!! $navRoute->icon !!}
								<span>{{ $navRoute->name }}</span>
							</a>
                            @if (count($navRoute->childRoutes))
                                <ul class="nav nav-children">
                                    @foreach ($navRoute->childRoutes as $childRoute)
                                        <li>
                                            <a class="nav-link" href="{{ $childRoute->route_name ? route($childRoute->route_name) : url($childRoute->slug) }}">
                                                {!! $childRoute->icon.' '.$childRoute->name !!}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif                      
						</li>
					@endforeach
                </ul>
			</nav>
            {{-- <li>
                <a class="nav-link" href="{{ route('reports') }}">
                    <i class="fa-solid fa-paste"></i>
                    <span>Reporting/BI</span>
                </a>                        
            </li>
            <li class="nav-parent">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-gear"></i>
                    <span>Management</span>
                </a>
                <ul class="nav nav-children">
                    <li>
                        <a class="nav-link" href="{{ route('user.manager') }}">
                            Roles & Users
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('route.management') }}">
                            Route Management
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('home') }}">
                            Terminals
                        </a>
                    </li>
                </ul>
            </li> --}}
		</div>

		<script>
			// Maintain Scroll Position
			if (typeof localStorage !== 'undefined') {
				if (localStorage.getItem('sidebar-left-position') !== null) {
					var initialPosition = localStorage.getItem('sidebar-left-position'),
						sidebarLeft = document.querySelector('#sidebar-left .nano-content');

					sidebarLeft.scrollTop = initialPosition;
				}
			}
		</script>

	</div>

</aside>
<!-- end: sidebar -->

