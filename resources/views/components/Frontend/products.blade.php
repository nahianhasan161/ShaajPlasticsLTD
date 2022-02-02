<x-layout.master>

  @push('css')

  <!------------ css link ------------>

  <link rel="stylesheet" href="{{asset('frontend/css/product.css')}}">

  <!------------ css link ------------>
  @endpush


 <x-Frontend.partials.header></x-Frontend.partials.header>
 <x-Frontend.partials.preloader></x-Frontend.partials.preloader>




<section class="product-section container mt-5">
  <div class="product-wrapper">
    <div class="all-title">
      <h4 class="py-4"> Our Products </h4>
    </div>

@forelse ($categories->chunk(3) as $chunk)
<div class="row">
    @foreach ($chunk as $category)

    <div class="col-xl-4 col-lg-4 col-lg-4 col-md-6 col-12 hanger-col">
        <div class="hanger-col-wrap">
            <a href="/products/{{$category->slug}}">
                <h4>{{$category->name}}</h4>
                <img src="{{asset($category->image)}}" alt="">
            </a>
        </div>
    </div>
    @endforeach
@empty

       <h1 class="text-center">
        No Item Found
       </h1>


</div>
@endforelse


  </div>


  </div>
</section>


<x-Frontend.partials.footer></x-Frontend.partials.footer>
<!-- footer end -->

</x-layout.master>
