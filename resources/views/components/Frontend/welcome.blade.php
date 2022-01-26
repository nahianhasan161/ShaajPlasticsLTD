<x-layout.master>






<x-Frontend.partials.header></x-Frontend.partials.header>


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

  <a href="{{route('products')}}">
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

<x-Frontend.partials.footer></x-Frontend.partials.footer>


</x-layout.master>
