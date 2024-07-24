@extends('layouts.app')

@section('content')
    {{-- Body Wrapper --}}
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed"
        data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ route('home') }}" class="text-nowrap logo-img text-center d-block mb-5 w-100">
                                    <img src="{{ asset('dist/images/logos/taskati.png') }}" width="180" alt="">
                                </a>
                                <div class="row">
                                    <div class="col-12 mb-2 mb-sm-0">
                                        <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8"
                                            href="{{ route('google-login') }}" role="button">
                                            <img src="{{ asset('dist/images/svgs/google-icon.svg') }}" alt=""
                                                class="img-fluid me-2" width="18" height="18">
                                            <span
                                                class="d-none d-sm-block me-1 flex-shrink-0">{{ trans('auth.sign in with', ['target' => 'Google']) }}</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="position-relative text-center my-4">
                                    <p class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">
                                        {{ trans('global.or') }}</p>
                                    <span
                                        class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ trans('auth.email') }}</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="email" @required(true) aria-describedby="emailHelp">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="password" class="form-label">{{ trans('auth.password') }}</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            @required(true) autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" name="remember"
                                                id="flexCheckChecked" @checked(old('remember', 'checked'))>
                                            <label class="form-check-label text-dark" for="flexCheckChecked">
                                                {{ trans('auth.remember me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary w-100 py-8 mb-4 rounded-2">{{ trans('auth.sign in') }}</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-medium">{{ trans('auth.new to taskati?') }}</p>
                                        <a class="text-primary fw-medium ms-2"
                                            href="{{ route('register') }}">{{ trans('auth.create an account') }}</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
