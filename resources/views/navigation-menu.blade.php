			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="{{ route('home') }}" class="logo mt-0">
						<img src="{{ url('./img/NAD_Logo.png') }}" height="60" alt="NAD_Logo" />
					</a>
                </div>


				<!-- start: search & user box -->
				<div class="header-right mt-2">

					<div id="userbox" class="userbox min-w-52">
                        <a href="#" data-bs-toggle="dropdown">
                            <div class="flex justify-between ">
                                <div class="profile-info" data-lock-name="{{ Auth::user()->name }}" data-lock-email="{{ Auth::user()->email }}">
                                    <span class="name">{{ Auth::user()->name }}</span>
                                    <span class="role">Role</span>
                                </div>
                                <div>
                                    <i class="fa custom-caret"></i>
                                </div>
                            </div>

                        </a>

						<div class="dropdown-menu">
							<ul class="list-unstyled mb-2">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="{{ route('profile.show') }}"><i class="bx bx-user-circle"></i>My Profile</a>
								</li>
								<li>
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf
                                        <x-dropdown-link href="{{ route('logout') }}"
                                                @click.prevent="$root.submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
								</li>
							</ul>
						</div>
					</div>
				</div>
                
			</header>
			<!-- end: header -->
