<div>
    <!-- start: header -->
    <header class="header">
        <div class="logo-container">
            <a href="{{ route('home') }}" class="">
                <img src="{{ url('./img/NAD_Logo.png') }}" height="60" alt="NAD_Logo" />
            </a>
        </div>


        <!-- start: search & user box -->
        <div class="header-right mt-2">

            <div id="userbox" class="userbox min-w-52">
                <details class="dropdown">
                    <summary class="m-1">{{ Auth::user()->name }} <br> {{ Auth::user()?->user_role?->user_role_to_role?->name }}</summary>
                    <ul class="menu dropdown-content bg-dark rounded-box z-[1] w-52 p-2 shadow">
                        <li>
                            <a role="menuitem" tabindex="-1" href="{{ route('profile.show') }}"><i class="bx bx-user-circle"></i>My Profile</a>
                        </li>
                        <li>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <a href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </details>
                {{-- <a href="#" data-bs-toggle="dropdown" class="w-full">
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
                </div> --}}
            </div>
        </div>
        
    </header>
    <!-- end: header -->
</div>
