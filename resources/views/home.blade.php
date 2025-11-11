@extends('layouts.dattaable')

@section('title', 'Home')

@section('content')
<header id="home" class="flex items-center flex-col justify-center overflow-hidden relative pt-[100px] sm:pt-[180px] pb-0 bg-theme-sidebarbg dark:bg-dark-500">
  {{-- Nav --}}
  <nav class="navbar group bg-theme-sidebarbg dark:bg-themedark-cardbg fixed top-0 z-50 w-full backdrop-blur shadow-[0_0_24px_rgba(27,46,94,.05)] dark:shadow-[0_0_24px_rgba(27,46,94,.05)] !bg-transparent">
    <div class="container">
      <div class="static flex py-4 items-center justify-between sm:relative">
        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-between">
          <div class="flex flex-shrink-0 items-center justify-between">
            <a href="#">
              <img class="w-[130px]" src="{{ asset('assets/dattaable/assets/images/logo-white.svg') }}" alt="Logo" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </nav>

  {{-- Hero section --}}
  <div class="container relative z-10">
    <div class="w-full md:w-10/12 text-center mx-auto">
      <h1 class="text-white text-[22px] md:text-[36px] lg:text-[48px] leading-[1.2] mb-5">
        Explore One of the
        <span class="text-transparent font-semibold bg-clip-text bg-gradient-to-r from-[rgb(37,161,244)] via-[rgb(249,31,169)] to-[rgb(37,161,244)] bg-[length:400%_100%] bg-left-top animate-[move-bg_24s_infinite_linear]">
          Featured Dashboard
        </span>
        Template in CodedThemes
      </h1>
      <p class="text-white/80 text-[14px] sm:text-[16px] mb-5">
        Datta Able is one of the featured admin dashboard templates with over 25K+ global users.
      </p>
      <a href="dashboard/index.html" class="btn rounded-full border border-white bg-white text-dark-500 hover:opacity-70 mr-2 mt-1">
        Live Preview
      </a>
    </div>
  </div>

  <img src="{{ asset('assets/dattaable/assets/images/landing/img-wave.svg') }}" alt="wave" class="absolute inset-x -bottom-px z-10" />
  <div class="absolute inset-0 bg-[linear-gradient(0deg,rgba(0,0,0,0.5019607843),transparent)] z-[1]"></div>
</header>
@endsection
            </div>
            </div>
        </div>
        </div>
    </header>
    <!-- [ Header ] end -->