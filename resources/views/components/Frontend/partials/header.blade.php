


{{-- @dump($details) --}}
<header>
    <div class="subheader">
      <div class="sub-item">
        <p><i class="fa fa-phone m-2"></i> Hotline:  {{$details ? $details->office_one_phone ?? '01748986129' : '01748986129'}}</p>
        <a class="text-white" href="https://goo.gl/maps/Vj8DbK3zXB2gRtMU9">
            <p><i class="fa fa-map-marker m-2"></i> Lalbagh Dhaka</p></a>
        <a class="text-white" href="https://mail.google.com/mail/?view=cm&fs=1&to={{$details ? $details->email ?? 'shaajPlasticind@gmail.com' : 'shaajPlasticind@gmail.com'}}">
            <p><i class="fa fa-envelope m-2"></i>{{$details ? $details->email ?? 'shaajPlasticind@gmail.com' : 'shaajPlasticind@gmail.com'}}</p></a>
        <p></p>
        <p class="header-social-icon">
            <a href="{{$details? $details->whatsapp ?? 'https://wa.me/01748986129' :'https://wa.me/01748986129'}}"><i class="fab fa-whatsapp m-2"></i></a>
            <a href="{{$details? $details->facebook ?? 'https://www.facebook.com/shaajplastic' :'https://www.facebook.com/shaajplastic'}}"><i class="fab fa-facebook-f m-2"></i></a>
            <a href="{{$details? $details->twitter ?? 'https://wa.me/01748986129' :'https://wa.me/01748986129'}}"><i class="fab fa-twitter m-2"></i></a>
            <a href="{{$details? $details->youtube ?? 'https://wa.me/01748986129' :'https://wa.me/01748986129'}}"><i class="fab fa-youtube m-2"></i></a>

        </p>

        <div class="footer-buttons" style="margin-top: -10px">
          <button onClick="showModal()"><i class="fa fa-sms"></i> Send SMS</button>
          <a class="text-white" href="https://mail.google.com/mail/?view=cm&fs=1&to={{$details ? $details->email ?? 'shaajPlasticind@gmail.com' : 'shaajPlasticind@gmail.com'}}"> <button><i class="fa fa-envelope"></i> Send Email</button></a>

        </div>
      </div>
    </div>

    <div class="main-header">
      <div class="main-header-wrap">
        <!-- title for large secreen -->
        <div class="heading">
          <div class="heading-item">
            <div>
              <a href="{{Route('welcome')}}"
                ><img src="{{asset('frontend/images/logo1.png')}}" alt="" class="mt-2"
              /></a>
            </div>
            <div>
              <h2 class="heading-title xavier" {{-- style="font-family: Xavier  " --}}>Shaaj Plastic Industries</h2>
            </div>
           @livewire('search-input',['searchTerm' => $term ?? ''])
          </div>
        </div>
        <!-- title for large secreen -->

        <nav class="navbar navbar-expand-lg navbar-light bg-light container">
          <a class="navbar-brand" href="#"
            ><img src="images/logo1.png" alt="" class="small-logo"
          /></a>

          <!-- title for small screen initially it will be hide. when screen size will be 991px it will be show-->
          <div class="title-wrapepr">
            <div class="title">
              <h2 class="text-center">Shaaj Plastic Industries</h2>
            </div>
          </div>
          <!-- title for small screen -->

          <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span><i class="fas fa-bars bar"></i></span>
          </button>
          <div
            class="collapse navbar-collapse headerflex"
            id="navbarSupportedContent"
          >
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link {{$active ? $active == 'home' ? 'bg-info' : '' : ''}}" href="{{Route('welcome')}}"> Home</a>
              </li>

              <li class="nav-item ">
                <a class="nav-link {{$active ? $active == 'products' ? 'bg-info' : '' : ''}}" href="{{Route('products')}}"> Product</a>
              </li>

              <li class="nav-item ">
                <a class="nav-link {{$active ? $active == 'services' ? 'bg-info' : '' : ''}}" href="{{Route('services')}}">Services</a>
              </li>

              <li class="nav-item ">
                <a class="nav-link {{$active ? $active == 'about' ? 'bg-info' : '' : ''}}" href="{{Route('about')}}">About</a>
              </li>

              <li class="nav-item ">
                <a class="nav-link contact {{$active ? $active == 'contacts' ? 'bg-info' : '' : ''}}" href="{{Route('contacts')}}">Contacts</a>
              </li>

              <!-- <li class="nav-item">
            <a class="nav-link contact" href="signIn.html">Sign In</a>
          </li>
       -->

              <li>
                <div class="for-serch responsive">


                    @livewire('search-input',['searchTerm' => ''])


                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    @livewire('website-request-modal')
  </header>


 @push('scripts')
<script>

    function showModal(){
        Livewire.emit('showWebsiteModal')
    }
    </script>
@endpush
