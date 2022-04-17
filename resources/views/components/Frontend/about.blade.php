<x-layout.master>

  @push('css')

  <!------------ css link ------------>

  <link rel="stylesheet" href="{{asset('frontend/css/about.css')}}">

  <!------------ css link ------------>
  @endpush


  <x-Frontend.partials.header :details="$details" :active="$active"></x-Frontend.partials.header>
 <x-Frontend.partials.preloader></x-Frontend.partials.preloader>




 <section class="about-section container mt-5">
    <div class="about-sec-wrapper">
      <div class="all-title">
        <h4 class="py-4">About Us</h4>
      </div>

      <div class="row">
        <div class="col-lg-6 col-12 about-item mb-3 " data-aos="zoom-in">
         <div class="about-single-item-wraper">
          <p class="about-img-bord">{{$details ? $details->aboutUs : '100% export oriented apparel hanger and poly bags manufacturer.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta
            aperiam enim accusamus sapiente sequi, dolores fugit rerum
            voluptas, veniam ad veritatis aut natus asperiores. Excepturi
            ipsam quo, corrupti omnis optio accusamus dignissimos adipisci
            laboriosam debitis iste eius. Officia, adipisci quisquam!'
            }}</p>
         </div>
        </div>
        <div class="col-lg-6 col-12 about-item" data-aos="zoom-out">
          <div class="about-single-item-wraper ">
             <img src="{{asset($images ? $images->about ?? 'frontend/images/office.jpg' : 'frontend/images/office.jpg' )}}" alt="" class="about-img-bord border">
          </div>

        </div>
      </div>



    <section class="py-5 container">
      <div>
        <div class="row">
          <div class="col-12 col-md-6" data-aos="fade-up">
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
          <div class="col-12 col-md-6" data-aos="fade-up">
            <div class="progress-side">
              <div class="inner-progress-side">
                <h4>{{$details? $details->feature->title_one ?? 'Regulation standards' : 'Regulation standards' }}</h4>
                <p>{{$details? $details->feature->description_one ?? 'Shaaj Plastic Industries group we take cleaning, health and safety matters under very serious supervision. In keeping a well functioning work environment.' : 'Shaaj Plastic Industries group we take cleaning, health and safety matters under very serious supervision. In keeping a well functioning work environment.' }}
                    </p>
              </div>

              <div class="inner-progress-side">
                <h4>{{$details? $details->feature->title_two ?? 'Lasting & Long Term' : 'Lasting & Long Term' }}</h4>
                <p>{{$details? $details->feature->description_two ?? 'Shaaj Plastic Industries group we take cleaning, health and safety matters under very serious supervision. In keeping a well functioning work environment.' : 'Shaaj Plastic Industries group we take cleaning, health and safety matters under very serious supervision. In keeping a well functioning work environment.' }} </p>
              </div>

              <div class="inner-progress-side">
                <h4>{{$details? $details->feature->title_three ?? 'Easy and Affortable' : 'Easy and Affortable' }}</h4>
                <p>{{$details ? $details->feature->description_three ?? 'Shaaj Plastic Industries group we take cleaning, health and safety matters under very serious supervision. In keeping a well functioning work environment.' : 'Shaaj Plastic Industries group we take cleaning, health and safety matters under very serious supervision. In keeping a well functioning work environment.' }}

                    </p>
              </div>

           </div>
          </div>
        </div>
      </div>
    </section>

  <section class="our-network container pb-4">
    <div class="network-wrap">
       <div class="row">
         <div class="col-12 col-md-6" data-aos="fade-right">
           <div class="network-inner-wrap">
             <img src="{{asset($images ? $images->landing_distribution ?? 'Frontend/images/map.jpg' : 'Frontend/images/map.jpg' )}}" alt="">
           </div>
         </div>
         <div class="col-12 col-md-6" data-aos="fade-up">
           <div class="network-inner-wrap">
             <h3>{{$details? $details->distribution_title ?? 'Our Distribution Network' : 'Our Distribution Network' }}</h3>
             <p>{{$details? $details->distribution_description ?? 'Shaaj Distribution Network is active all over in Bangladesh. It has a wide and extensive distribution network with which it enjoys a close working relationship, and which benefits from its support and expertise. On our network map you will find a list of Lira distributors point, by country, with the relevant contact details' : 'Shaaj Distribution Network is active all over in Bangladesh. It has a wide and extensive distribution network with which it enjoys a close working relationship, and which benefits from its support and expertise. On our network map you will find a list of Lira distributors point, by country, with the relevant contact details' }}
                </p>
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
        <div class="col-12 col-lg-4 wrap-cert-item" data-aos="flip-left">
          <div class="single-certificate">
            <img src="{{asset($images ? $images->certificate_one ?? 'Frontend/images/certificate1.jpg' : 'Frontend/images/certificate1.jpg')}}" alt="">
          </div>
        </div>
        <div class="col-12 col-lg-4 wrap-cert-item" data-aos="flip-up">
          <div class="single-certificate">
            <img src="{{asset($images ? $images->certificate_two ?? 'Frontend/images/certificate2.jpg' : 'Frontend/images/certificate2.jpg')}}" alt="">
          </div>
        </div>
        <div class="col-12 col-lg-4 wrap-cert-item" data-aos="flip-right">
          <div class="single-certificate">
            <img src="{{asset($images ? $images->certificate_three ?? 'Frontend/images/certificate3.jpg' : 'Frontend/images/certificate3.jpg' )}}" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

    </div>
  </section>



  <x-Frontend.partials.footer :categories=$categories :details=$details></x-Frontend.partials.footer>
<!-- footer end -->

</x-layout.master>
