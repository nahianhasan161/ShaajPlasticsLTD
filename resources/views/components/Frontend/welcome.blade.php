<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shaaj Plastic</title>
<!--------- Bootstrap link  ------------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!--------- Bootstrap link  ------------>

<!------------ css link ------------>
    <link rel="stylesheet" href="{{asset('frontend/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
<!------------ css link ------------>

<!-- ----ashley font------>
<link href="//db.onlinewebfonts.com/c/013e904f64d24e4b4e5f8db7bb96d9b9?family=Ashley+Inline" rel="stylesheet" type="text/css"/>
<!------ashley font---- -->

<!--------- google fonts --------->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<!--------- google fonts --------->



<!--------- font Awesome link  ------------>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<!--------- font Awesome link  ------------>

</head>
<body>





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
              <a class="nav-link" href="product.html">Product</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="service.html">Services</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>

            <li class="nav-item">
              <a class="nav-link contact" href="contact.html">Contacts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link contact" href="/login">login</a>
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

<div class="preloader"> <img src="{{asset('Frontend/images/logo1.png')}}" alt="" class="pre-img"></div>
<!-- This brake is used to lower the header photo -->
<br><br><br><br><br><br><br>
<!-- This brake is used to lower the header photo -->

<!-- header image part start -->
<!-- <section class="header-photo">
   <div class="header-photo-wraper">
    <div class="header-photo-item">
      <p class="unic-border">
        Making your best <br> HANGER & SUPERIOR friendship with us
      </p>

    </div>
   </div>
</section> -->

<section class="caurasel-main">
  <div class="header-photo-wraper">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{asset('Frontend/images/caurasel1.jpg')}}" alt="First slide">
          <p class="unic-border">

            Making your best <br> HANGER & SUPERIOR friendship with us
          </p>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('Frontend/images/caurasel2.jpg')}}" alt="Second slide">
          <p class="unic-border">
            Making your best <br> HANGER & SUPERIOR friendship with us
          </p>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('Frontend/images/caurasel3.jpg')}}" alt="Third slide">
          <p class="unic-border m-auto">
            Making your best <br> HANGER & SUPERIOR friendship with us
          </p>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
      </a>
    </div>
  </div>

</section>

<!-- header image part end -->

<!------------ about us start------------->
<section class="about-us">
  <div class="about-wraper container">
    <div class="all-title">
      <h4 class="py-4">About Us</h4>
    </div>
    <div class="row">
      <div class="col-lg-6 col-12 about-item mb-3 ">
       <div class="about-single-item-wraper">
        <p class="about-img-bord">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta aperiam enim accusamus sapiente sequi, dolores fugit rerum voluptas, veniam ad veritatis aut natus asperiores. Excepturi ipsam quo, corrupti omnis optio accusamus dignissimos adipisci laboriosam debitis iste eius. Officia, adipisci quisquam!</p>
       </div>
      </div>
      <div class="col-lg-6 col-12 about-item">
        <div class="about-single-item-wraper ">
           <img src="{{asset('Frontend/images/flower.jpg')}}" alt="" class="border">
        </div>

      </div>
    </div>

  <div class="our-client-index">
    <div class="client-title">
      <p class="" style="color:white;">Our Clients</p>
    </div>
  </div>

  <div class="client-item">
    <div class="client-logo">
       <div>
         <img src="{{asset('Frontend/images/bata.jpg')}}" alt="">
       </div>
       <div>
         <img src="{{asset('Frontend/images/appex.jpg')}}" alt="">
       </div>
       <div>
         <img src="{{asset('Frontend/images/daraz.jpg')}}" alt="">
       </div>
       <div>
         <img src="{{asset('Frontend/images/evaly.jpg')}}" alt="">
       </div>
       <div>
         <img src="{{asset('Frontend/images/lira.jpg')}}" alt="">
       </div>
    </div>
  </div>

  </div>
</section>
<!------------ about us end------------->


<!------------ our product start------------->
<section class="product ">
  <div class="all-title">
    <h4 class="py-5">Product</h4>
  </div>

  <div class="product-item container">
    <div class="single-product">
      <img src="{{asset('Frontend/images/product.jpg')}}" alt="">
      <p>Hook Top Hanger</p>
    </div>
    <div class="single-product">
      <img src="{{asset('Frontend/images/product2.jpg')}}" alt="">
      <p>Hook Top Hanger</p>
    </div>
    <div class="single-product">
      <img src="{{asset('Frontend/images/product3.jpg')}}" alt="">
      <p>Hook Top Hanger</p>
    </div>
    <div class="single-product">
      <img src="{{asset('Frontend/images/product4.jpg')}}" alt="">
      <p>Hook Top Hanger</p>
    </div>
    <div class="single-product">
      <img src="{{asset('Frontend/images/product5.jpg')}}" alt="">
      <p>Hook Top Hanger</p>
    </div>
    <div class="single-product">
      <img src="{{asset('Frontend/images/product6.jpg')}}" alt="">
      <p>Hook Top Hanger</p>
    </div>
    <div class="single-product">
      <img src="{{asset('Frontend/images/product.jpg')}}" alt="">
      <p>Hook Top Hanger</p>
    </div>

  </div>

  <a href="product.html">
    <button class="all-product-btn">view all product</button>
  </a>
</section>

<!------------ our product end------------->


<!-- tell us what are you looking for star-->

<section class="lookin-main">
  <div class="what-looking container  py-5">
    <h2>Tell Us What Are You Looking For ?</h2>
   <div class="row">
     <div class="col-lg-6 col-md-6 col-12">
        <div class="looking-item">
          <input type="tel" placeholder="Enter your mobile number">
          <input type="text" placeholder="Enter your name">
        </div>
     </div>

    <div class="col-lg-6 col-md-6 col-12">
       <div class="looking-item">
          <textarea placeholder="Describe your requirement in detail"></textarea>
       </div>
    </div>
       <button class="">submit</button>
   </div>
</div>
</section>



<!-- tell us what are you looking for end-->


<!-- footer start -->
<footer class="main-fotter pb-5">
  <div class="container">


<div class="fotter-content">

 <div class="row">

   <div class="col-lg-3 col-md-6">
      <div class="fotter-content-one">
        <h4>Shaaj Plastic Ind.</h4>
        <p>Anikul Islam (Proprietor)</p>
        <p>54, Khaje Dewan, 1st Lane</p>
        <p> Lalbagh Dhaka</p>
        <p>Hotline: 01748986129</p>
        <p> Corporate Brochure</p>
        <p>Contact Us</p>
        <p>Sitemap</p>
        <p>Privicy Policy</p>
      </div>
   </div>


   <div class="col-lg-3 col-md-6">
     <div class="fotter-content-one">
       <h4>Company Profile</h4>
       <p>Home</p>
       <p> Profile</p>
       <p>Our Product Range</p>
       <p>Corporate Video</p>
       <p>Corporate Presentation</p>
       <p> Corporate Brochure</p>
       <p>Contact Us</p>
       <p>Sitemap</p>
     </div>
  </div>




  <div class="col-lg-3 col-md-6">
   <div class="fotter-content-one">
     <h4>Products & Services</h4>
     <p>Plastic Cloth Hangers</p>
     <p>Bottom Hangers</p>
     <p>Hanger Hooks</p>
     <p>Multi Pack Hangers</p>
     <p>Plastic Top Hangers With Metal Hook</p>
     <p>Belt Hangers</p>
     <p>Frock Hangers</p>
     <p>Lingerie Hangers</p>
   </div>
</div>




<div class="col-lg-3 col-md-6">
 <div class="fotter-content-one">
   <h4>Corporate Video</h4>

   <div>
     <p>here will be video</p>
   </div>

 </div>
</div>


 </div>
</div>


</div>

<div class="footer-buttons container mt-4">
  <button><i class="fa fa-sms m-2"></i> Send SMS</button>
  <button><i class="fa fa-envelope m-2"></i> Send Email</button>
</div>

<div class="fotter-socialmedia container mt-4">
 <a href=""><i class="fab fa-linkedin"></i></a>
 <a href=""><i class="fab fa-facebook-f"></i></a>
 <a href=""><i class="fab fa-twitter"></i></a>
 <a href=""><i class="fab fa-instagram"></i></a>
</div>

<div class="top-icon">
  <a href="#">
    <i class="fa fa-angle-up"></i>
  </a>
</div>
</footer>
<!-- footer end -->

<!---- Bootstrap4 jquery proper and link start-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<!--Bootstrap4 jquery proper and link start -->

<script src="{{asset('frontend/js/index.js')}}"></script>
</body>
</html>
