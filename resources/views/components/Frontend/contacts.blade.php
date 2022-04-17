<x-layout.master>

  @push('css')

  <!------------ css link ------------>

  <link rel="stylesheet" href="{{asset('frontend/css/contact.css')}}">

  <!------------ css link ------------>
  @endpush


  <x-Frontend.partials.header :details="$details" :active="$active"></x-Frontend.partials.header>
 <x-Frontend.partials.preloader></x-Frontend.partials.preloader>

 <section class="contact-section container">
    <div class="contact-wrapper">
      <div class="all-title">
        <h4 class="py-4">Contact Us</h4>
      </div>
      <div class="row">
        <div class="col-12" data-aos="zoom-in">
            <div class="contact-wrapper pb-4">
              <h2 class="xavier">Shaaj Plastic Industries</h2>


              <h3>
                <i class="fa fa-check-circle text-primary"></i>Telephone
              </h3>
              <p> <i class="fas fa-phone text-danger"></i>
                {{ $details ? $details->office_one_phone ?? ' 01748-986129' : ' 01748-986129'}}
                </p>

              <h3> <i class="fa fa-check-circle text-primary"></i>Email</h3>
              <p> <i class="fas fa-envelope text-danger"></i>
                {{ $details ? $details->email ?? 'shaajPlasticind@gmail.com' : 'shaajPlasticind@gmail.com'}}

            </p>
            </div>
        </div>

        <div class="col-12" data-aos="zoom-in">
          <div class="office-address-wrapper">
            <div>
              <h3> <i class="fa fa-check-circle text-primary"></i>Head Office</h3>
            <p> <i class="fa fa-map-marker text-danger "></i>
                {{ $details ? $details->office_one_address ?? ' 54, Khaje Dewan, 1st Lane, Lalbagh Dhaka' : ' 54, Khaje Dewan, 1st Lane, Lalbagh Dhaka'}}
                </p>
            </div>

            <div data-aos="zoom-in">
              <img src="{{asset($images ? $images->office_one ?? 'frontend/images/client2.jpg' : 'frontend/images/client2.jpg')}}" alt="" class="">
            </div>
          </div>
        </div>

        <div class="col-12" data-aos="zoom-in">
          <div class="office-address-wrapper">

            <div data-aos="zoom-in">
              <img src="{{asset($images ? $images->office_two ??  'frontend/images/client.jpg' : 'frontend/images/client.jpg' )}}" alt="" class="">
            </div>

            <div>
              <h3> <i class="fa fa-check-circle text-primary"></i>Branch Office</h3>
            <p> <i class="fa fa-map-marker text-danger "></i> {{ $details ? $details->office_two_address?? "54, Khaje Dewan, 1st Lane, Lalbagh Dhaka" : "54, Khaje Dewan, 1st Lane, Lalbagh Dhaka"}}</p>
            </div>


          </div>
        </div>







      </div>

      <div class=" py-5 contact-form" data-aos="zoom-in">
        <div class="col-12">
            <div class="contact-wrapper-form">
      @livewire('website-contact-form')
    </div>
    </div>
    </div>
    </div>
  </section>




<div class="map container text-center">
    <div class="mapouter">
      <div class="gmap_canvas">
        <iframe class="mapsize" id="gmap_canvas" src="https://maps.google.com/maps?q=shaaj%20plastics&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
        </iframe>
        <a href="https://www.embedgooglemap.net/blog/divi-discount-code-elegant-themes-coupon/"></a>
        <br>
        <style>.mapouter{position:relative;text-align:right;}</style>
        <a href="https://www.embedgooglemap.net"></a>
        <style>.gmap_canvas {overflow:hidden;background:none!important; height: 600px !important;}
        </style>
      </div>
    </div>
  </div>





  <x-Frontend.partials.footer :categories=$categories :details=$details></x-Frontend.partials.footer>
<!-- footer end -->

</x-layout.master>
