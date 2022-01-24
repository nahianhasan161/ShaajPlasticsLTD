<div>
    <div class="container row m-3 ">


        <div class="col-md-12 ">
        <div class="container card">
         <h4 class="card-title mt-3">Create Today's Production</h4>
         <form class="card-body" autocomplete="false" wire:submit.prevent="createProduction">



            <h4> Product</h4>

            @if($errors->has('request.productName'))
            <span>{{ $errors->first('request.productName') }}</span>
        @endif

             <div class="form-group row">
                <label for="ProductName" class="col-sm-2 col-form-label"> Name</label>
                <div class="col-sm-10">

                 <div class="form-group">
                     <select class="custom-select @error('request.productName')
                     is-invalid
                     @enderror"  wire:model.defer="request.productName">
                       <option value="">Please Select One</option>
                    @foreach ($products as $key => $product)

                    <option value="{{$product}}">{{ $product}}</option>
                    @endforeach


                     </select>
                     @error('request.productName')

                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                   </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="request.productQuantity" class="col-sm-2 col-form-label"> Quantity</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control @error('request.productQuantity')
                      is-invalid
                  @enderror" id="request.productQuantity" wire:model.defer="request.productQuantity">
                  @error('request.productQuantity')

                  <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
              </div>

              <h4>Row Materials</h4>


             <div class="form-group row">
                <label for="request.materialName" class="col-sm-2 col-form-label"> Name</label>
                <div class="col-sm-10">

                 <div class="form-group">
                     <select class="custom-select @error('request.materialName')
                     is-invalid
                     @enderror"  wire:model="request.materialName">
                       <option value="">Please Select One</option>
                        @foreach ($rowMaterials as $key => $material)

                        <option value="{{$material}}"> {{$material}}</option>
                        @endforeach


                     </select>
                     @error('request.materialName')

                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                   </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="request.materialQuantity" class="col-sm-2 col-form-label"> Quantity</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('request.materialQuantity')
                      is-invalid
                  @enderror" id="request.materialQuantity" wire:model="request.materialQuantity">
                  @error('request.materialQuantity')

                  <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
              </div>

             <div class="form-group row">
               <div class="col-sm-10">
                 <button type="submit" class="btn btn-primary">Create Production</button>
               </div>
             </div>
           </form>
        </div>
    </div>
 </div>
</div>
