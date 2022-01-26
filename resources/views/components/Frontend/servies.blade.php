<x-layout.master>

  @push('css')

  <!------------ css link ------------>

  <link rel="stylesheet" href="{{asset('frontend/css/service.css')}}">

  <!------------ css link ------------>
  @endpush


 <x-Frontend.partials.header></x-Frontend.partials.header>


 <section class="services">
    <div class="service-wrapper container">


      <div class="client-title">
        <p class="">Our Services</p>
      </div>

      <div class="row service-row">
        <div class="col-lg-6 col-12 col-xl-4 items">
          <div class="service-item">
            <h2>Development</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis consectetur voluptate quisquam corporis nemo, velit veritatis, iste sapiente, praesentium similique dolorem. Iste itaque molestiae soluta, ut dicta debitis dolor officiis laudantium sed omnis quibusdam possimus nobis veniam vel quae aut?</p>
         </div>
        </div>

        <div class="col-lg-6 col-12 col-xl-4 items">
          <div class="service-item">
            <h2>Custom Made Hanger</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis consectetur voluptate quisquam corporis nemo, velit veritatis, iste sapiente, praesentium similique dolorem. Iste itaque molestiae soluta, ut dicta debitis dolor officiis laudantium sed omnis quibusdam possimus nobis veniam vel quae aut?</p>
         </div>
        </div>

        <div class="col-lg-6 col-12 col-xl-4 items">
          <div class="service-item">
            <h2>Sustainability</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis consectetur voluptate quisquam corporis nemo, velit veritatis, iste sapiente, praesentium similique dolorem. Iste itaque molestiae soluta, ut dicta debitis dolor officiis laudantium sed omnis quibusdam possimus nobis veniam vel quae aut?</p>
         </div>
        </div>
      </div>


    </div>
  </section>


<x-Frontend.partials.footer></x-Frontend.partials.footer>
<!-- footer end -->

</x-layout.master>
