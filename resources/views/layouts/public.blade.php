{{-- @php
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
@endphp --}}
<!DOCTYPE html>
<html lang="en" class="form-screen">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('public.Title') .' - '. $title }}</title>

    <!-- Tailwind is included -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png"/>
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6"/>
    {{-- <link rel="icon" href="{{ URL('storage/'.$fav) }}" type="image/icon type"> --}}


    <meta name="description" content="#####">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-130795909-1');
    </script>

</head>
<body>
    <div id="app">
        <section class="section main-section">
            <div class="card">
                <header class="card-header">
                    @yield('header')
                </header>
                <div class="card-content">
                    @yield('form')
                </div>
            </div>
        </section>
    </div>

    <!-- Scripts below are for demo only -->
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
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

</body>
</html>
