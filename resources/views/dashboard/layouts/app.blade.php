<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('modules.analytics')
  @laravelPWA

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('pageTitle', config('app.name'))</title>

  @include('modules.seo')

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('assets/dashboard') }}/plugins/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="{{ asset('assets/dashboard') }}/plugins/@fontawesome/css/all.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/pace.css') }}">
  @stack('css')

  <!-- Argon CSS -->
  <link type="text/css" href="{{ asset('assets/dashboard') }}/css/argon.css" rel="stylesheet">
</head>
<body class="{{ $class ?? '' }}">
  @auth()
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>

    @include('dashboard.layouts.navbars.sidebar')
  @endauth

  <div class="main-content">
    @include('dashboard.layouts.navbars.navbar')
    @yield('content')
  </div>

  @guest
    @include('dashboard.layouts.footers.guest')
  @endguest

  <script src="{{ asset('assets/js/plugins/pace.js') }}"></script>
  <script src="{{ asset('assets/dashboard') }}/plugins/jquery/dist/jquery.min.js"></script>
  <script src="{{ asset('assets/dashboard') }}/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/dashboard') }}/plugins/js-cookie/js.cookie.js"></script>
  <script src="{{ asset('assets/dashboard') }}/plugins/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="{{ asset('assets/dashboard') }}/plugins/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="{{ asset('assets/dashboard') }}/plugins/lavalamp/js/jquery.lavalamp.min.js"></script>
  <!-- Optional JS -->
  <script src="{{ asset('assets/dashboard') }}/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="{{ asset('assets/dashboard') }}/plugins/chart.js/dist/Chart.extension.js"></script>

  @stack('js')

  <!-- dashboard JS -->
  <script src="{{ asset('assets/dashboard') }}/js/argon.js"></script>
  <script src="{{ asset('assets/dashboard') }}/js/demo.min.js"></script>

  <script>
    async function share(title, url, text) {
      $("#share-loader").show();
      if (window.Windows) {
        const DataTransferManager = window.Windows.ApplicationModel.DataTransfer.DataTransferManager;

        const dataTransferManager = DataTransferManager.getForCurrentView();
        dataTransferManager.addEventListener("datarequested", (ev) => {
          const data = ev.request.data;

          data.properties.title = title;
          data.properties.url = url;
          data.setText(text);
        });

        DataTransferManager.showShareUI();

        return true;
      } else if (navigator.share) {
        try {
          await navigator.share({
            title: title,
            url: url,
            text: text,
          });

          return true;
        } catch (err) {
          console.error('There was an error trying to share this content');
          return false;
        }
      }
      $("#share-loader").hide();
    }
  </script>
</body>
</html>
