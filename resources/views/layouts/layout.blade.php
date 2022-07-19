<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('assets/') }}" data-template="vertical-menu-template-free">

<head>
  @include('layouts.head')
</head>

<body>

  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      <!-- Include sidenav -->
      @include('layouts.sidenav')

      <div class="layout-page">
        <!-- Include navbar -->
        @include('layouts.navbar')

        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            @yield('content')
          </div>
          <div class="content-backdrop fade"></div>
        </div>

      </div>
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>

  <!-- Scripts -->
  @include('layouts.scripts')
</body>

</html>