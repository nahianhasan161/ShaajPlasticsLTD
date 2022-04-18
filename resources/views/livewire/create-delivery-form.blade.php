<div>
 {{--    <div>
        <div class="container m-3" wire:click ="showModal">
            <button type="button" class="btn btn-primary" >
                Create New Row Metarial
               </button>

        </div>
     <x-partials.modal> --}}



        <form autocomplete="off"  wire:submit.prevent="{{ false ? 'updateDelivery' : 'createDelivery' }}">
            @csrf

            <h4>Order Detials</h4>

            <div class="form-row mx-3 my-2">


                <label for="order" class="col-sm-2 col-form-label">Select Order</label>
                <div class="col-sm-10">
                  <select id="order" class="custom-select @error('request.order_id')
                  is-invalid
                  @enderror"  wire:model="request.order_id">
                    <option value="">Please Select One</option>

                  @forelse ($orders as $order)
                    <option value="{{$order->id}}">{{$order->tracking_id}}</option>
                    @empty

                    @endforelse




                  </select>

                @error('request.order_id')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
              </div>
            </div>




        <div class="form-row mx-3 my-2">
            <label for="note" class="col-sm-2 col-form-label">Order Note</label>
            <div class="col-sm-10">

              <textarea type="text" class="form-control @error('request.note') is-invalid @enderror  " placeholder="Company Address" name="note" id="note" wire:model.defer="request.note"></textarea>

              @error('request.note')

              <div class="invalid-feedback">
                 {{$message}}
              </div>
              @enderror
            </div>
            </div>








          <h5>Delivery By</h5>

          <div class="form-row mx-3 my-2">


            <label for="request.Name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control @error('request.delivery_by_name') is-invalid @enderror  " placeholder="Delivery Man Name" name="request.Name" id="request.Name" wire:model="request.delivery_by_name">

            @error('request.delivery_by_name')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
         </div>

            <div class="form-row mx-3 my-2">


              <label for="productPrice" class="col-sm-2 col-form-label">Number</label>
              <div class="col-sm-10">
              <input type="tel" class="form-control @error('request.delivery_by_phone') is-invalid @enderror  " placeholder=" Production Price" name="request.deliveryByPhone" id="request.deliveryByPhone" wire:model="request.delivery_by_phone">

              @error('request.delivery_by_phone')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>
           </div>


           <div class="form-row mx-3 my-2">
            <label for="note" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">

              <textarea type="text" class="form-control @error('request.delivery_by_address') is-invalid @enderror  " placeholder="Company Address" name="note" id="note" wire:model.defer="request.delivery_by_address"></textarea>

              @error('request.delivery_by_address')

              <div class="invalid-feedback">
                 {{$message}}
              </div>
              @enderror
            </div>
            </div>



          <h4>Delivery TO</h4>


          <div class="form-row mx-3 my-2">


            <label for="request.deliveryByName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
            <input type="text"  class="form-control @error('request.delivery_to_name') is-invalid @enderror  " placeholder="name" name="request.deliveryByName" id="request.deliveryByName" wire:model="request.delivery_to_name">

            @error('request.delivery_to_name')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
         </div>

         <div class="form-row mx-3 my-2">

            <label for="quantity" class="col-sm-2 col-form-label">Number</label>
      <div class="col-sm-10">

      <input type="tel" class="form-control @error('request.delivery_to_phone') is-invalid @enderror" placeholder="Row Metarial deliveryToPhone" id="deliveryToPhone" wire:model="request.delivery_to_phone">

      @error('request.delivery_to_phone')

      <div class="invalid-feedback">
          {{$message}}
      </div>
      @enderror
  </div>
  </div>

  <div class="form-row mx-3 my-2">
    <label for="note" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">

      <textarea type="text" class="form-control @error('request.delivery_to_address') is-invalid @enderror  " placeholder="Company Address" name="note" id="note" wire:model.defer="request.delivery_to_address"></textarea>

      @error('request.delivery_to_address')

      <div class="invalid-feedback">
         {{$message}}
      </div>
      @enderror
    </div>
    </div>


  <h4>Product Details</h4>

  @php
  if($selectedOrder ){

    $collection = collect($deliveryProducts );
  $collect = $collection->implode('order_product_id',',');

  $collected =explode(",",$collect);

  }
@endphp

  @foreach ($deliveryProducts as $index => $product)

<div class="card" wire:loading.class="text-muted" >

{{-- @dump("deliveryProducts.".$index.".name") --}}
  <div class="form-row mx-3 my-2" >


    <label for="productName" class="col-sm-2 col-form-label">Product Name</label>
    <div class="col-sm-10">

        {{-- {{$selectedOrder ? $selectedOrder->products : 'N/A'}} --}}
       <select class="custom-select @error("deliveryProducts.".$index.".order_product_id")
                  is-invalid
                  @enderror"  wire:key="{{$loop->index}}"  wire:model="deliveryProducts.{{$index}}.order_product_id">
                    <option value="">Please Select One</option>
                    {{-- @forelse($selectedOrder ? ($selectedOrder->products->except(array_diff_key($collected, array_flip([$index])))) : []  as $id => $productList) --}}
                    @forelse ( $products ? $products->except(array_diff_key($collected, array_flip([$index]))) : [] as $id => $productList)

                    <option value="{{$id}}">{{$productList}}</option>

                    @empty

                    @endforelse





                  </select>

                  @error("deliveryProducts.".$index.".order_product_id")

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror

  </div>
 </div>

  <div class="form-row mx-3 my-2">


    <label for="productQuantity" class="col-sm-2 col-form-label">Product Name</label>
    <div class="col-sm-10">
    <input type="number"  class="form-control @error("deliveryProducts.".$index.".quantity") is-invalid @enderror  "  wire:key="{{$loop->index}}" placeholder="Product Quantity" name="productQuantity" id="productQuantity" wire:model="deliveryProducts.{{$index}}.quantity">


    @error("deliveryProducts.".$index.".quantity")

    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
  </div>
 </div>
 @if (count($deliveryProducts ) > 1)

 <button class="btn btn-primary" type="button" wire:loading.attr='disabled' wire:click.defer='delete({{$index}})'>Delete</button>
 @endif
</div>
 @endforeach
 <button class="btn btn-primary" type="button"   wire:loading.attr='disabled'  wire:click.defer='addProduct'>Add Product</button>












        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary">Create</button>
        </div>
    </form>









     {{-- </x-partials.modal>
    </div> --}}


</div>
