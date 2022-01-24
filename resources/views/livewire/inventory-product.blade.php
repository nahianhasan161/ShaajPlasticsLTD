<div>
{{-- @dump($productCode) --}}
    <div class="container row m-3 ">

        <div class="col-md-6 card ">
            <h4 class="card-title mt-3">Create Product</h4>
         <form class="card-body" wire:submit.prevent="createProduct">

             <div class="form-group row">
               <label for="productName" class="col-sm-2 col-form-label"> Name</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control @error('productName')
                     is-invalid
                 @enderror" id="inputProductName" wire:model.defer="productName">
                 <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
               </div>



             </div>



             <div class="form-group row">
               <div class="col-sm-10">
                 <button type="submit" class="btn btn-primary">Create Product</button>
               </div>
             </div>
           </form>
        </div>
        <div class="col-md-6 ">
        <div class="container card">
         <h4 class="card-title mt-3">Create Product Code</h4>
         <form class="card-body" autocomplete="false" wire:submit.prevent="createProductCode">
             <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label"> Name</label>
               <div class="col-sm-10">
                <div class="form-group">
                    <select class="custom-select @error('productNameForCode')
                    is-invalid
                    @enderror"  wire:model.defer="productNameForCode">
                      <option value="">Please Select One</option>
                        @foreach ($allProducts as $product)

                        <option value="{{$product->name}}">{{$product->name}}</option>
                        @endforeach

                    </select>
                    @error('productNameForCode')

                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
               </div>
             </div>


             <div class="form-group row">
               <label for="productCode" class="col-sm-2 col-form-label"> Code</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control @error('productCode')
                     is-invalid
                 @enderror" id="productCode" wire:model.defer="productCode">
                 <div class="invalid-feedback">Example invalid custom select feedback</div>
               </div>
             </div>



             <div class="form-group row">
               <div class="col-sm-10">
                 <button type="submit" class="btn btn-primary">Create Product Code</button>
               </div>
             </div>
           </form>
        </div>
    </div>
 </div>




     <div class="container row ">
         <div class="col-12">
           <div class="card">
             <div class="card-header">
               <h3 class="card-title">Expandable Table Tree</h3>
             </div>
             <!-- ./card-header -->
             <div class="card-body p-0">
               <table class="table table-hover">
                 <thead>
                     <tr class="d-flex justify-content-between">

                       <th scope="col">
                           <label class="mr-5">
                            Index
                           </label>
                            Name
                       </th>
                       {{-- <th scope="col">Qantity</th> --}}
                       <th scope="col">Action</th>

                     </tr>
                   </thead>
                   @foreach ($products as $key => $product)
                 <tbody>

                 {{--   <tr class="d-flex justify-content-between"  data-widget="expandable-table" aria-expanded="true">
                     <td >

                         <div>
                             <div class="custom-control custom-checkbox">
                                 <input class="custom-control-input" type="checkbox" id="customCheckbox1" >
                                 <label for="customCheckbox1" class="custom-control-label">Select All</label>
                               </div>

                         <button type="button" class="btn btn-primary p-0" >
                             <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                         </button>
                         219
                     </div>
                 </td>
                 <td>

                     <div class="custom-control">

                         <button class="btn btn-primary" x-data @click="alert('hello')"> <i class=" fa fa-edit"></i> </button>
                         <button class="btn btn-danger" x-data @click="alert('hello')"> <i class=" fa fa-trash"></i> </button>

                     </div>
                 </td>
                   </tr> --}}



                   <tr class="d-flex justify-content-between"  data-widget="expandable-table" aria-expanded="true">



                    <td >

                           <div>

                               <div class="custom-control custom-checkbox">

                                <strong class="mr-5">

                                    {{$key}} .
                                </strong>
                                   <input class="custom-control-input" type="checkbox" id="customCheckbox{{$product->id}}" >
                                   <label for="customCheckbox{{$product->id}}" class="custom-control-label">{{$product->name}}</label>
                                </div>
                                @if($product->product_code()->exists())
                                <button type="button" class="btn btn-primary p-0" >
                                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                </button>
                                view all Product codes
                                @endif
                            </div>
                        </td>
                        <td>

                            <div class="custom-control">

                                <button class="btn btn-primary" x-data @click="alert('hello')"> <i class=" fa fa-edit"></i> </button>
                                <button class="btn btn-danger" wire:click="$emit('deleteCode',{{$product->id}})"> <i class=" fa fa-trash"></i> </button>

                            </div>
                        </td>
                    </tr>


                    @if($product->product_code()->exists())
                   <tr class="expandable-body">
                     <td>
                       <div class="p-0">
                         <table class="table table-hover">
                            <thead>
                                <tr class="d-flex justify-content-between">

                                  <th scope="col">
                                      <label class="mr-5">
                                       Index
                                      </label>
                                       Name
                                  </th>
                                  {{-- <th scope="col">Qantity</th> --}}
                                  <th scope="col">Action</th>

                                </tr>
                              </thead>
                           <tbody>
                               @foreach ($product->product_code as $key => $code)
                             <tr >

                                 <td>

                                     <div class="d-flex justify-content-between">
                                         <div>
                                            <strong class="mr-5">

                                                {{$key}} .
                                            </strong>
                                            <input type="checkbox" id="checkbox{{$code->id}}">
                                            <label for="checkbox{{$code->id}}">    {{$code->name}}</label>


                                        </div>
                                        <div class="custom-control">

                                            <button class="btn btn-primary" x-data @click="alert('hello')"> <i class=" fa fa-edit"></i> </button>
                                            <button class="btn btn-danger" wire:click="$emit('deleteConfirmation',{{$code->id}})"> <i class=" fa fa-trash"></i> </button>

                                        </div>
                                    </div>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            @endif
            @endforeach


                 </tbody>
               </table>
               {{$products->links()}}
             </div>
             <!-- /.card-body -->
           </div>
           <!-- /.card -->
         </div>
       </div>


