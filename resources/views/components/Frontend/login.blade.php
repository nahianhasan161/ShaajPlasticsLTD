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

      </div>
    </section>




  <x-Frontend.partials.footer></x-Frontend.partials.footer>
  <!-- footer end -->

  </x-layout.master>
