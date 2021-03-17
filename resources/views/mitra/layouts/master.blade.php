
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  @include('mitra.layouts.head')

</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      
        {{-- Navbar --}}
        @include('mitra.layouts.navbar')

        {{-- Sidebar --}}
        @include('mitra.layouts.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                @yield('content')
            </section>
        </div>
      
      {{-- Footer --}}
      @include('mitra.layouts.footer')

    </div>
  </div>

  @include('mitra.layouts.js')

  @stack('scripts')


</body>
</html>
