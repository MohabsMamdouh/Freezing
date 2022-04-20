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
        $created = $s->created_at;
        $descr = $s->meta_description;
        $keyword = $s->meta_keyword;
    }
    $title = explode(' ', $titleEn)
@endphp

@if (strtolower(language()->getCode()) == 'en')
    @php
        $align = 'left'
    @endphp
@elseif (strtolower(language()->getCode()) == 'ar')
    @php
        $align = 'right'
    @endphp
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="copyright" content="{{ __('public.Mohab Mamdouh') }}, http://mohab-resume.byethost24.com/">

    @if (strtolower(language()->getCode()) == 'en')
        <title>{{ $titleEn }}</title>
    @elseif (strtolower(language()->getCode()) == 'ar')
        <title>{{ $titleAr }}</title>
    @endif

    <link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/maicons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/theme.css') }}">

    <link rel="icon" href="{{ URL('storage/'.$fav) }}" type="image/icon type">

    <meta name="description" content="{{ $descr }}">
    <meta name="keywords" content="{{ $keyword }}">
    <meta name="author" content="John Doe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light navbar-float">
            <div class="container">
                <a href="{{ route('UserHome') }}" class="navbar-brand">
                    @if (strtolower(language()->getCode()) == 'en')
                        {{ $title[0] }}<span class="text-primary">{{ $title[1] }}</span>
                    @elseif (strtolower(language()->getCode()) == 'ar')
                        <span class="text-primary">{{ $titleAr }}</span>
                    @endif
                </a>

                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarContent">
                    <ul class="navbar-nav ml-lg-4 pt-3 pt-lg-0">
                        <li class="nav-item active">
                            <a href="#home" class="nav-link">{{ __('public.Home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="#about" class="nav-link">{{ __('public.About') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="#whyus" class="nav-link">{{ __('public.Why Choose Us') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link">{{ __('public.Contact') }}</a>
                        </li>
                    </ul>

                    <div class="ml-auto">
                        {{-- Language Switcher --}}
                        <div class="navbar-item has-divider has-user-avatar">
                            @if (strtolower(language()->getCode()) == 'en')
                                <a class="dropdown-item" href="{{ language()->back('ar') }}"> 
                                    <img style="display: inline" src="{{ asset('storage/flags/'. language()->country('ar') .'.png') }}" alt="{{ 'العربية' }}" width="{{ config('language.flags.width') }}" /> &nbsp;
                                    {{ 'العربية' }}
                                </a>
                            @elseif (strtolower(language()->getCode()) == 'ar')
                                <a class="dropdown-item" href="{{ language()->back('en') }}"> 
                                    <img style="display: inline" src="{{ asset('storage/flags/'. language()->country('en') .'.png') }}" alt="{{ 'English' }}" width="{{ config('language.flags.width') }}" /> &nbsp;
                                    {{ 'English' }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="page-banner home-banner" id="home">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-lg-6 py-3 wow fadeInUp">
                        <h1 class="mb-4" style="text-align: {{ $align }}">{{ __('public.Great Companies are built on great Services') }}</h1>
                        <p class="text-lg mb-5" style="text-align: {{ $align }}">{{ __('public.Get instant access to our product portfolio and catalogues easier and faster!') }}</p>
                    </div>
                    <div class="col-lg-6 py-3 wow zoomIn">
                        <div class="img-place">
                            <img src="{{ URL('storage/img/air-cond-service-pj.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="page-section features">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4 py-3 wow fadeInUp">
                        <div class="d-flex flex-row">
                            <div class="img-fluid mr-3">
                                <img src="{{ URL('storage/img/icon_pattern.svg') }}" alt="">
                            </div>
                            <div>
                                <h5>{{ __('public.Indoor Air Quality, A Daikin experience') }}</h5>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-md-6 col-lg-4 py-3 wow fadeInUp">
                        <div class="d-flex flex-row">
                            <div class="img-fluid mr-3">
                                <img src="{{ URL('storage/img/icon_pattern.svg') }}" alt="">
                            </div>
                            <div>
                                <h5>{{ __('public.Pure air, because we care') }}</h5>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-md-6 col-lg-4 py-3 wow fadeInUp">
                        <div class="d-flex flex-row">
                            <div class="img-fluid mr-3">
                                <img src="{{ URL('storage/img/icon_pattern.svg') }}" alt="">
                            </div>
                            <div>
                                <h5>{{ __('public.Air Filtration Unit DAFU 1000') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- .container -->
        </div> <!-- .page-section -->
    
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 py-3 wow zoomIn">
                        <div class="img-place text-center">
                        <img src="{{ URL('storage/img/air-conditioning-repair-instalation-service.webp') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 py-3 wow fadeInRight">
                        <h2 class="title-section marked" style="text-align: {{ $align }}"><span class="marked">{{ __('public.We\'re Dynamic Team of Creatives People') }}</span></h2>
                        <div class="divider mx-auto" style="text-align: {{ $align }}"></div>
                        <p style="text-align: {{ $align }}">{{ __('public.par1') }}</p>
                    </div>
                </div>
            </div> <!-- .container -->
        </div> <!-- .page-section -->
    
        <div class="page-section counter-section" id='about'>
            <div class="container">
                <div class="row align-items-center text-center">
                    <div class="col-lg-4">
                        <p>{{ __('public.New Jobs') }}</p>
                        <h2><span class="number" data-number="{{ $pend }}"></span></h2>
                    </div>
                    <div class="col-lg-4">
                        <p>{{ __('public.Finished Jobs') }}</p>
                        <h2><span class="number" data-number="{{ $comp }}"></span></h2>
                    </div>
                    <div class="col-lg-4">
                        <p>{{ __('public.Growth Ration') }}</p>
                        <h2><span class="number" data-number="{{ $growth }}"></span>%</h2>
                    </div>
                </div>
            </div> <!-- .container -->
        </div> <!-- .page-section -->
    
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 py-3 wow fadeInLeft">
                        <h2 class="title-section" style="text-align: {{ $align }}"><span class="marked">{{ __('public.We\'re ready to Serve you with best') }}</span></h2>
                        <div class="divider mx-auto" style="text-align: {{ $align }}"></div>
                        <p class="mb-5" style="text-align: {{ $align }}">{{ __('public.par2') }}</p>
                        <a href="#contact" class="btn btn-primary">{{ __('public.Request a Technical') }}</a>
                    </div>
                    <div class="col-lg-6 py-3 wow zoomIn">
                        <div class="img-place text-center">
                        <img src="{{ URL('storage/img/color-air-conditioner.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div> <!-- .container -->
        </div> <!-- .page-section -->
    
        <div class="page-section" id="whyus">
            <div class="container">
                <div class="text-center wow fadeInUp">
                    <div class="subhead">{{ __('public.Why Choose Us') }}</div>
                    <h2 class="title-section"><span class="marked">{{ __('public.Your Comfort is Our Priority') }}</span></h2>
                    <div class="divider mx-auto"></div>
                </div>
    
                <div class="row mt-5 text-center">
                    <div class="col-lg-4 py-3 wow fadeInUp">
                        <div class="display-3" style="color: #6C55F9"><i class="fa-solid fa-signal"></i></div>
                        <h5>{{ __('public.High Performance') }}</h5>
                        <p>{{ __('public.par3') }}</p>
                    </div>
                    <div class="col-lg-4 py-3 wow fadeInUp">
                        <div class="display-3" style="color: #6C55F9"><i class="fa-solid fa-hand-holding-dollar"></i></div>
                        <h5>{{ __('public.Friendly Prices') }}</h5>
                        <p>{{ __('public.par3') }}</p>
                    </div>
                    <div class="col-lg-4 py-3 wow fadeInUp">
                        <div class="display-3" style="color: #6C55F9"><i class="fa-solid fa-hourglass"></i></div>
                        <h5>{{ __('public.No time-confusing') }}</h5>
                        <p>{{ __('public.par3') }}</p>
                    </div>
                </div>
            </div> <!-- .container -->
        </div> <!-- .page-section -->
    
        <div class="page-section border-top">
            <div class="container">
                <div class="text-center wow fadeInUp">
                    <h2 class="title-section"><span class="marked">{{ __('public.Pricing Plan') }}</span></h2>
                    <div class="divider mx-auto"></div>
                </div>
        
                <div class="row justify-content-center">

                    @foreach ($price as $plan)
                        <div class="col-12 col-lg-auto py-3 wow 
                            @if ($plan->plan == 'Individual')
                                fadeInLeft
                            @else
                                fadeInUp
                            @endif
                        " style="min-width: 30%">
                            <div class="card-pricing 
                                @if ($plan->plan == 'Central')
                                    active
                                @endif
                            ">
                                <div class="header">
                                    @if ($plan->plan == "Central")
                                        <div class="price-labled">{{ __('public.Best') }}</div>
                                    @endif
                                    <div class="price-icon">
                                        @if ($plan->plan == "Individual")
                                            <i class="fa-solid fa-snowflake"></i>
                                        @else
                                            <i class="fa-solid fa-building"></i>
                                        @endif
                                    </div>
                                    <div class="price-title">{{ __('public.'.$plan->plan) }}</div>
                                </div>
                                <div class="body py-3">
                                    <div class="price-tag">
                                        <span class="currency">$</span>
                                        <h2 class="display-4">{{ $plan->price }}</h2>
                                        <span class="period">/{{ __('public.'.$plan->duration) }}</span>
                                    </div>
                                    <div class="price-info">
                                        <p>{{ __('public.Choose the plan that right for you') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
        
                </div>
            </div> <!-- .container -->
        </div> <!-- .page-section -->
    
        <div class="page-section bg-light">
            <div class="container">
                
                <div class="owl-carousel wow fadeInUp" id="testimonials">
                @foreach ($users as $user)
                    <div class="item">
                        <div class="row align-items-center">
                            <div class="col-md-6 py-3">
                                <div class="testi-image">
                                    <img src="{{ URL('storage/users/'.$user->image_path) }}" alt="" style="max-width:100%;max-height:100%;">
                                </div>
                            </div>
                            <div class="col-md-6 py-3">
                                <div class="testi-content">
                                    <p>{{ __('public.parr') }}</p>
                                    <div class="entry-footer">
                                        <strong>
                                            @if (strtolower(language()->getCode()) == 'en')
                                                {{ $user->name }}
                                            @elseif (strtolower(language()->getCode()) == 'ar')
                                                {{ $user->arabic_name }}
                                            @endif
                                        </strong> 
                                        &mdash; 
                                        <span class="text-grey">{{ __('dashboard.'.$user->roles[0]->name) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        
                </div>
            </div> <!-- .container -->
        </div> <!-- .page-section -->
    
        <div class="page-section" id="contact">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 py-3 wow fadeInUp">
                        <h2 class="title-section" style="text-align: {{ $align }}"><span class="marked">{{ __('public.Get in Touch') }}</span></h2>
                        <div class="divider mx-auto"></div>
                        <p>{{ $descr }}</p>
        
                        <ul class="contact-list">
                            <li>
                                <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                                <div class="content">{{ $address }}</div>
                            </li>
                            <li>
                                <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                                <div class="content">{{ $email }}</div>
                            </li>
                            <li>
                                <div class="icon"><i class="fa-solid fa-mobile"></i></div>
                                <div class="content">
                                    {{ $phone1 }} | {{ $phone2 }}
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 py-3 wow fadeInUp">
                        <div class="subhead" style="text-align: {{ $align }}">{{ __('public.Contact') }}</div>
                        <h2 class="title-section" style="text-align: {{ $align }}"><span class="marked">{{ __('public.Drop Us a Request') }}</span></h2>
                        <div class="divider mx-auto"></div>
                        
                        <form action="{{ route('StoreJob') }}" method="POST" id="request">
                            @csrf
                            <div class="py-2">
                                <input type="text" class="form-control" style="text-align: {{ $align }}" name="CompanyName" placeholder="{{ __('dashboard.Company') }}">
                            </div>
                            <div class="py-2">
                                <input type="email" class="form-control" style="text-align: {{ $align }}" name="Email" placeholder="{{ __('auth.Email Address') }}">
                            </div>
                            <div class="py-2">
                                <input type="text" class="form-control" style="text-align: {{ $align }}" name="Phone1" placeholder="{{ __('auth.Phone') }}">
                            </div>
                            <div class="py-2">
                                <input type="text" class="form-control" style="text-align: {{ $align }}" name="addPhone" placeholder="{{ __('auth.Phone') }}">
                            </div>
                            <div class="py-2">
                                <input type="text" class="form-control" style="text-align: {{ $align }}" name="Address" placeholder="{{ __('auth.Address') }}">
                            </div>
                            <div class="py-2">
                                <textarea rows="6" class="form-control" style="text-align: {{ $align }}" name="Description" placeholder="{{ __('dashboard.Description') }}"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill mt-4">{{ __('public.Send Request') }}</button>
                        </form>
                    </div>
                </div>
            </div> <!-- .container -->
        </div> <!-- .page-section -->
    
        <div class="page-section border-top">
            <div class="container">
                <div class="text-center wow fadeInUp">
                    <div class="subhead">{{ __('public.Feedbacks') }}</div>
                    <h2 class="title-section"><span class="marked">{{ __('public.Read our latest Feedbacks') }}</span></h2>
                    <div class="divider mx-auto"></div>
                </div>

                <div class="row my-5 card-blog-row">
                    @foreach ($feedback as $feed)
                        <div class="col-md-6 col-lg-3 py-3 wow fadeInUp">
                            <div class="card-blog">
                                <div class="header">
                                    <div class="entry-footer">
                                        <div class="post-author">{{ $feed->Jobs[0]->company_name }}</div>
                                        <a href="#" class="post-date">{{ str_replace('-', ' ', date('Y-F-d', strtotime($feed->created_at))) }}</a>
                                    </div>
                                </div>

                                <div class="body">
                                    <div class="rate">
                                        @if ($feed->rate == 0)
                                            <img id="angry" src="{{ URL('storage/emojis/angry.png') }}" /> 
                                        @elseif ($feed->rate == 1)
                                            <img id="sad" src="{{ URL('storage/emojis/sad.png') }}" /> 
                                        @elseif ($feed->rate == 2)
                                            <img id="happy" src="{{ URL('storage/emojis/happy.png') }}" /> 
                                        @elseif ($feed->rate == 3)
                                            <img id="smile" src="{{ URL('storage/emojis/smiling.png') }}" /> 
                                        @elseif ($feed->rate == 4)
                                            <img id="lol" src="{{ URL('storage/emojis/lol.png') }}" /> 
                                        @endif
                                    </div>
                                    <div class="post-title">{{ $feed->feedback }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
        
            </div> <!-- .container -->
        </div> <!-- .page-section -->
    
        <div class="page-section client-section">
            <div class="container-fluid">
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 justify-content-center">
                    <div class="item wow zoomIn">
                        <img src="{{ URL('storage/img/clients/airbnb.png') }}" alt="">
                    </div>
                    <div class="item wow zoomIn">
                        <img src="{{ URL('storage/img/clients/google.png') }}" alt="">
                    </div>
                    <div class="item wow zoomIn">
                        <img src="{{ URL('storage/img/clients/stripe.png') }}" alt="">
                    </div>
                    <div class="item wow zoomIn">
                        <img src="{{ URL('storage/img/clients/paypal.png') }}" alt="">
                    </div>
                    <div class="item wow zoomIn">
                        <img src="{{ URL('storage/img/clients/mailchimp.png') }}" alt="">
                    </div>
                </div>
            </div> <!-- .container-fluid -->
        </div> <!-- .page-section -->
    </main>

    <footer class="page-footer">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-6 py-3">
                    <h3 style="text-align: {{ $align }}">
                    <a href="{{ route('UserHome') }}" class="navbar-brand">
                            @if (strtolower(language()->getCode()) == 'en')
                                {{ $title[0] }}<span class="text-primary">{{ $title[1] }}</span>
                            @elseif (strtolower(language()->getCode()) == 'ar')
                                <span class="text-primary">{{ $titleAr }}</span>
                            @endif
                        </a>
                    </h3>
                    <p style="text-align: {{ $align }}">{{ $descr }}</p>

                    <p style="text-align: {{ $align }}"><a href="#" >{{ $email }}</a></p>
                    <p style="text-align: {{ $align }}"><a href="#">{{ $phone1 }}</a></p>
                    <p style="text-align: {{ $align }}"><a href="#">{{ $phone2 }}</a></p>
                </div>

                <div class="col-lg-6 py-3">
                    <h5 style="text-align: {{ $align }}">{{ __('public.Quick Links') }}</h5>
                    <ul class="footer-menu">
                        <li style="text-align: {{ $align }}"><a href="#home">{{ __('public.Home') }}</a></li>
                        <li style="text-align: {{ $align }}"><a href="#about">{{ __('public.About') }}</a></li>
                        <li style="text-align: {{ $align }}"><a href="#whyus">{{ __('public.Why Choose Us') }}</a></li>
                        <li style="text-align: {{ $align }}"><a href="#contact">{{ __('public.Contact') }}</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-muted">
                @include('vendor.includes.footer')
            </div>
        </div> <!-- .container -->
        
    </footer> <!-- .page-footer -->


  <script src="{{ URL::asset('js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ URL::asset('js/all.min.js') }}"></script>
  <script src="{{ URL::asset('js/wow.bundle.min.js') }}"></script>
  <script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ URL::asset('js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ URL::asset('js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ URL::asset('js/google-maps.js') }}"></script>
  <script src="{{ URL::asset('js/theme.js') }}"></script>


</body>
</html>