<!doctype html>
<html lang="en">

  <head>
  @include('front.includes.head')
  </head>

  <body>

    
    <div class="site-wrap" id="home-section">
    @include('front.includes.header')
    @include('front.includes.pagehero')
    @yield('content')

    @include('front.includes.footer')

    </div>

    @include('front.includes.footerjs')

  </body>

</html>

