<x-layout.master>

  @push('css')

  <!------------ css link ------------>

  <link rel="stylesheet" href="{{asset('frontend/css/about.css')}}">

  <!------------ css link ------------>
  @endpush


 <x-Frontend.partials.header></x-Frontend.partials.header>
 <x-Frontend.partials.preloader></x-Frontend.partials.preloader>




 <section class="about-section container mt-5">
    <div class="about-sec-wrapper">
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
             <img src="{{asset('Frontend/images/flower.jpg')}}" alt="" class="about-img-bord border">
          </div>

        </div>
      </div>

      <!-- <div class="client-review">
        <div class="client-title">
          <p class="">Client Testimonial</p>
        </div>

        <div class="caurasel-wrapper">
           <div class="row">
             <div class="col-lg-4 col-md-6">
               <div class="caurasel-wrap">
                 <img src="{{asset('Frontend/images/client.jpg')}}" alt="">
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, quod aperiam nesciunt dignissimos rem maiores repellendus nemo dolorum eligendi a.</p>
                 <div>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-half-alt"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>

                </div>
                 <h3>Nahiyan Hasan</h3>
               </div>
             </div>
             <div class="col-lg-4 col-md-6">
               <div class="caurasel-wrap">
                 <img src="{{asset('Frontend/images/client2.jpg')}}" alt="">
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, quod aperiam nesciunt dignissimos rem maiores repellendus nemo dolorum eligendi a.</p>
                 <div>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                 <h3>Anikul Islam</h3>
               </div>
             </div>
             <div class="col-lg-4 col-md-6">
               <div class="caurasel-wrap ">
                 <img src="{{asset('Frontend/images/client3.jpg')}}" alt="">
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, quod aperiam nesciunt dignissimos rem maiores repellendus nemo dolorum eligendi a.</p>
                 <div>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                 </div>
                 <h3>Raihan Ahmed</h3>
               </div>
             </div>
           </div>
        </div>



      </div> -->

    <section class="py-5 container">
      <div>
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="progress-wrap">
              <ul>
                <li class="production">Production</li>
                <li class="epc">EPC Works</li>
                <li class="customer">Customer Satisfaction</li>
                <li class="rate">Utilizaion Rate</li>
                <li class="pro-done">Project Done</li>
                <li class="trusted-client">Trusted Client</li>
              </ul>
           </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="progress-side">
              <div class="inner-progress-side">
                <h4>Regulation standards</h4>
                <p>Shaaj Plastic Industries group we take cleaning, health and safety matters under very serious supervision. In keeping a well functioning work environment.</p>
              </div>

              <div class="inner-progress-side">
                <h4>Lasting & Long Term</h4>
                <p>Shaaj Plastic Industries group we take cleaning, health and safety matters under very serious supervision. In keeping a well functioning work environment.</p>
              </div>

              <div class="inner-progress-side">
                <h4>Easy and Affortable</h4>
                <p>Shaaj Plastic Industries group we take cleaning, health and safety matters under very serious supervision. In keeping a well functioning work environment.</p>
              </div>

           </div>
          </div>
        </div>
      </div>
    </section>

  <section class="our-network container pb-4">
    <div class="network-wrap">
       <div class="row">
         <div class="col-12 col-md-6">
           <div class="network-inner-wrap">
             <img src="{{asset('Frontend/images/map.jpg')}}" alt="">
           </div>
         </div>
         <div class="col-12 col-md-6">
           <div class="network-inner-wrap">
             <h3>Our Distribution Network</h3>
             <p>Shaaj Distribution Network is active all over in Bangladesh. It has a wide and extensive distribution network with which it enjoys a close working relationship, and which benefits from its support and expertise. On our network map you will find a list of Lira distributors point, by country, with the relevant contact details</p>
           </div>
         </div>
       </div>
    </div>
  </section>

  <section class="our-certification">

    <h4 class="text-center pb-5">
      Our certifications
    </h4>
    <div class="certificate-wrapper">
      <div class="row">
        <div class="col-12 col-lg-4 wrap-cert-item">
          <div class="single-certificate">
            <img src="{{asset('Frontend/images/certificate1.jpg')}}" alt="">
          </div>
        </div>
        <div class="col-12 col-lg-4 wrap-cert-item">
          <div class="single-certificate">
            <img src="{{asset('Frontend/images/certificate2.jpg')}}" alt="">
          </div>
        </div>
        <div class="col-12 col-lg-4 wrap-cert-item">
          <div class="single-certificate">
            <img src="{{asset('Frontend/images/certificate3.jpg')}}" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

    </div>
  </section>



<x-Frontend.partials.footer></x-Frontend.partials.footer>
<!-- footer end -->

</x-layout.master>
