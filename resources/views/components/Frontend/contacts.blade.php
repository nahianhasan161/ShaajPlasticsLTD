<x-layout.master>

  @push('css')

  <!------------ css link ------------>

  <link rel="stylesheet" href="{{asset('frontend/css/contact.css')}}">

  <!------------ css link ------------>
  @endpush


 <x-Frontend.partials.header></x-Frontend.partials.header>
 <x-Frontend.partials.preloader></x-Frontend.partials.preloader>




 <section class="contact-section container  mt-5">
    <div class="contact-wrapper">
      <div class="all-title">
        <h4 class="py-4">Contact Us</h4>
      </div>
      <div class="row">
        <div class="col-12 col-lg-6 col-lg-6">
            <div class="contact-wrapper pb-4">
              <h2>Shaaj Plastic Industries</h2>
              <!-- <h3> <i class="fa fa-check-circle text-primary"></i>Phone</h3>
              <p class="m-3"> 01916891765</p> -->

              <h3> <i class="fa fa-check-circle text-primary"></i>Head Office</h3>
              <p> <i class="fa fa-map-marker text-danger "></i> 54, Khaje Dewan, 1st Lane, Lalbagh Dhaka</p>


              <h3> <i class="fa fa-check-circle text-primary"></i>Telephone</h3>
              <p> <i class="fas fa-phone text-danger"></i> 01748-986129</p>

              <h3> <i class="fa fa-check-circle text-primary"></i>Email</h3>
              <p> <i class="fas fa-envelope text-danger"></i>  shajPlasticind@gmail.com</p>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-lg-6">
           <div class="contact-wrapper ">
            <input type="text" placeholder="name">
            <input type="email" placeholder="email">
            <textarea name="" id="" placeholder="write something"></textarea>
            <button class="submit mb-4">Submit</button>
           </div>
        </div>
      </div>
    </div>
  </section>




<x-Frontend.partials.footer></x-Frontend.partials.footer>
<!-- footer end -->

</x-layout.master>
