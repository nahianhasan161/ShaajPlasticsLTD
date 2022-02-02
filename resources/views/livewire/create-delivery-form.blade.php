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

      <h4>Company Details</h4>
            <div class="form-row mx-3 my-2">


                <label for="company" class="col-sm-2 col-form-label">Select Company</label>
                <div class="col-sm-10">
                  <select id="company" class="custom-select @error('request.company_id')
                  is-invalid
                  @enderror"  wire:model.defer="request.company_id">
                    <option value="">Please Select One</option>

                  {{--   @forelse ($companies as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                    @empty

                    @endforelse
 --}}



                  </select>

                @error('request.company_id')

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
            <input type="text"  class="form-control @error('request.Name') is-invalid @enderror  " placeholder="Row Metarial request.Name" name="request.Name" id="request.Name" wire:model="request.Name">

            @error('request.deliveryByName')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
         </div>

            <div class="form-row mx-3 my-2">


              <label for="productPrice" class="col-sm-2 col-form-label">Number</label>
              <div class="col-sm-10">
              <input type="number" class="form-control @error('request.deliveryByNumber') is-invalid @enderror  " placeholder=" Production Price" name="request.deliveryByNumber" id="request.deliveryByNumber" wire:model="request.deliveryByNumber">

              @error('request.deliveryByNumber')

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
            <input type="text"  class="form-control @error('request.deliveryByName') is-invalid @enderror  " placeholder="Row Metarial request.deliveryByName" name="request.deliveryByName" id="request.deliveryByName" wire:model="request.deliveryByName">

            @error('request.deliveryByName')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
         </div>

         <div class="form-row mx-3 my-2">

            <label for="quantity" class="col-sm-2 col-form-label">Product Quantity</label>
      <div class="col-sm-10">

      <input type="number" class="form-control @error('request.deliveryToNumber') is-invalid @enderror" placeholder="Row Metarial deliveryToNumber" id="deliveryToNumber" wire:model="request.deliveryToNumber">

      @error('request.deliveryToNumber')

      <div class="invalid-feedback">
          {{$message}}
      </div>
      @enderror
  </div>
  </div>


  <h4>Product Details</h4>
  @foreach ($deliveryProducts as $index => $product)

<div class="card" wire:loading.class="text-muted" >

@dump("deliveryProducts.".$index.".name")
  <div class="form-row mx-3 my-2" >


    <label for="productName" class="col-sm-2 col-form-label">Product Name</label>
    <div class="col-sm-10">
    <input type="text"  class="form-control @error("deliveryProducts.".$index.".name") is-invalid @enderror  " wire:key="{{$loop->index}}" placeholder="Product Name" name="productName" id="productName" wire:model="deliveryProducts.{{$index}}.name">


    @error("deliveryProducts.".$index.".name")

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
 <button class="btn btn-primary" type="button" wire:loading.attr='disabled' wire:click.defer='delete({{$index}})'>Delete</button>
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
