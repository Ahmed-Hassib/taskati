{{-- Header Start --}}
<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>

        {{-- logo in obile view --}}
        <div class="d-block d-lg-none">
            <img src="{{ asset('dist/images/logos/taskati.png') }}" width="50" alt="" />
        </div>

        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="p-2">
                <i class="ti ti-dots fs-7"></i>
            </span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between">
                <a href="javascript:void(0)" class="nav-link d-flex d-lg-none align-items-center justify-content-center"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                    aria-controls="offcanvasWithBothOptions">
                    <i class="ti ti-align-justified fs-7"></i>
                </a>
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    {{-- language switcher --}}
                    <li class="nav-item dropdown">
                        @if (App::isLocale('en'))
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('dist/images/svgs/icon-flag-en.svg') }}" alt=""
                                    class="rounded-circle object-fit-cover round-20" />
                            </a>
                        @else
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('dist/images/svgs/icon-flag-sa.svg') }}" alt=""
                                    class="rounded-circle object-fit-cover round-20" />
                            </a>
                        @endif
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                            <div class="message-body" data-simplebar>
                                <form action="{{ route('change-lang', ['locale' => 'en']) }}" method="POST"
                                    class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item"
                                    onclick="this.submit()" @style(['cursor: pointer'])>
                                    @csrf
                                    <div class="position-relative">
                                        <img src="{{ asset('dist/images/svgs/icon-flag-en.svg') }}" alt=""
                                            class="rounded-circle object-fit-cover round-20" />
                                    </div>
                                    <p class="mb-0 fs-3">{{ trans('global.en') }}</p>
                                </form>
                                <form action="{{ route('change-lang', ['locale' => 'ar']) }}" method="POST"
                                    class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item"
                                    onclick="this.submit()" @style(['cursor: pointer'])>
                                    @csrf
                                    <div class="position-relative">
                                        <img src="{{ asset('dist/images/svgs/icon-flag-sa.svg') }}" alt=""
                                            class="rounded-circle object-fit-cover round-20" />
                                    </div>
                                    <p class="mb-0 fs-3">{{ trans('global.ar') }}</p>
                                </form>
                            </div>
                        </div>
                    </li>

                    {{-- notification box --}}
                    {{-- <li class="nav-item dropdown">
                                    <button class="nav-link nav-icon-hover" type="button" id="drop2"
                                        data-bs-toggle="dropdown" aria-expanded="false"
                                        data-bs-target="#drop2menu" aria-expanded="false">
                                        <i class="ti ti-bell-ringing"></i>
                                        <div class="notification bg-primary rounded-circle"></div>
                                    </button>
                                    <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                        aria-labelledby="drop2" id="drop2menu">
                                        <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                            <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                            <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
                                        </div>
                                        <div class="message-body" data-simplebar>
                                            <a href="javascript:void(0)"
                                                class="py-6 px-7 d-flex align-items-center dropdown-item">
                                                <span class="me-3">
                                                    <img src="{{ asset('dist/images/profile/user-1.jpg') }}"
                                                        alt="user" class="rounded-circle" width="48"
                                                        height="48" />
                                                </span>
                                                <div class="w-75 d-inline-block v-middle">
                                                    <h6 class="mb-1 fw-semibold">
                                                        Roman Joined the Team!
                                                    </h6>
                                                    <span class="d-block">Congratulate him</span>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="py-6 px-7 d-flex align-items-center dropdown-item">
                                                <span class="me-3">
                                                    <img src="../../dist/images/profile/user-2.jpg" alt="user"
                                                        class="rounded-circle" width="48" height="48" />
                                                </span>
                                                <div class="w-75 d-inline-block v-middle">
                                                    <h6 class="mb-1 fw-semibold">New message</h6>
                                                    <span class="d-block">Salma sent you new message</span>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="py-6 px-7 d-flex align-items-center dropdown-item">
                                                <span class="me-3">
                                                    <img src="../../dist/images/profile/user-3.jpg" alt="user"
                                                        class="rounded-circle" width="48" height="48" />
                                                </span>
                                                <div class="w-75 d-inline-block v-middle">
                                                    <h6 class="mb-1 fw-semibold">
                                                        Bianca sent payment
                                                    </h6>
                                                    <span class="d-block">Check your earnings</span>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="py-6 px-7 d-flex align-items-center dropdown-item">
                                                <span class="me-3">
                                                    <img src="../../dist/images/profile/user-4.jpg" alt="user"
                                                        class="rounded-circle" width="48" height="48" />
                                                </span>
                                                <div class="w-75 d-inline-block v-middle">
                                                    <h6 class="mb-1 fw-semibold">
                                                        Jolly completed tasks
                                                    </h6>
                                                    <span class="d-block">Assign her new tasks</span>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="py-6 px-7 d-flex align-items-center dropdown-item">
                                                <span class="me-3">
                                                    <img src="../../dist/images/profile/user-5.jpg" alt="user"
                                                        class="rounded-circle" width="48" height="48" />
                                                </span>
                                                <div class="w-75 d-inline-block v-middle">
                                                    <h6 class="mb-1 fw-semibold">
                                                        John received payment
                                                    </h6>
                                                    <span class="d-block">$230 deducted from account</span>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="py-6 px-7 d-flex align-items-center dropdown-item">
                                                <span class="me-3">
                                                    <img src="{{ asset('dist/images/profile/user-1.jpg') }}"
                                                        alt="user" class="rounded-circle" width="48"
                                                        height="48" />
                                                </span>
                                                <div class="w-75 d-inline-block v-middle">
                                                    <h6 class="mb-1 fw-semibold">
                                                        Roman Joined the Team!
                                                    </h6>
                                                    <span class="d-block">Congratulate him</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="py-6 px-7 mb-1">
                                            <button class="btn btn-outline-primary w-100">
                                                See All Notifications
                                            </button>
                                        </div>
                                    </div>
                                </li> --}}

                    {{-- current user pages --}}
                    <li class="nav-item dropdown">
                        <button class="nav-link pe-0" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-profile-img">
                                    <img src="{{ auth()->user()->avatar ?? asset('dist/images/profile/user-1.jpg') }}"
                                        class="rounded-circle" width="35" height="35" alt="" />
                                </div>
                            </div>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end content-dd dropdown-menu-animate-up"
                            aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>
                                <div class="py-3 px-7 pb-0">
                                    <h5 class="mb-0 fs-5 fw-semibold">{{ trans('users.profile') }}</h5>
                                </div>
                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                    <img src="{{ auth()->user()->avatar ?? asset('dist/images/profile/user-1.jpg') }}"
                                        class="rounded-circle" width="80" height="80" />
                                    <div class="ms-3">
                                        <h5 class="mb-1 fs-3">{{ auth()->user()->name }}</h5>
                                        {{-- <span class="mb-1 d-block text-dark">job title</span> --}}
                                        <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                            <i class="ti ti-mail fs-4"></i>
                                            {{ auth()->user()->email }}
                                        </p>
                                    </div>
                                </div>
                                {{-- <div class="message-body">
                                    <a href="{{ route('profile') }}" class="py-8 px-7 mt-8 d-flex align-items-center">
                                        <span
                                            class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                            <img src="{{ asset('dist/images/svgs/icon-account.svg') }}"
                                                alt="" width="24" height="24" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3">
                                            <h6 class="mb-1 bg-hover-primary fw-semibold">
                                                {{ __('profile') }}
                                            </h6>
                                            <span class="d-block text-dark">Account Settings</span>
                                        </div>
                                    </a>
                                </div> --}}
                                <div class="d-grid py-4 px-7 pt-8">
                                    <button
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"
                                        class="btn btn-outline-primary">
                                        <i class="ti ti-power"></i>
                                        {{ __('auth.logout') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
{{-- Header End --}}
