{{-- 

/**
*
* Created a new component <x-rtl.navbar.style-vertical-menu/>.
* 
*/

--}}

<div class="header-container {{ $classes }}">
    <header class="header navbar navbar-expand-sm expand-header">
        <a href="javascript:void(0);" class="sidebarCollapse">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>
        <div class="search-animated toggle-search">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <form class="form-inline search-full form-inline search" role="search">
                <div class="search-bar">
                    <input type="text" class="form-control search-form-control  ml-lg-auto"
                        placeholder="{{ __('trans.search') }}...">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x search-close">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
            </form>
        </div>
        <ul class="navbar-item flex-row ms-lg-auto ms-0">
            <ul class="nav-item dropdown language-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle mt-2" id="language-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <p class="fas fa-globe" style="font-size: 25px"></p>
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="language-dropdown">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="container">
                            <a rel="alternate" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                                {{-- {{ $localeCode == LaravelLocalization::getCurrentLocale() ? 'active' : '' }} --}}
                            </a>
                        </li>
                    @endforeach
                </div>
            </ul>
            <li class="nav-item theme-toggle-item">
                <a href="javascript:void(0);" class="nav-link theme-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-moon dark-mode">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-sun light-mode">
                        <circle cx="12" cy="12" r="5"></circle>
                        <line x1="12" y1="1" x2="12" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="23"></line>
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                        <line x1="1" y1="12" x2="3" y2="12"></line>
                        <line x1="21" y1="12" x2="23" y2="12"></line>
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                    </svg>
                </a>
            </li>
            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar-container">
                        <div class="avatar avatar-sm avatar-indicators avatar-online">
                            <img alt="avatar" src="{{ Vite::asset('resources/images/profile-30.png') }}"
                                class="rounded-circle">
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="user-profile-section">
                        <div class="media mx-auto">
                            <div class="emoji me-2">
                                &#x1F44B;
                            </div>
                            <div class="media-body">
                                <h5>
                                    @auth
                                        {{ Auth::user()->name }}
                                    @endauth
                                </h5>
                                <p>
                                    @auth
                                        {{ Auth::user()->email }}
                                    @endauth
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item mb-2">
                        <a href="/modern-dark-menu/profile">
                            <i class="fas fa-user"></i> <span>{{ __('trans.profile') }}</span>
                        </a>
                    </div>
                    @auth
                        <div class="dropdown-item">
                            <form action="/modern-dark-menu/logout" method="POST">
                                @csrf
                                <div class="text-center">
                                    <button type="submit"
                                        style="border: transparent; background-color: transparent; color: #ffff;">
                                        <i class="fas fa-sign-out-alt"></i>
                                        {{ __('trans.logout') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="dropdown-item">
                            <a href="/modern-dark-menu/sign-in">
                                <i class="fas fa-sign-in-alt"></i>
                                {{ __('trans.login') }}
                            </a>
                        </div>
                    @endauth
                </div>
            </li>
        </ul>
    </header>
</div>
