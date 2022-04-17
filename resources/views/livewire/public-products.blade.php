<div>
 <!------------Sidebar Start-------------->

 <input type="checkbox" id="check">

 <label for="check">
      <i class="fas fa-bars" id="bars"></i>
      <i class="fas fa-times " id="close"></i>
 </label>


  <div class="sidebar">
      <h4>Our Product Range</h4>
 <ul>

   <div class="sidebar-search-bar collapse-li-first">
     <input type="search" placeholder="Search Products" wire:model="searchTerm">
     <i class="fa fa-search" wire:click="searchProduct()"></i>
   </div>
   @forelse ($categories as $category)


    <li href="#PlasticHangerForCollapse{{$category->id}}" data-toggle="collapse" class="">
      <a class="" >{{$category->name}} ({{$category->products->count()}})</a>
      <i class="fa fa-angle-down m-2 px-2 angle-sidebar"></i>
     </li>
     <div id="PlasticHangerForCollapse{{$category->id}}" class="collapse collapse-item-sidebar">
         @forelse ($category->products as $product)
         <li><a href="/products/{{$category->slug}}">{{$product->name}}</a></li>
         @empty
         <li><a href="/products/{{$category->slug}}">No Item</a></li>

         @endforelse

     </div>
     @empty
     <h1> No Item Found</h1>
 @endforelse


 </ul>
  </div>




  <!------------Sidebar End-------------->

  <section class="plastic-product container">
     <div class="plastic-product-wrapper">
       <div class="all-title">
         <h4 class="py-4 mt-5 text-center">{{$categoryName}}</h4>
       </div>




<div class="row">
    @forelse($products as $product)
    <div class="col-lg-6 col-md-6 col-12">
      <div class="product-outer-wrapper">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12">
            <div class="product-details-wrapper">
               <img src="{{asset($product->image)}}" alt="">
            </div>
          </div>

          <div class="col-lg-12 col-md-12 col-12">
            <div class="product-details-wrapper">
                <table class="table table-striped">
                    <tbody class="">
                        <tr>
                            <td>Usage/Application</td>
                            <td>{{$product->name}}</td>
                          </tr>
                          <tr>
                            <td>Color </td>
                            <td>{{$product->color}}</td>
                          </tr>
                          <tr>
                            <td>Brand</td>
                            <td>Shaaj Plastic Ind.</td>
                          </tr>
                          <tr>
                            <td>Product Code</td>
                            <td>{{$product->code}}</td>
                          </tr>
                          <tr>
                            <td>Packaging Type</td>
                            <td>{{$product->packaging}}</td>
                          </tr>
                          <tr>
                            <td>Material</td>
                            <td>{{$product->meterial}}</td>
                          </tr>
                      </tbody>
                </table>
            </div>
          </div>

        </div>

        <div class="request-button">
            <button type="button"  wire:loading.attr="disabled"  wire:click="showPriceForm({{$product->id}})"  wire:target="showPriceForm({{$product->id}})"> <i class="fa fa-envelope m-2" > </i> Get Best Price</button>
            <button type="button" wire:loading.attr="disabled" wire:click="showCallbackForm({{$product->id}}) " wire:target="showCallbackForm({{$product->id}})"> <i class="fa fa-phone m-2"></i> Request Callback</button>
        </div>

      </div>
    </div>
    @empty
    <h1 class="text-center">
        No Item Found
    </h1>
    @endforelse

    </div>





  </div> <!--main row-->






{{-- Modal --}}




        <div class="modal  fade" id="ModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog" role="document" >
              <div class="modal-content">

                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Request Price</h5>
                  <button type="button" class="btn-close close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
         @if ($thisProduct)



        <div class="row">
            <div class="col-md-3 ">
                <img style="max-height: 50%;max-height:50%" src="{{asset($thisProduct->image)}}" class="img-fluid" alt="">
            </div>
            <div class="col-md-9">
                <table class="table table-striped">

                     <tbody class="">
                       <tr>
                         <td>Usage/Application</td>
                         <td>{{$thisProduct->name}}</td>
                       </tr>
                       <tr>
                         <td>Color </td>
                         <td>{{$thisProduct->color}}</td>
                       </tr>
                       <tr>
                         <td>Brand</td>
                         <td>Shaaj Plastic Ind.</td>
                       </tr>
                       <tr>
                         <td>thisProduct Code</td>
                         <td>{{$thisProduct->code}}</td>
                       </tr>
                       <tr>
                         <td>Packaging Type</td>
                         <td>{{$thisProduct->packaging}}</td>
                       </tr>
                       <tr>
                         <td>Material</td>
                         <td>{{$product->meterial}}</td>
                       </tr>

                     </tbody>

                   </table>
            </div>

        </div>

        @endif
       <form autocomplete="off"  wire:submit.prevent="{{ $showCallModal ? 'requestCall' : 'requestPrice'   }}">
            @csrf

            <h4>Your Details</h4>
        <div class="container">
            <div class="mb-3">

                <label for="inputName" class="form-label">Name</label>
                <input type="text" id="inputName" wire:model.defer="request.name" class="form-control @error('request.name')
                is-invalid
                @enderror"  placeholder="Your Name">
                @error('request.name')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">

                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" id="inputEmail" wire:model.defer="request.email" class="form-control @error('request.email')
                is-invalid
                @enderror" placeholder="Your Email" >
                @error('request.email')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">

                <label for="inputPhone" class="form-label">Phone</label>
                <input type="tel" id="inputPhone" wire:model.defer="request.phone" class="form-control @error('request.phone')
                is-invalid
                @enderror"  placeholder="Your Phone">
                @error('request.phone')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">

                <label for="inputNote" class="form-label">Details</label>
                <textarea id="inputNote" wire:model.defer="request.note" class="form-control @error('request.note')
                is-invalid
                @enderror"  placeholder="What Ever On Your Mind..."></textarea>
                @error('request.note')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

















        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary" wire:loading.attr="disabled">Submit</button>
        </div>
    </form>
</div>
</div>
</div>








    </div>


</div>
</div>

@push('scripts')

<script>
        livewire.on('showModal',$event =>
        {
            if($event){
                livewire.emit('editRowMetarial',$event);
            }
            $('#ModalForm').modal('toggle');
        })
    </script>
       @endpush
