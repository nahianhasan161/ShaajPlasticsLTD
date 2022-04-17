<x-layout.master>

  @push('css')

  <!------------ css link ------------>

  <link rel="stylesheet" href="{{asset('frontend/css/service.css')}}">

  <!------------ css link ------------>
  @endpush


  <x-Frontend.partials.header :details="$details" :active="$active" ></x-Frontend.partials.header>
 <x-Frontend.partials.preloader></x-Frontend.partials.preloader>

 <section class="services">
    <div class="service-wrapper container">


      <div class="product-wrapper">
        <div class="all-title">
          <h4 class="py-4"> Our Services </h4>
        </div>

      <div class="row service-row">
        <div class="col-lg-6 col-12 col-xl-4 items" data-aos="zoom-in">
          <div class="service-item">
            <h2>{{$details ? $details->service->title_one ?? 'Development' :  'Development'}}</h2>
            <p>{{$details ? $details->service->description_one ??
             'We promise and deliver a timely delivery, delivering our products within the agreed time-frame. You may make your order and resut assured that the products are already being processed and made ready to delivered, if not already delivering. Our services promise immediate processing and action, so once you order, all you have to do is sit back and relax!'
             :
             'We promise and deliver a timely delivery, delivering our products within the agreed time-frame. You may make your order and resut assured that the products are already being processed and made ready to delivered, if not already delivering. Our services promise immediate processing and action, so once you order, all you have to do is sit back and relax!'
             }}
                </p>
         </div>
        </div>

        <div class="col-lg-6 col-12 col-xl-4 items" data-aos="fade-up">
          <div class="service-item">
            <h2>{{$details ? $details->service->title_two ?? 'Custom Made Hanger' :  'Custom Made Hanger'}}</h2>
            <p>{{$details ? $details->service->description_two ??
            'Here at Shaaj Plastic Industries, we are able to manifacture our hangers to your specific needs and adjust the production process accordingly. With prior discussion, we can take custom designs as well as requests for custom functionalities and make them a reality, suiting every kind of needs you may possibly have and will have in the future.

'
            :
             'Here at Shaaj Plastic Industries, we are able to manifacture our hangers to your specific needs and adjust the production process accordingly. With prior discussion, we can take custom designs as well as requests for custom functionalities and make them a reality, suiting every kind of needs you may possibly have and will have in the future.

'}}
            </p>
         </div>
        </div>

        <div class="col-lg-6 col-12 col-xl-4 items" data-aos="zoom-in">
          <div class="service-item" >
            <h2>{{$details ? $details->service->title_three ?? 'Sustainability' :  'Sustainability'}}</h2>
            <p>{{$details ? $details->service->description_three ??
             'While providing the best products, we maintain a competitive price, with quality-to-price ratios never before seen in the market. We use quality materials recognized throughout the industry while also cutting down costs wherever possible to ensure a price that will suit your needs just as much as the products themselves.this is what makes us different from others. '
             :
             'While providing the best products, we maintain a competitive price, with quality-to-price ratios never before seen in the market. We use quality materials recognized throughout the industry while also cutting down costs wherever possible to ensure a price that will suit your needs just as much as the products themselves.this is what makes us different from others. '
               }}</p>
         </div>
        </div>

        <div class="col-lg-6 col-12 col-xl-4 items" data-aos="zoom-in">
          <div class="service-item" >
            <h2>{{$details ? $details->service->title_four ?? 'Timely Delevery' :  'Timely Delevery'}}</h2>
            <p>{{$details ? $details->service->description_four ?? 'Timely Delevery' :  'e promise and deliver a timely delivery, delivering our products within the agreed time-frame. You may make your order and resut assured that the products are already being processed and made ready to delivered, if not already delivering. Our services promise immediate processing and action, so once you order, all you have to do is sit back and relax!'}}</p>
         </div>
        </div>



          <div class="col-lg-6 col-12 col-xl-4 items" data-aos="zoom-in">
            <div class="service-item" >
              <h2> {{$details ? $details->service->title_five ?? 'Competitive Price' :  'Competitive Price'}}</h2>
              <p>{{$details ? $details->service->description_five ?? 'Competitive Price' :  'While providing the best products, we maintain a competitive price, with quality-to-price ratios never before seen in the market. We use quality materials recognized throughout the industry while also cutting down costs wherever possible to ensure a price that will suit your needs just as much as the products themselves.And also not losing any. '}}</p>
           </div>
          </div>

          <div class="col-lg-6 col-12 col-xl-4 items" data-aos="zoom-in">
            <div class="service-item" >
              <h2> {{$details ? $details->service->title_six ?? 'Quick Sampling Service' :  'Quick Sampling Service'}}</h2>
              <p>{{$details ? $details->service->description_six ?? 'Quick Sampling Service' :  'With an order for a custom hanger, we ensure a speedy sampling process so that our clients may be able to make a more informed decision, faster. We provide necessary samples sooner than any competitors and give our clients an accurate view of what products they’re dealing with.I can assure you our samples will encourage you of doing business with us'}}</p>
           </div>
          </div>

      </div>


    </div>
  </section>

<!-- delevery background -->
<section class="delever">
    <div class="delevery">
      <div class="container position-relative" >
        <img src="{{asset('frontend/images/delevery2.png')}}" alt="" class="delevery-car container">
      </div>
    </div>

    <div class="under-photo">

    </div>
    </section>
    <!-- delevery background -->

    <x-Frontend.partials.footer :categories=$categories :details=$details></x-Frontend.partials.footer>
<!-- footer end -->

</x-layout.master>
