@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Account settings - Security')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-account-settings.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-security.js') }}"></script>
    <script src="{{ asset('assets/js/modal-enable-otp.js') }}"></script>
    <script src="{{ asset('assets/js/modal-two-factor-auth.js') }}"></script>

@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Account Settings /</span> Security
    </h4>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-4">
                <li class="nav-item"><a class="nav-link" href="{{ url('account/settings') }}"><i
                            class="ti-xs ti ti-users me-1"></i> Account</a></li>
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
                            class="ti-xs ti ti-lock me-1"></i> Security</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('pages/account-settings-billing') }}"><i
                            class="ti-xs ti ti-file-description me-1"></i> Billing & Plans</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('pages/account-settings-notifications') }}"><i
                            class="ti-xs ti ti-bell me-1"></i> Notifications</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('pages/account-settings-connections') }}"><i
                            class="ti-xs ti ti-link me-1"></i> Connections</a></li>
            </ul>
            <!-- Change Password -->
            <div class="card mb-4">
                <h5 class="card-header">Change Password</h5>
                <div class="card-body">
                    <form  action="{{ route('user-password.update') }}" method="POST" >
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6 form-password-toggle">
                                <label class="form-label" for="currentPassword">Current Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" name="current_password" id="currentPassword"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                                @error('current_password')
                                <span id="" class="error">{{ $message }}</span>
                              @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6 form-password-toggle">
                                <label class="form-label" for="newPassword">New Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" id="newPassword" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                                @error('password')
                                <span id="" class="error">{{ $message }}</span>
                              @enderror
                            </div>

                            <div class="mb-3 col-md-6 form-password-toggle">
                                <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" name="password_confirmation" id="confirmPassword"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                                @error('password_confirmation')
                                <span id="" class="error">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="col-12 mb-4">
                                <h6>Password Requirements:</h6>
                                <ul class="ps-3 mb-0">
                                    <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                                    <li class="mb-1">At least one lowercase character</li>
                                    <li>At least one number, symbol, or whitespace character</li>
                                </ul>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-label-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--/ Change Password -->

            <!-- two-step verification -->
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Two-step verification</h4>
                </div>
                <div class="card-body my-2 py-25">
                    @if (session('status') == 'two-factor-authentication-disabled')
                        <div class="alert alert-success" role="alert">
                            <div class="alert-body"><strong>Good Morning!</strong> Two factor authentication has been
                                disabled.</div>
                        </div>
                    @endif

                    @if (session('status') == 'two-factor-authentication-enabled')
                        <div class="mb-4 font-medium text-sm">
                            Please finish configuring two factor authentication below.
                        </div>
                    @endif

                    @if (session('status') == 'two-factor-authentication-confirmed')
                        <div class="mb-4 font-medium text-sm">
                            Two factor authentication confirmed and enabled successfully.
                        </div>
                    @endif

                    @if (!auth()->user()->two_factor_secret)
                        <p class="fw-bolder">Two factor authentication is not enabled yet. </p>
                    @endif

                    <p>
                        Two-factor authentication adds an additional layer of security to your account by requiring <br />
                        more than just a password to log in. Learn more.
                    </p>


                    @if (auth()->user()->two_factor_secret)

                      @if (auth()->user()->two_factor_confirmed_at == null)
                        @include('_partials/_modals/modal-two-factor-auth')
                        <p class="fw-bolder">Please finish configuring two factor authentication below.</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#twoFactorAuthOne"> Show </button>
                      @else
                        <p class="fw-bolder">
                          Two factor authentication confirmed and enabled successfully
                        </p>
                        <form method="POST" action="{{ route('two-factor.disable') }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">
                                Disable two-factor authentication
                            </button>
                        </form>

                        
                      @endif

                    @else
                        <form method="POST" action="{{ route('two-factor.enable') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                Enable two-factor authentication
                            </button>
                        </form>
                    @endif
                </div>
            </div>
            <!-- / two-step verification -->








        </div>
    </div>

@endsection
