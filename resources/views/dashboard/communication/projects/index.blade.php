@extends('dashboard.layouts.app', [
  'title' => __('Projects'),
  'parentSection' => 'site',
  'elementName' => 'project'
])

@section('pageTitle','Copa Tech - Projects')

@section('content')
  @component('dashboard.layouts.headers.auth')
    @component('dashboard.layouts.headers.breadcrumbs')
      <li class="breadcrumb-item"><a href="{{ route('communication.project.index') }}">{{ __(' Student Projects') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ __('List') }}</li>
    @endcomponent
  @endcomponent

  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">{{ __('Projects') }}</h3>
                <p class="text-sm mb-0">
                  {{ __('This is an example of project management. This is a minimal setup in order to get started fast.') }}
                </p>
              </div>
            </div>
          </div>

          <div class="col-12 mt-2">
            @include('alerts.success')
            @include('alerts.errors')
          </div>

          <div class="table-responsive py-4">
            <table class="table align-items-center table-flush"  id="datatable-basic">
              <thead class="thead-light">
                <tr>
                  <th scope="col">{{ __('Picture') }}</th>
                  <th scope="col">{{ __('Name') }}</th>
                  <th scope="col">{{ __('Category') }}</th>
                  <th scope="col">{{ __('Tags') }}</th>
                  <th scope="col">{{ __('Date') }}</th>
                   <th scope="col">{{ __('views') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($projects as $project)
                  <tr>
                    <td>
                      @if ($project->path() !== "/storage/")
                        <span class="avatar avatar-sm rounded-circle">
                          <img src="{{ config('app.url') . $project->path() }}" alt="{{ $project->name }}" style="max-width: 100px; border-radiu: 25px">
                        </span>
                      @else
                        No Picture
                      @endif
                    </td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->category->name }}</td>
                    <td>
                      @foreach ($project->tags as $tag)
                        <span class="badge badge-default" style="background-color:{{ $tag->color }}">{{ $tag->name }}</span>
                      @endforeach
                    </td>
                    <td>{{ $project->date }}</td>
                   <td><a href="{{ $project->link }}" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    @include('dashboard.layouts.footers.auth')
  </div>
@endsection

@push('css')
  <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/plugins/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endpush

@push('js')
  <script src="{{ asset('assets/dashboard') }}/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="{{ asset('assets/dashboard') }}/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('assets/dashboard') }}/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="{{ asset('assets/dashboard') }}/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="{{ asset('assets/dashboard') }}/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="{{ asset('assets/dashboard') }}/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="{{ asset('assets/dashboard') }}/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="{{ asset('assets/dashboard') }}/plugins/datatables.net-select/js/dataTables.select.min.js"></script>
@endpush
