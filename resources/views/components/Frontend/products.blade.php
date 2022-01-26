<x-layout.master>

  @push('css')

  <!------------ css link ------------>

  <link rel="stylesheet" href="{{asset('frontend/css/product.css')}}">

  <!------------ css link ------------>
  @endpush


 <x-Frontend.partials.header></x-Frontend.partials.header>
 <x-Frontend.partials.preloader></x-Frontend.partials.preloader>




<section class="product-section container mt-5">
  <div class="product-wrapper">
    <div class="all-title">
      <h4 class="py-4"> Our Products </h4>
    </div>


  <div class="row">
    <div class="col-xl-4 col-lg-4 col-lg-4 col-md-6 col-12 hanger-col">
       <div class="hanger-col-wrap">
          <a href="HangerProducts/palstic-cloth.html">
            <h4>Plastic Cloth Hanger</h4>
            <img src="{{asset('frontend/images/plasticH.jpg')}}" alt="">
          </a>
       </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-lg-4 col-md-6 col-12 hanger-col">
       <div class="hanger-col-wrap">
          <a href="./HangerProducts/bottom.html">
            <h4>Bottom Hanger</h4>
            <img src="{{asset('frontend/images/bottomH.jpg')}}" alt="">
          </a>
       </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-lg-4 col-md-6 col-12 hanger-col">
       <div class="hanger-col-wrap">
          <a href="./HangerProducts/hangerHook.html">
            <h4> Hanger Hooks</h4>
            <img src="{{asset('frontend/images/HangerHook.jpg')}}" alt="">
          </a>
       </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-lg-4 col-md-6 col-12 hanger-col">
       <div class="hanger-col-wrap">
          <a href="./HangerProducts/homeTex.html">
            <h4>Home & Text Hanger</h4>
            <img src="{{asset('frontend/images/homeH.png')}}" alt="">
          </a>
       </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-lg-4 col-md-6 col-12 hanger-col">
       <div class="hanger-col-wrap">
          <a href="./HangerProducts/multipack.html">
            <h4>Multi Pack Hangers</h4>
            <img src="{{asset('frontend/images/multiH.png')}}" alt="">
          </a>
       </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-lg-4 col-md-6 col-12 hanger-col">
       <div class="hanger-col-wrap">
          <a href="./HangerProducts/belt.html">
            <h4>Belt Hangers</h4>
            <img src="{{asset('frontend/images/belt.jpg')}}" alt="">
          </a>
       </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-lg-4 col-md-6 col-12 hanger-col">
       <div class="hanger-col-wrap">
          <a href="./HangerProducts/frock.html">
            <h4>Frock Hangers</h4>
            <img src="{{asset('frontend/images/frock.jpg')}}" alt="">
          </a>
       </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-lg-4 col-md-6 col-12 hanger-col">
       <div class="hanger-col-wrap">
          <a href="./HangerProducts/sizeHanger.html">
            <h4> Hanger Sizer</h4>
            <img src="{{asset('frontend/images/sizer.png')}}" alt="">
          </a>
       </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-lg-4 col-md-6 col-12 hanger-col">
       <div class="hanger-col-wrap">
          <a href="./HangerProducts/clip.html">
            <h4> Clip Hanger</h4>
            <img src="{{asset('frontend/images/clip.jpg')}}" alt="">
          </a>
       </div>
    </div>


  </div>


  </div>
</section>


<x-Frontend.partials.footer></x-Frontend.partials.footer>
<!-- footer end -->

</x-layout.master>
