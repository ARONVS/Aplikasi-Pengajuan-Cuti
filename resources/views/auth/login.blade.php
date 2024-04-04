<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>{{ config('app.name') }}</title>
  <link rel="icon" type="image/png" href="{{url('assets/images/logoccuti.png')}}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{url('assets/css/rt-plugins.css">
  <link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet')}}">
  <link href="{{url('assets/plugins/notifications/css/lobibox.min.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{url('assets/css/app.css')}}">
  <!-- START : Theme Config js-->
  <script src="{{url('assets/js/settings.js')}}" sync></script>
  <!-- END : Theme Config js-->
</head>

<body class=" font-inter skin-default">
  <!-- [if IE]> <p class="browserupgrade">
            You are using an <strong>outdated</strong> browser. Please
            <a href="https://browsehappy.com/">upgrade your browser</a> to improve
            your experience and security.
        </p> <![endif] -->

  <div class="loginwrapper">
    <div class="lg-inner-column">
      <div class="right-column relative">
        <div class="inner-content h-full flex flex-col bg-white dark:bg-slate-800">
          <div class="auth-box h-full flex flex-col justify-center">
            <div class="mobile-logo text-center mb-6 lg:hidden block">
              <a href="index.html">
                <img src="{{url('assets/images/logo/logo.svg')}}" alt="" class="mb-10 dark_logo">
                <img src="{{url('assets/images/logo/logo-white.svg')}}" alt="" class="mb-10 white_logo">
              </a>
            </div>
            <div class="text-center 2xl:mb-10 mb-4">
              <h4 class="font-medium">Sign in</h4>
              <div class="text-slate-500 dark:text-slate-400 text-base">
                Sign in to your account to start using our App
              </div>
            </div>
            <!-- BEGIN: Login Form -->
            <form action="{{ route('login') }}" class="space-y-4" method="POST" >
            @csrf			
              <div class="fromGroup">
                <label class="block capitalize form-label">email</label>
                <div class="relative ">
                <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                 id="email" tabindex="1" value="{{ old('email') }}" required autocomplete="email" placeholder="email@address.com" aria-label="email@address.com">
                <span class="invalid-feedback">Please enter a valid email address.</span>
                @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror 
                </div>
              </div>
              <div class="fromGroup       ">
                <label class="block capitalize form-label  ">passwrod</label>
                <div class="relative "><input type="password" class="js-toggle-password form-control form-control-lg @error('password') is-invalid @enderror" name="password" id="password" placeholder="8+ characters required"  required autocomplete="current-password">
                <span class="invalid-feedback">Please enter a valid password.</span>
                @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror                  
				</div>
              </div>
              <div class="flex justify-between">
                <label class="flex items-center cursor-pointer">
                  <input type="checkbox" class="hiddens">
                  <span class="text-slate-500 dark:text-slate-400 text-sm leading-6 capitalize">Keep me signed in</span>
                </label>
              </div>
              <button type="submit"  class="btn btn-dark block w-full text-center">Sign in</button>
            </form>
            <!-- END: Login Form -->
            <div class=" relative border-b-[#9AA2AF] border-opacity-[16%] border-b pt-6">
              <div class=" absolute inline-block bg-white dark:bg-slate-800 left-1/2 top-1/2 transform -translate-x-1/2 px-4 min-w-max
                                    text-sm text-slate-500 dark:text-slate-400font-normal ">
                Login
              </div>
            </div>
            <div class="max-w-[242px] mx-auto mt-8 w-full">


              <!-- END: Social Log In Area -->
            </div>
            <div class="md:max-w-[345px] mt-6 mx-auto font-normal text-slate-500 dark:text-slate-400mt-12 uppercase text-sm">

            </div>
          </div>
          <div class="auth-footer text-center">
            Copyright 2023, {{ config('app.name') }} All Rights Reserved.
          </div>
        </div>
      </div>
      <div class="left-column bg-cover bg-no-repeat bg-center " style="background-image: url(assets/images/all-img/login-bg.png);">
        <div class="flex flex-col h-full justify-center">
          <div class="flex-1 flex flex-col justify-center items-center">
            <a href="#">
              <img src="{{url('assets//images/loginbanner.jpg')}}" alt="" class="mb-10">
            </a>
          </div>
          <div>
            <div class="black-500-title max-w-[525px] mx-auto pb-20 text-center">
              Welcome To
              <span class="text-white font-bold">Login Page</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- scripts -->
  <script src="{{url('assets/js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{url('assets/js/rt-plugins.js')}}"></script>
  <script src="{{url('assets/js/app.js')}}"></script>
        <script src="{{url('assets/plugins/notifications/js/lobibox.min.js')}}"></script>
        <script src="{{url('assets/plugins/notifications/js/notifications.min.js')}}"></script>   

        <script>
            @if (Session::has('success'))
                Lobibox.notify('success', {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    icon: 'bi bi-bookmark-check-fill',
                    msg: "{{ Session::get('success')}}"
                });
            @endif
        </script>
        <script>
            @if ($message = Session::get('error'))
            Lobibox.notify('error', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                icon: 'bi bi-bookmark-x',
                msg: "{{ Session::get('error')}}"
            });			
            @endif
        </script>  
  
</body>
</html>