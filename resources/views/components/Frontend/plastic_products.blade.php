<x-layout.master>

  @push('css')

  <!------------ css link ------------>

  <link rel="stylesheet" href="{{asset('frontend/css/product.css')}}">

  <!------------ css link ------------>
  @endpush

  <x-Frontend.partials.header :term=$term :details="$details"  :active="$active" ></x-Frontend.partials.header>

 <x-Frontend.partials.preloader></x-Frontend.partials.preloader>


      @livewire('public-products',
      ['products' => $products,'categoryName' => $categoryName,'searchTerm' => $term ?? '']
      )


    </div>
  </section>





  <x-Frontend.partials.footer :categories=$categories :details=$details></x-Frontend.partials.footer>
<!-- footer end -->

</x-layout.master>
