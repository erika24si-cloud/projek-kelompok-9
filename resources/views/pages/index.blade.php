@extends('layouts.main')

@section('content')

  <!-- [ Pre-loader ] start -->
  <div class="loader-bg fixed inset-0 dark:bg-themedark-cardbg z-[1034]">
    <div class="loader-track h-[5px] w-full inline-block absolute overflow-hidden top-0">
      <div
        class="loader-fill w-[300px] h-[5px] bg-primary-500 absolute top-0 left-0 animate-[hitZak_0.6s_ease-in-out_infinite_alternate]">
      </div>
    </div>
  </div>
  <!-- [ Pre-loader ] End -->
  <!-- [ Header ] start -->
  
  <!-- [ Header ] End -->
   

  <!-- [ Main Content ] end -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>


  <!-- Required Js -->
  <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/icon/custom-icon.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
  <script src="{{ asset('assets/js/component.js') }}"></script>
  <script src="{{ asset('assets/js/theme.js') }}"></script>
  <script src="{{ asset('assets/js/script.js') }}"></script>
  <!-- [Page Specific JS] start -->
  <script src="{{ asset('assets/js/plugins/wow.min.js') }}"></script>
  <script>
    // Start [ Menu hide/show on scroll ]
    let ost = 0;
    document.addEventListener('scroll', function () {
      let cOst = document.documentElement.scrollTop;
      if (cOst == 0) {
        document.querySelector('.navbar').classList.add('!bg-transparent');
      } else if (cOst > ost) {
        document.querySelector('.navbar').classList.add('top-nav-collapse');
        document.querySelector('.navbar').classList.remove('default');
        document.querySelector('.navbar').classList.remove('!bg-transparent');
      } else {
        document.querySelector('.navbar').classList.add('default');
        document.querySelector('.navbar').classList.remove('top-nav-collapse');
        document.querySelector('.navbar').classList.remove('!bg-transparent');
      }
      ost = cOst;
    });
    // End [ Menu hide/show on scroll ]
    var wow = new WOW({
      animateClass: 'animate__animated'
    });
    wow.init();
  </script>
  <!-- [Page Specific JS] end -->

@endsection
