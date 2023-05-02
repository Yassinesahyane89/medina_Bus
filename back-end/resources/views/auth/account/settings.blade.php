@extends('layouts/layoutMaster')

@section('title', 'Account settings - Account')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Account Settings /</span> Account
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-4">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="ti-xs ti ti-users me-1"></i> Account</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('account.settings.security') }}"><i class="ti-xs ti ti-lock me-1"></i> Security</a></li>
    </ul>
    <div class="card mb-4">
      <h5 class="card-header">Profile Details</h5>
      <!-- Account -->
      <div class="card-body">
        <form action="{{ route('account.settings.image') }}" enctype="multipart/form-data" method="post" class="d-flex align-items-start align-items-sm-center gap-4">
          @csrf
          <img src="{{ Auth::user()->getFirstMediaUrl('profile_image') != '' ? Auth::user()->getFirstMediaUrl('profile_image') : 'https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/img/avatars/14.png' }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
          <div class="button-wrapper">
            <label for="upload" class="btn btn-primary me-2 mb-3 waves-effect waves-light" tabindex="0">
              <span class="d-none d-sm-block">Upload new photo</span>
              <i class="ti ti-upload d-block d-sm-none"></i>
              <input type="file" name="image" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
            </label>
            <button type="submit" class="btn btn-label-success account-image-reset mb-3 waves-effect">
              <i class="ti ti-refresh-dot d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Save</span>
            </button>

            <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
          </div>
        </form>
      </div>
      <hr class="my-0">
      <div class="card-body">
        <form   action="{{ route('user-profile-information.update') }}" method="POST" >
          @csrf
          @method('put')

          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="firstName" class="form-label">Name</label>

              <input
              class="form-control"
              type="text" id="name"
              name="name"
              placeholder="Please enter  name"
              value="{{ Auth::user()->name }}"
               />
              @error('name')
              <span id="" class="error">{{ $message }}</span>
              @enderror

            </div>
            <div class="mb-3 col-md-6">
              <label for="email" class="form-label">E-mail</label>

              <input

              class="form-control"
              type="email"
              id="email"
              name="email"
              value= " {{ Auth::user()->email }} "
              placeholder="Email" />

              @error('email')
              <span id="" class="error">{{ $message }}</span>
            @enderror

            </div>
          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Save changes</button>
            <button type="reset" class="btn btn-label-secondary">Cancel</button>
          </div>
        </form>
      </div>
      <!-- /Account -->
    </div>
    <div class="card">
      <h5 class="card-header">Delete Account</h5>
      <div class="card-body">
        <div class="mb-3 col-12 mb-0">
          <div class="alert alert-warning">
            <h5 class="alert-heading mb-1">Are you sure you want to delete your account?</h5>
            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
          </div>
        </div>
        <form id="formAccountDeactivation" onsubmit="return false">
          <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
            <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
          </div>
          <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
