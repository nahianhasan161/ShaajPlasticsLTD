
<header>
    <div class="subheader">
      <div class="sub-item">
        <p> <i class="fa fa-phone m-2"></i> Hotline: 01748986129</p>
        <p><i class="fa fa-map-marker m-2"></i> Lalbagh Dhaka</p>
        <p><i class="fa fa-envelope m-2"></i> shajPlasticind@gmail.com<p>
          <p>
            <i class="fab fa-facebook m-2"></i>
            <i class="fab fa-twitter m-2"></i>
            <i class="fab fa-youtube m-2"></i>
            <i class="fab fa-linkedin m-2"></i>
          </p>

          <div class="footer-buttons" style="margin-top: -10px;">
            <button><i class="fa fa-sms"></i> Send SMS</button>
            <button><i class="fa fa-envelope"></i> Send Email</button>
          </div>

      </div>
    </div>



    <div class="main-header">
      <div class="main-header-wrap">
  <!-- title for large secreen -->
        <div class="heading">
          <div class="heading-item">
            <div>
              <a href="#"><img src="{{asset('Frontend/images/logo1.png')}}" alt="" class="mt-2"></a>
            </div>
            <div>
              <h2 class="heading-title">Shaaj Plastic Industries</h2>
            </div>
            <div class="for-serch first-search-bar">
              <input type="search" placeholder="Search" class="searchbar">
            <i class="fa fa-search searchIcon"></i>
            </div>
          </div>
        </div>
   <!-- title for large secreen -->

        <nav class="navbar navbar-expand-lg navbar-light bg-light container">
          <a class="navbar-brand" href="#"><img src="{{asset('Frontend/images/logo1.png')}}" alt="" class="small-logo"></a>

  <!-- title for small screen initially it will be hide. when screen size will be 991px it will be show-->
            <div class="title-wrapepr">
              <div class="title">
                <h2 class="text-center">Shaaj Plastic Industries </h2>
              </div>
            </div>
  <!-- title for small screen -->

          <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fas fa-bars bar"></i></span>
        </button>
          <div class="collapse navbar-collapse headerflex" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

              <li class="nav-item active">
                <a class="nav-link bg-info" href="{{route('admin.dashboard')}}">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{route('products')}}">Product</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{route('services')}}">Services</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{route('about')}}">About</a>
              </li>

              <li class="nav-item">
                <a class="nav-link contact" href="{{route('contacts')}}">Contacts</a>
              </li>
              <li class="nav-item">
                <a class="nav-link contact" href="{{route('login')}}">login</a>
              </li>

              <!-- <li class="nav-item">
                <a class="nav-link contact" href="signIn.html">Sign In</a>
              </li>
           -->

              <li>
                <div class="for-serch responsive">
                  <input type="search" placeholder="Search" class="searchbar">
                <i class="fa fa-search searchIcon"></i>
                </div>
              </li>
            </ul>

          </div>
        </nav>
      </div>
    </div>
  </header>

  {{-- <div class="preloader"> <img src="{{asset('Frontend/images/logo1.png')}}" alt="" class="pre-img"></div>
  <!-- This brake is used to lower the header photo -->
  <br><br><br><br><br><br><br> --}}
