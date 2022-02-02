<div>
    {{-- <div>
        <div class="container m-3" wire:click ="createModalButton">
            <button type="button" class="btn btn-primary" >
                Create New Row Metarial
               </button>

        </div>
     <x-partials.modal> --}}


        <div class="card container ">

            <div class="card container mt-3">

             <form autocomplete="off"  wire:submit.prevent="{{ false ? 'updateOrder' : 'createOrder' }}">
                @csrf

            <h2 class="text-center">Company Details</h2>
            <div class="form-row mx-3 my-2">


                <label for="company" class="col-sm-2 col-form-label">Select Company</label>
                <div class="col-sm-10">
                  <select id="company" class="custom-select @error('request.company_id')
                  is-invalid
                  @enderror"  wire:model.defer="request.company_id">
                    <option value="">Please Select One</option>

                    @forelse ($companies as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                    @empty

                    @endforelse




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

            <div class="form-row mx-3 my-2">


                <label for="type" class="col-sm-2 col-form-label">Order Type</label>
                <div class="col-sm-10">
                  <select class="custom-select @error('request.type')
                  is-invalid
                  @enderror"  wire:model="request.type">
                    <option value="">Please Select One</option>


                      <option value="lc">LC</option>
                    <option value="money">Money</option>



                  </select>

                @error('request.type')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
              </div>
            </div>


            <div class="form-row mx-3 my-2">
            <label for="rate" class="col-sm-2 col-form-label">Doller Rate</label>
            <div class="col-sm-10">

              <input type="number" class="form-control @error('request.rate') is-invalid @enderror  " placeholder="Doller Rate" name="rate" id="rate" wire:model.defer="request.rate">

              @error('request.rate')

              <div class="invalid-feedback">
                 {{$message}}
              </div>
              @enderror
            </div>
            </div>
            <div class="form-row mx-3 my-2">
            <label for="via_id" class="col-sm-2 col-form-label">Company Via</label>
            <div class="col-sm-10">
               <select id="via_id" class="custom-select @error('request.via_id')
                  is-invalid
                  @enderror"  wire:model.defer="request.via_id">
                    <option value="">Please Select One</option>

                @forelse ($vias as $via)
                <option value="{{$via->id}}">{{$via->name}}</option>
                @empty

                @endforelse



                  </select>



              @error('request.via_id')

              <div class="invalid-feedback">
                 {{$message}}
              </div>
              @enderror
            </div>
            </div>

            </div>

            <div class="container card">


            <h2 class="text-center">Product Details</h2>

            <div class="form-row mx-3 my-2">

                {{-- @dump($products) --}}
                <label for="productName" class="col-sm-2 col-form-label">Product Name</label>
          <div class="col-sm-10">
            <select id="productName" class="custom-select @error('product.product_id')
            is-invalid
            @enderror"  wire:model="product.product_id">
              <option value="">Please Select One</option>
            @foreach ($products as $id => $product)

            <option value="{{$id}}">{{$product}}</option>
            @endforeach



            </select>



          @error('product.product_id')

          <div class="invalid-feedback">
              {{$message}}
          </div>
          @enderror
      </div>
      </div>
                <div class="form-row mx-3 my-2">

                    <label for="quantity" class="col-sm-2 col-form-label">Product Quantity</label>
              <div class="col-sm-10">

              <input type="number" class="form-control @error('product.quantity') is-invalid @enderror" placeholder="Row Metarial quantity" id="quantity" wire:model="product.quantity">

              @error('product.quantity')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
          </div>
          </div>

          <h3 class="text-center">Production Cost</h3>
            <div class="form-row mx-3 my-2">


              <label for="productionPrice" class="col-sm-2 col-form-label">Costing Price</label>
              <div class="col-sm-10">
              <input type="number" readonly class="form-control @error('productionPriceTotal') is-invalid @enderror  "  name="productionPrice" id="productionPrice" wire:model="productionPriceTotal">

              @error('productionPriceTotal')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>
           </div>

           <div class="form-row mx-3 my-2">


            <label for="productionType" class="col-sm-2 col-form-label">Price Type</label>
            <div class="col-sm-10">
              <select class="custom-select @error('productionType')
              is-invalid
              @enderror"  wire:model="productionType">
                <option value="">Please Select One</option>


                  <option value="1">Per Pis</option>
                  <option value="25">Per Bag</option>
                  <option value="100">Per Hundred</option>


              </select>

            @error('productionType')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
          </div>

            <div class="form-row mx-3 my-2">


              <label for="productionPrice" class="col-sm-2 col-form-label">Price by Type</label>
              <div class="col-sm-10">
              <input type="text" disabled class="form-control @error('product.productionPrice') is-invalid @enderror  " placeholder="Row Metarial productionPrice" name="productionPrice" id="productionPrice" wire:model="product.productionPrice">

              @error('product.productionPrice')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>
           </div>

          <h3 class="text-center">Price Details</h3>

          <div class="form-row mx-3 my-2">


            <label for="costType" class="col-sm-2 col-form-label">Price Type</label>
            <div class="col-sm-10">
              <select class="custom-select @error('costType')
              is-invalid
              @enderror"  wire:model="costType">
                <option value="">Please Select One</option>


                  <option value="1">Per Pis</option>
                <option value="25">Per Bag</option>
                  <option value="100">Per Hundred</option>


              </select>

            @error('costType')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div>

          <div class="form-row mx-3 my-2">


              <label for="price" class="col-sm-2 col-form-label">Per Price</label>
              <div class="col-sm-10">
              <input type="text" class="form-control @error('product.costingPrice') is-invalid @enderror  " placeholder="Row Metarial Price" name="price" id="price" wire:model="product.costingPrice">

              @error('product.costingPrice')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>
            </div>



            <div class="form-row mx-3 my-2">


              <label for="pricePerPis" class="col-sm-2 col-form-label"> Per Pis</label>
              <div class="col-sm-10">
              <input type="text" readonly class="form-control @error('pricePerPis') is-invalid @enderror  "  name="pricePerPis" id="pricePerPis" wire:model="pricePerPis">

              @error('pricePerPis')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>
            </div>
            <div class="form-row mx-3 my-2">


              <label for="totalPrice" class="col-sm-2 col-form-label">Total</label>
              <div class="col-sm-10">
              <input type="text" readonly class="form-control @error('totalPrice') is-invalid @enderror  "  name="totalPrice" id="totalPrice" wire:model="totalPrice">

              @error('totalPrice')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>
            </div>



        </div>








        <div class="card-footer float-right">

            <button type="Submit" class="btn btn-xl btn-primary">Create Order</button>
        </div>
    </form>
</div>








{{--
     </x-partials.modal>
    </div>
 --}}

</div>
