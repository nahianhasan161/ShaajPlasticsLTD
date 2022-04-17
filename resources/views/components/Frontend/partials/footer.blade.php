
 <!-- footer start -->
<footer class="main-fotter pb-5">
  <div class="container" data-aos="fade-up">

   <div class="footer-button-And-Social">
    <div class="footer-buttons container mt-4">

      <button onClick="showModal()"><i class="fa fa-sms m-2"></i> Send SMS</button>
      <a class="text-white" href="https://mail.google.com/mail/?view=cm&fs=1&to={{$details ? $details->email ?? 'shaajPlasticind@gmail.com' : 'shaajPlasticind@gmail.com'}}"><button><i class="fa fa-envelope m-2"></i> Send Email</button></a>
    </div>

    <div class="fotter-socialmedia container mt-4">
      <a href="{{$details? $details->whatsapp ?? 'https://wa.me/01748986129' :'https://wa.me/01748986129'}}"><i class="fab fa-whatsapp"></i></a>
      <a href="{{$details? $details->facebook ?? 'https://www.facebook.com/shaajplastic' :'https://www.facebook.com/shaajplastic'}}"><i class="fab fa-facebook-f"></i></a>
      <a href="{{$details? $details->twitter ?? 'https://wa.me/01748986129' :'https://wa.me/01748986129'}}"><i class="fab fa-twitter"></i></a>
      <a href="{{$details? $details->youtube ?? 'https://wa.me/01748986129' :'https://wa.me/01748986129'}}"><i class="fab fa-youtube"></i></a>
    </div>
   </div>

    <div class="fotter-content">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="fotter-content-one">
            <h4 class="xavier">Shaaj Plastic Ind.</h4>
            <p>Habibur Rahman (Propietor)</p>
            <p><strong>Factory Unit 1 :</strong>
                {{$details?$detials->office_one_address??'17/1,khaje dewan,1st lane Lalbagh,dhaka':'17/1,khaje dewan,1st lane Lalbagh,dhaka'}}</p>
               <p> <strong>Phone :{{$details?$detials->office_one_phone??'01748986129':'01748986129'}}</strong></p>
            <p><strong>Factory Unit 2 :</strong> {{$details?$detials->office_two_address??'Dakkhin Daudpur,Bhatpara Panchdona,Narshingdi':'Dakkhin Daudpur,Bhatpara Panchdona,Narshingdi'}}</p>
          <p> <strong>Phone :{{$details?$detials->office_two_phone??'01748986129':'01748986129'}}</strong></p>


            {{-- <p>Privicy Policy</p> --}}
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="fotter-content-one">
            <h4>Company Profile</h4>
            @auth

            <p><a class="text-white" href="{{route('admin.dashboard')}}">Home</a></p>
            @else
            <p><a class="text-white" style="text-decoration: none" href="{{route('login')}}">Login</a></p>

            @endauth
            <p><a class="text-white" href="{{route('products')}}">Product</a></p>
            <p><a class="text-white" href="{{route('services')}}">Services</a></p>
            <p><a class="text-white" href="{{route('about')}}">About</a></p>
            <p><a class="text-white" href="{{route('contacts')}}">Contact Us</a></p>
            <p><a class="text-white" href="{{route('contacts')}}">Google Map</a></p>


          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="fotter-content-one">
            <h4>Products & Services</h4>

            @forelse ( $categories ? $categories->take(5) : $categories  as $category)
           <a href="/products/{{$category->slug}}"><p>  {{$category->name}}</p></a>
            @empty
            <p>No Products Found</p>
            @endforelse


          </div>
        </div>

        <div class="col-lg-3 col-md-6">

          <div class="fotter-content-one">

            <h4>Corporate Video</h4>

            <div>
                @if ($details)
                @if ($details->youtube_link)
                <iframe width="380" height="315" src="{{$details->youtube_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @endif
                @endif

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div> -->

  <div class="top-icon">
    <a href="#">
      <i class="fa fa-angle-up"></i>
    </a>
  </div>
</footer>
<!-- footer end -->
