 <header class="fbs__net-navbar navbar navbar-expand-lg dark" aria-label="freebootstrap.net navbar">
     <div class="container d-flex align-items-center justify-content-between">
         <!-- Start Logo-->
         <a class="navbar-brand w-auto" href="{{ url('/') }}">
             <img class="logo dark img-fluid" src="{{ asset('assets-guest/images/logo-dark.svg') }}" alt="Binadesa">
             <img class="logo light img-fluid" src="{{ asset('assets-guest/images/logo-light.svg') }}" alt="Binadesa">
         </a>
         <!-- End Logo-->

         <!-- Navigation -->
         <div class="ms-auto w-auto">
             <div class="header-social d-flex align-items-center gap-1">
                 <a class="btn btn-primary py-2" href="{{ route('kategoriberita.index') }}">Kembali</a>
             </div>
         </div>
     </div>
 </header>
