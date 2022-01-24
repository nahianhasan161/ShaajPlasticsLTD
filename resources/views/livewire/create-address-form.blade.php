<div>
    <div>
        <div class="container m-3" wire:click ="createModalButton">
            <button type="button" class="btn btn-primary" >
                Create New Row Metarial
               </button>

        </div>
     <x-partials.modal>



        <form autocomplete="off"  wire:submit.prevent="{{ false ? 'updateOrder' : 'createOrder' }}">
            @csrf

            <h4>Company Details</h4>
            <div class="form-row mx-3 my-2">


                <label for="company" class="col-sm-2 col-form-label">Select Company</label>
                <div class="col-sm-10">
                  <select class="custom-select @error('request.company')
                  is-invalid
                  @enderror"  wire:model="request.company">
                    <option value="">Please Select One</option>


                      <option value="1">Per Pis</option>
                    <option value="25">Per Bag</option>
                      <option value="100">Per Hundred</option>


                  </select>

                @error('request.company')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
              </div>
            </div>


        <div class="form-row mx-3 my-2">
            <label for="companyAddress" class="col-sm-2 col-form-label">Order Note</label>
            <div class="col-sm-10">

              <textarea type="text" class="form-control @error('request.companyAddress') is-invalid @enderror  " placeholder="Company Address" name="companyAddress" id="companyAddress" wire:model.defer="request.companyAddress"></textarea>

              @error('request.companyAddress')

              <div class="invalid-feedback">
                 {{$message}}
              </div>
              @enderror
            </div>
            </div>

            <div class="form-row mx-3 my-2">


                <label for="orderType" class="col-sm-2 col-form-label">Order Type</label>
                <div class="col-sm-10">
                  <select class="custom-select @error('orderType')
                  is-invalid
                  @enderror"  wire:model="orderType">
                    <option value="">Please Select One</option>


                      <option value="lc">LC</option>
                    <option value="money">Money</option>



                  </select>

                @error('orderType')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
              </div>
            </div>


            <div class="form-row mx-3 my-2">
            <label for="convertionRate" class="col-sm-2 col-form-label">Doller Rate</label>
            <div class="col-sm-10">

              <input type="text" class="form-control @error('request.convertionRate') is-invalid @enderror  " placeholder="Company Phone" name="convertionRate" id="convertionRate" wire:model.defer="request.convertionRate">

              @error('request.convertionRate')

              <div class="invalid-feedback">
                 {{$message}}
              </div>
              @enderror
            </div>
            </div>
            <div class="form-row mx-3 my-2">
            <label for="companyVia" class="col-sm-2 col-form-label">Company Via</label>
            <div class="col-sm-10">
               <select id="companyVia" class="custom-select @error('request.companyVia')
                  is-invalid
                  @enderror"  wire:model.defer="request.companyVia">
                    <option value="">Please Select One</option>


                      <option value="1">Per Pis</option>
                      <option value="25">Per Bag</option>
                      <option value="100">Per Hundred</option>


                  </select>



              @error('request.companyVia')

              <div class="invalid-feedback">
                 {{$message}}
              </div>
              @enderror
            </div>
            </div>

            <h4>Product Details</h4>

            <div class="form-row mx-3 my-2">

                <label for="productName" class="col-sm-2 col-form-label">Product Name</label>
          <div class="col-sm-10">
            <select id="productName" class="custom-select @error('request.productName')
            is-invalid
            @enderror"  wire:model="request.productName">
              <option value="">Please Select One</option>

            @foreach ($products as $product)

            <option value="{{$product}}">{{$product}}</option>
            @endforeach



            </select>



          @error('request.productName')

          <div class="invalid-feedback">
              {{$message}}
          </div>
          @enderror
      </div>
      </div>
                <div class="form-row mx-3 my-2">

                    <label for="productQuantity" class="col-sm-2 col-form-label">Product Quantity</label>
              <div class="col-sm-10">

              <input type="number" class="form-control @error('request.productQuantity') is-invalid @enderror" placeholder="Row Metarial productQuantity" id="productQuantity" wire:model="request.productQuantity">

              @error('request.productQuantity')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
          </div>
          </div>

          <h5>Production Cost</h5>
            <div class="form-row mx-3 my-2">


              <label for="productPrice" class="col-sm-2 col-form-label">product Price</label>
              <div class="col-sm-10">
              <input type="number" readonly class="form-control @error('request.productPrice') is-invalid @enderror  " placeholder="Row Metarial productPrice" name="productPrice" id="productPrice" wire:model="request.productPrice">

              @error('request.productPrice')

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
              <input type="text" disabled class="form-control @error('productionPrice') is-invalid @enderror  " placeholder="Row Metarial productionPrice" name="productionPrice" id="productionPrice" wire:model="productionPrice">

              @error('productionPrice')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>
           </div>

          <h4>Price Details</h4>

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
              <input type="text" class="form-control @error('request.price') is-invalid @enderror  " placeholder="Row Metarial Price" name="price" id="price" wire:model.defer="request.price">

              @error('request.price')

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












        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>









     </x-partials.modal>
    </div>


</div>

