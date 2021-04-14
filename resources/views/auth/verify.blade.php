@extends('dashboard.layouts.app', [
  'navClass' => 'navbar-light bg-secondary',
  'searchClass' => 'navbar-search-light',
  'parentSection' => '',
  'elementName' => ''
])

@section('pageTitle','Copa Tech - Verify Account')

@section('content')
  @include('dashboard.layouts.headers.header', [
    'title' => __('Account Verification'),
    'class' => 'col-lg-12 text-center'
  ])

  <div class="container mt--8 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
              <small>{{ __('Verify Your Email Address') }}</small>
            </div>
            <div>
              @if (session('resent'))
                <div class="alert alert-success" role="alert">
                  {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
              @endif

              {{ __('Before proceeding, please check your email for a verification link.') }}
              {{ __('If you did not receive the email') }},
              <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
              </form
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
