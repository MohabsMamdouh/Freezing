
@php
    foreach ($site as $s){
      $titleEn = $s->website_title;
      $titleAr = $s->website_arabic;
      $logo = $s->website_logo;
      $fav = $s->website_favicon;
      $email = $s->email;
      $phone1 = $s->phone1;
      $phone2 = $s->phone2;
      $address = $s->address;
    }
@endphp

<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @if (strtolower(language()->getCode()) == 'en')
    <title>{{ $titleEn .' - '. $title }}</title>
  @elseif (strtolower(language()->getCode()) == 'ar')
    <title>{{ $titleAr .' - '. $title }}</title>
  @endif
  <!-- Tailwind is included -->
  @yield('style')

  <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
  <link rel="icon" href="{{ URL('storage/'.$fav) }}" type="image/icon type">

  <meta name="description" content="#####">


  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-130795909-1');
  </script>

</head>
<body class="d-flex flex-column min-vh-100">

  <div id="app">

    <nav id="navbar-main" class="navbar is-fixed-top">
      @include('vendor.includes.navbar')
    </nav>

    <aside class="aside is-placed-left is-expanded">
      @include('vendor.includes.aside')
    </aside>

    <section class="content">
      @yield('content')
    </section>

  </div>

  <footer class="text-center text-lg-start bg-light text-muted mt-auto">
    @include('vendor.includes.footer')
  </footer>
  <!-- Scripts below are for demo only -->
  <script type="text/javascript" src="{{ URL::asset('js/jquery-3.6.0.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/main.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/all.min.js') }}"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
  <script type="text/javascript" src="{{ URL::asset('js/chart.sample.min.js') }}"></script>


  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '658339141622648');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1"/></noscript>

  <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

  @yield('script')

</body>
</html>
