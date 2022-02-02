<x-layout.master>

  @push('css')

  <!------------ css link ------------>

  <link rel="stylesheet" href="{{asset('frontend/css/product.css')}}">

  <!------------ css link ------------>
  @endpush


 <x-Frontend.partials.header></x-Frontend.partials.header>
 <x-Frontend.partials.preloader></x-Frontend.partials.preloader>

 <section class="plastic-product container">
    <div class="plastic-product-wrapper">
      <div class="all-title">
        <h4 class="py-4 text-center">{{$categoryName}}</h4>
      </div>

 @livewire('public-products',
 ['products' => $products]
 )

    </section>

<x-Frontend.partials.footer></x-Frontend.partials.footer>
<!-- footer end -->

</x-layout.master>
