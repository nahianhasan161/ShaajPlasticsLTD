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
                     <select id="order" class="custom-select @error('bill.order_id')
                     is-invalid
                     @enderror"  wire:model="bill.order_id">
                       <option value="">Please Select One</option>

                     @forelse ($orders as $order)
                       <option value="{{$order->id}}">{{$order->tracking_id}}</option>
                       @empty

                       @endforelse




                     </select>

                   @error('bill.order_id')

                   <div class="invalid-feedback">
                       {{$message}}
                   </div>
                   @enderror
                 </div>
               </div>
               <div class="form-row mx-3 my-2">


                   <label for="order" class="col-sm-2 col-form-label">Select Client</label>
                   <div class="col-sm-10">
                     <select id="order" class="custom-select @error('bill.client_id')
                     is-invalid
                     @enderror"  wire:model="bill.client_id">
                       <option value="">Please Select One</option>

                     @forelse ($clients as $client)
                       <option value="{{$client->id}}">{{$client->name}}</option>
                       @empty

                       @endforelse




                     </select>

                   @error('bill.client_id')

                   <div class="invalid-feedback">
                       {{$message}}
                   </div>
                   @enderror
                 </div>
               </div>
               <div class="form-row mx-3 my-2">


                   <label for="order" class="col-sm-2 col-form-label">Payment Type</label>
                   <div class="col-sm-10">
                     <select id="order" class="custom-select @error('bill.type')
                     is-invalid
                     @enderror"  wire:model="bill.type">
                       <option value="">Please Select One</option>


                       <option value="cash">Cash</option>
                       <option value="check">Check</option>





                     </select>

                   @error('bill.type')

                   <div class="invalid-feedback">
                       {{$message}}
                   </div>
                   @enderror
                 </div>
               </div>




           <div class="form-row mx-3 my-2">
               <label for="note" class="col-sm-2 col-form-label">Order Note</label>
               <div class="col-sm-10">

                 <textarea type="text" class="form-control @error('bill.note') is-invalid @enderror  " placeholder="Company Address" name="note" id="note" wire:model.defer="bill.note"></textarea>

                 @error('bill.note')

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

        <label for="quantity" class="col-sm-2 col-form-label">Product Quantity</label>
  <div class="col-sm-8">

    <input type="number"  class="form-control @error("deliveryProducts.".$index.".quantity") is-invalid @enderror  "  wire:key="{{$loop->index}}" placeholder="Product Quantity" name="productQuantity" id="productQuantity" wire:model="deliveryProducts.{{$index}}.quantity">

    @error("deliveryProducts.".$index.".quantity")

    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
            </div>

<div class="col-sm-2">


<select class="custom-select " disabled wire:key="{{$loop->index}}">




  <option value="1">{{unitHelper($partials[$index]['unitType']) }}</option>



</select>

</div>

</div>

<div class="form-row mx-3 my-2" >


    <label for="productName" class="col-sm-2 col-form-label">Price Per Pis</label>
    <div class="col-sm-10">
        <input type="number"  class="form-control   "  wire:key="{{$loop->index}}" placeholder="Total" name="productQuantity" id="productQuantity" disabled wire:model="partials.{{$index}}.priceByPis">
    </div>
    </div>
<div class="form-row mx-3 my-2" >


    <label for="productName" class="col-sm-2 col-form-label">Price by {{unitHelper($partials[$index]['unitType']) }}</label>
    <div class="col-sm-10">
        <input type="number"  class="form-control   "  wire:key="{{$loop->index}}" placeholder="Total" name="productQuantity" id="productQuantity" disabled wire:model="partials.{{$index}}.priceByType">
    </div>
    </div>
<div class="form-row mx-3 my-2" >


    <label for="productName" class="col-sm-2 col-form-label">Total Price</label>
    <div class="col-sm-10">
        <input type="number"  class="form-control   "  wire:key="{{$loop->index}}" placeholder="Total" name="productQuantity" id="productQuantity" disabled wire:model="partials.{{$index}}.priceTotal">
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
