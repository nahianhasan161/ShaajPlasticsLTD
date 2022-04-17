<div>
   {{--  <a class="btn btn-primary" href="{{route('factory_production_history',['id' => $factory->id])}}">History</a> --}}
    <a class="btn btn-primary ml-4" href="{{'/admin/inventory/production/'.$factory->id}}">History</a>
    {{-- @dump($factory->id) --}}
    <div class="container row m-3 ">


        <div class="col-md-12 ">
        <div class="container card">
         <h4 class="card-title mt-3">Create  Production</h4>
         <form class="card-body" autocomplete="false" wire:submit.prevent="createProduction">


            <div class="card container pl-3 pt-3">
            <h4> Product</h4>

            @if($errors->has('request.productName'))
            <span>{{ $errors->first('request.productName') }}</span>
        @endif

             <div class="form-group row">
                <label for="ProductName" class="col-sm-2 col-form-label"> Name</label>
                <div class="col-sm-10">

                 <div class="form-group">
                     <select class="custom-select @error('finalProduct.productName')
                     is-invalid
                     @enderror"  wire:model.defer="finalProduct.productName">
                       <option value="">Please Select One</option>
                    @foreach ($products as $key => $product)

                    <option value="{{$product}}">{{ $product}}</option>
                    @endforeach


                     </select>
                     @error('finalProduct.productName')

                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                   </div>
                </div>
              </div>

              <div class="form-row  my-2">

                <label for="quantity" class="col-sm-2 col-form-label">Product Quantity</label>
          <div class="col-sm-8">

            <input type="number" class="form-control @error('finalProduct.productQuantity')
            is-invalid
        @enderror" id="finalProduct.productQuantity" wire:model.defer="finalProduct.productQuantity" {{-- onchange="setTwoNumberDecimal" min="0" step="any" --}} >


          @error('finalProduct.productQuantity')

          <div class="invalid-feedback">
              {{$message}}
          </div>
          @enderror
      </div>
      <div class="col-sm-2">


      <select class="custom-select" disabled>




          <option >Pis</option>



      </select>


</div>
      </div>


{{-- @dump($rowProduct) --}}

              <u><h4 class="text-bold m-3">Per Pis Costing of Row Materials</h4></u>
              @forelse ($rowProduct as $index=> $rowItem)


              <div class="card container pl-3 pt-3">

             <div class="form-group row">
                <label for="rowProduct.materialName" class="col-sm-2 col-form-label"> Name</label>
                <div class="col-sm-10">

                 <div class="form-group">
                     <select class="custom-select @error('rowProduct.'.$index.'.materialName')
                     is-invalid
                     @enderror" wire:key="{{$index}}"  wire:model="rowProduct.{{$index}}.materialName" >
                       <option value="">Please Select One</option>
                        @foreach ($rowMaterials as $key => $material)

                        <option value="{{$material}}"> {{$material}}</option>
                        @endforeach


                     </select>
                     @error('rowProduct.'.$index.'.materialName')

                     <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                   </div>
                </div>
              </div>

              <div class="form-row  my-2">

                <label for="quantity" class="col-sm-2 col-form-label">Product Quantity</label>
          <div class="col-sm-8">

            <input type="text" class="form-control @error('rowProduct.'.$index.'.materialQuantity')
            is-invalid
        @enderror" id="rowProduct.materialQuantity" wire:model="rowProduct.{{$index}}.materialQuantity" wire:key="{{$index}}">


            @error('rowProduct.'.$index.'.materialQuantity')

          <div class="invalid-feedback">{{$message}}</div>
          @enderror

      </div>
      <div class="col-sm-2">


      <select class="custom-select" disabled>




          <option >Gram</option>



      </select>


</div>
      </div>


              </div>
              @empty
              <h1 class="text-center">No Product</h1>
              @endforelse
             <div class="form-group row">
               <div class="col-sm-12 d-flex justify-content-between">
                @if(count($rowProduct) < 9)
                <a  class="btn btn-dark "  wire:click="addProduct" >Add One Item</a>

                @endif

                @if(count($rowProduct) > 1)
                <a  class="btn btn-danger " wire:loading.attr='disabled'  wire:click.defer='removeProduct' >Remove One Item</a>

                @endif


                 <button type="submit" class="btn btn-primary ">Create Production</button>
               </div>
             </div>
           </form>
        </div>
    </div>
 </div>
</div>
