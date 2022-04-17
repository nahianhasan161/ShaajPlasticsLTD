<x-layout.master>






<x-Frontend.partials.header :details="$details"  :active="$active" ></x-Frontend.partials.header>
<x-Frontend.partials.preloader></x-Frontend.partials.preloader>

 {{-- @dump($categor) --}}


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
           <img class="d-block w-100" src="{{asset($images ? $images->landing_one ?? 'frontend/images/caurasel1.jpg' :
               'frontend/images/caurasel1.jpg'

               )}}" alt="First slide">

          <p class="unic-border">
            {{$details ? $details->landing_title_one ?? '   Making your best ' : ' Making your best ' }}<br>
            {{$details ? $details->landing_title_two ?? '  HANGER & SUPERIOR friendship with us.' : '  HANGER & SUPERIOR friendship with us.' }}<br />
            {{$details ? $details->landing_title_three ?? '100% export oriented apparel hanger and poly bags manufacturer.' : '100% export oriented apparel hanger and poly bags manufacturer.'
        }}
          </p>
        </div>
        <div class="carousel-item">

          <img class="d-block w-100" src="{{asset($images ? $images->landing_two ?? 'Frontend/images/caurasel2.jpg' :
          'frontend/images/caurasel2.jpg'
              )}}" alt="Second slide">
          <p class="unic-border">
            Making your best <br />
            HANGER & SUPERIOR friendship with us. <br>
            {{$details ? $details->landing_title ?? '100% export oriented apparel hanger and poly bags manufacturer.' : '100% export oriented apparel hanger and poly bags manufacturer.'
        }}
          </p>
        </div>
        <div class="carousel-item">
          {{-- <img class="d-block w-100" src="{{asset('Frontend/images/caurasel3.jpg')}}" alt="Third slide"> --}}
          <img class="d-block w-100" src="{{asset($images ? $images->landing_three ?? 'frontend/images/caurasel3.jpg' :
          'frontend/images/caurasel3.jpg'
              )}}" alt="Third slide">
          <p class="unic-border">
            Making your best <br />
            HANGER & SUPERIOR friendship with us. <br>
            {{$details ? $details->landing_title ?? '100% export oriented apparel hanger and poly bags manufacturer.' : '100% export oriented apparel hanger and poly bags manufacturer.'
        }}
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
        <div class="col-lg-6 col-12 about-item mb-3" data-aos="zoom-in">
          <div class="about-single-item-wraper">
            <p class="about-img-bord">
                {{$details ? $details->aboutUs : '100% export oriented apparel hanger and poly bags manufacturer.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta
                    aperiam enim accusamus sapiente sequi, dolores fugit rerum
                    voluptas, veniam ad veritatis aut natus asperiores. Excepturi
                    ipsam quo, corrupti omnis optio accusamus dignissimos adipisci
                    laboriosam debitis iste eius. Officia, adipisci quisquam!'
                    }}

            </p>
          </div>
        </div>
        <div class="col-lg-6 col-12 about-item" data-aos="zoom-in">
          <div class="about-single-item-wraper">
            <img src="{{asset($images ? $images->office_one ?? 'frontend/images/office.jpg' :
            'frontend/images/office.jpg'
                )}}" alt="" class="border" />
          </div>
        </div>
      </div>


    </div>
  </section>
  <!------------ about us end------------->

  <!------------ our product start------------->
  <section class="product">
    <div class="all-title">
      <h4 class="py-5">Product</h4>
    </div>

    <div class="product-item container">
        @forelse ($categories as $category)
        <a href="/products/{{$category->slug}}">
     <div class="single-product" data-aos="flip-left">
            <img src="{{asset($category->image)}}" alt="" />
            <p>{{$category->name}}</p>

            <div class="single-product-inner">
              <h4>{{$category->name}}</h4>
             </a> <button class="get-quote"><a class="text-white" href="/products/{{$category->slug}}">Get Now</a></button>
            </div>

          </div>
         </a>
        @empty

        @endforelse



    </div>

    <a href="{{route('products')}}">
      <button class="all-product-btn">view all product</button>
    </a>
  </section>

  <!------------ our product end------------->

 <!-- tell us what are you looking for star-->

 <section class="lookin-main">
    <div class="what-looking container py-5">
      <h2>Tell Us What Are You Looking For ?</h2>
      <div class="row" data-aos="fade-up">
      @livewire('contact-us-form')
      </div>
    </div>
  </section>
  {{-- <div class=" py-5 contact-form" data-aos="zoom-in">
    <div class="col-12">
        <div class="contact-wrapper-form">

</div>
</div>
</div> --}}
  <!-- tell us what are you looking for end-->

<x-Frontend.partials.footer :categories=$categories :details=$details></x-Frontend.partials.footer>


</x-layout.master>
