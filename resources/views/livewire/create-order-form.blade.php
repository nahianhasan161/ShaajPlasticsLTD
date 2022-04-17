<div class="container">

<a href="{{route('admin.order.all')}}" class="btn btn-primary mb-1">  View All Orders <i class="fas fa-arrow-right"></i> </a>

        <div class="card  ">

            <form autocomplete="off"  wire:submit.prevent=" createOrder">
             @csrf
            <div class="card container mt-3">


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
                <small ><u> <a class="text-danger" href="{{route('admin.company')}}">Create New Company</a> </u></small>
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

            @if ($currency == 'doller')

            <div class="form-row mx-3 my-2">
                <label for="rate" class="col-sm-2 col-form-label">Doller Rate</label>
            <div class="col-sm-10">

                <input type="number" class="form-control @error('request.rate') is-invalid @enderror  " placeholder="Doller Rate" name="rate" id="rate" wire:model="request.rate">

              @error('request.rate')

              <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
                <small class="text-info">(Default 1$ = 80৳)</small>
            </div>
        </div>
        @endif

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
              <small ><u> <a class="text-danger" href="{{route('admin.via')}}">Create New Via</a> </u></small>
            </div>
            </div>

            </div>
            {{-- @dump(collect($product)->implode('product_id',',')) --}}

            @php
               $collection = collect($product);
               $collect = $collection->implode('product_id',',');

               $collected =explode(",",$collect)

            @endphp
            @forelse($product  as $index => $productOne )

            <div class="container card">

                {{-- @dump(array_diff_key($collected, array_flip(['0']))) --}}

            <h2 class="text-center">Product Details</h2>

            <div class="form-row mx-3 my-2">
               {{--  ->except([1]) --}}
               {{-- collect($product)->implode('product_id',',') --}}

                <label for="productName" class="col-sm-2 col-form-label">Product Name</label>
          <div class="col-sm-10">
            <select id="productName" wire:key="{{$loop->index}}" class="custom-select @error('product.'.$index.'.product_id')
            is-invalid
            @enderror"  wire:model="product.{{$index}}.product_id">
              <option value="">Please Select One</option>
            @foreach ($products->except(array_diff_key($collected, array_flip([$index]))) as $id => $productList)

            <option value="{{$id}}">{{$productList}}</option>
            @endforeach



            </select>



          @error('product.'.$index.'.product_id')

          <div class="invalid-feedback">
              {{$message}}
          </div>
          @enderror

          <small ><u> <a class="text-danger" href="{{route('admin.inventory.plastic.products')}}">Create New Product</a> </u></small>
      </div>
      </div>
                <div class="form-row mx-3 my-2">

                    <label for="quantity" class="col-sm-2 col-form-label">Product Quantity</label>
              <div class="col-sm-8">

              <input type="number"
               class="form-control @error('product.'.$index.'.quantity') is-invalid @enderror"
                placeholder="Row Metarial quantity" id="quantity"
                wire:key="{{$loop->index}}" wire:model="product.{{$index}}.quantity">


              @error('product.'.$index.'.quantity')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
          </div>
          <div class="col-sm-2">


          <select class="custom-select @error('product.'.$index.'.costType')
          is-invalid
          @enderror" wire:key="{{$loop->index}}" wire:model="product.{{$index}}.costType">



              <option value="">Choose ...</option>
              <option value="1">Pis</option>
            <option value="12">Dozen</option>
              <option value="100">Hundred</option>


          </select>

        @error('product.'.$index.'.costType')

        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
          </div>



          <h3 class="text-center">Price Details</h3>

        {{--   <div class="form-row mx-3 my-2">


            <label for="costType" class="col-sm-2 col-form-label">Price Type</label>
            <div class="col-sm-10">
              <select class="custom-select @error('product.'.$index.'.costType')
              is-invalid
              @enderror" wire:key="{{$loop->index}}" wire:model="product.{{$index}}.costType">
                <option value="">Please Select One</option>


                  <option value="1">Per Pis</option>
                <option value="12">Per Dozen</option>
                  <option value="100">Per Hundred</option>


              </select>

            @error('product.'.$index.'.costType')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
        </div> --}}

         {{--  <div class="form-row mx-3 my-2">


              <label for="price" class="col-sm-2 col-form-label">Per Pis</label>
              <div class="col-sm-10">
              <input type="text" class="form-control @error('product.'.$index.'.costingPrice') is-invalid @enderror  "
               placeholder="Row Metarial Price" name="price" id="price"
               wire:key="{{$loop->index}}" wire:model="product.{{$index}}.costingPrice">

              @error('product.'.$index.'.costingPrice')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>
            </div> --}}

          <div class="form-row mx-3 my-2 ">


              <label for="price" class="col-sm-2 col-form-label">Per Price  </label>
              <div class="col-sm-10 input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">  @if($request['type']  == 'lc') $
                    @else
                    ৳
                    @endif</span>
                  </div>
                <input type="text" class="form-control @error('product.'.$index.'.costingPrice') is-invalid @enderror  "
               placeholder="Row Metarial Price" name="price" id="price"
               wire:key="{{$loop->index}}" wire:model="product.{{$index}}.costingPrice">

              @error('product.'.$index.'.costingPrice')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>

            </div>





            <div class="form-row mx-3 my-2">


              <label for="pricePerPis" class="col-sm-2 col-form-label"> Per Pis</label>
              <div class="col-sm-10 input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">  @if($request['type']  == 'lc') $
                    @else
                    ৳
                    @endif</span>
                  </div>

              <input type="text" readonly class="form-control @error('partial.'.$index.'.pricePerPis') is-invalid @enderror  "
                name="pricePerPis" id="pricePerPis"
                wire:key="{{$loop->index}}"  wire:model="partial.{{$index}}.pricePerPis">

              @error('partial.'.$index.'.pricePerPis')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>
            </div>
            <div class="form-row mx-3 my-2">


              <label for="pricePerPis" class="col-sm-2 col-form-label"> Price by Type</label>
              <div class="col-sm-10 input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">  @if($request['type']  == 'lc') $
                    @else
                    ৳
                    @endif</span>
                  </div>

              <input type="text" readonly class="form-control @error('partial.'.$index.'.pricePerPis') is-invalid @enderror  "
                name="pricePerPis" id="pricePerType"
                wire:key="{{$loop->index}}"   value="{{$partial[$index]['pricePerPis'] * (int)$product[$index]['costType']}}">

              @error('partial.'.$index.'.pricePerPis')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>
            </div>
            <div class="form-row mx-3 my-2">


              <label for="totalPrice" class="col-sm-2 col-form-label">Total</label>
              <div class="col-sm-10 input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">  @if($request['type']  == 'lc') $
                    @else
                    ৳
                    @endif</span>
                  </div>
              <input type="text" readonly class="form-control @error('partial.'.$index.'.totalPrice') is-invalid @enderror  "
               name="totalPrice" id="totalPrice"
               wire:key="{{$loop->index}}" wire:model="partial.{{$index}}.totalPrice" >

              @error('partial.'.$index.'.totalPrice')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>
            </div>

            <h3 class="text-center">Production Cost</h3>


         {{--   <div class="form-row mx-3 my-2">


            <label for="productionType" class="col-sm-2 col-form-label">Price Type</label>
            <div class="col-sm-10">
              <select class="custom-select @error('partial.'.$index.'.productionType')
              is-invalid
              @enderror"
              wire:key="{{$loop->index}}" wire:model="partial.{{$index}}.productionType">
                <option value="">Please Select One</option>


                  <option value="1">Per Pis</option>
                  <option value="12">Per Dazen</option>
                  <option value="100">Per Hundred</option>


              </select>

            @error('partial.'.$index.'.productionType')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
          </div> --}}

            <div class="form-row mx-3 my-2">


              <label for="productionPrice" class="col-sm-2 col-form-label">Per Price</label>
              <div class="col-sm-10 input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">  @if($request['type']  == 'lc') $
                    @else
                    ৳
                    @endif</span>
                  </div>
              <input type="text" disabled
              class="form-control @error('product.0.productionPrice') is-invalid @enderror  "
              placeholder="Row Metarial productionPrice" name="productionPrice" id="productionPrice"
              wire:key="{{$loop->index}}" value="{{(int) $product[$index]['costType'] == 0 ? 0 : convertToUSDHelper(((int)$product[$index]['productionPrice'] / $product[$index]['costType']),$request['rate'] ?? 1,$request['type'] ?? 'money')}}">

              @error('partial.'.$index.'.productionPrice')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>
           </div>
            <div class="form-row mx-3 my-2">


              <label for="productionPrice" class="col-sm-2 col-form-label">Price by Type</label>
              <div class="col-sm-10 input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">  @if($request['type']  == 'lc') $
                    @else
                    ৳
                    @endif</span>
                  </div>
              <input type="text" disabled
              class="form-control @error('product.0.productionPrice') is-invalid @enderror  "
              placeholder="Row Metarial productionPrice" name="productionPrice" id="productionPrice"
              wire:key="{{$loop->index}}" wire:model="partial.{{$index}}.productionPrice">

              @error('partial.'.$index.'.productionPrice')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>
           </div>
           <div class="form-row mx-3 my-2">


            <label for="productionPrice" class="col-sm-2 col-form-label">Total Costing Price</label>
            <div class="col-sm-10 input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    @if($request['type']  == 'lc') $
                    @else
                    ৳
                    @endif

                    </span>
                  </div>
            <input type="text" readonly
            class="form-control @error('partial.'.$index.'.productionPriceTotal') is-invalid @enderror  "
              name="productionPrice" id="productionPrice"
              wire:key="{{$loop->index}}" wire:model="partial.{{$index}}.productionPriceTotal">

            @error('partial.'.$index.'.productionPriceTotal')

            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
          </div>
         </div>
{{-- @dump($partial[$index]['productionPriceTotal']) --}}


           {{--  <button type="button" class="btn btn-sm btn-primary" wire:key="{{$loop->index}}" wire:click="calculate">calculate</button> --}}
        </div>



        @empty
        NO Product
        @endforelse



        <div class=" mb-3 mx-1 d-flex justify-content-between">
            @if(count($product) < 9)
            <button type="button" class=" btn btn-sm btn-info" wire:click="addProduct">Add Product</button>
            @endif

            @if(count($product) > 1)

            <button class="btn btn-sm btn-danger" type="button"   wire:loading.attr='disabled'  wire:click.defer='removeProduct'>Remove Product</button>
            @endif
            <button type="Submit" class=" btn btn-lg btn-primary">Create Order</button>
        </div>
    </form>

    </div>
    </div>









