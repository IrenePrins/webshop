<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @include('inc/header')
<body>
    <div id="app">
        @include('inc/navbar')

        <main class="py-4">
          <div class="container">
            @yield('content')
          </div>
        </main>
    </div>
</body>
</html>
