<div>

    <a href="{{route('admin.delivery.create')}}" class="btn btn-primary m-3">Create New Delivery</a>
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Orders Table</h3>
        </div>
        <!-- ./card-header -->
        <div class="card-body">
          <table class="table table-bordered table-hover table-responsive">
            <thead>
              <tr>
                <th>#</th>
                <th>Tracking_id</th>
                <th>Company</th>
                <th>Sender Details</th>
                <th>Receiver Details</th>
                <th>Status</th>




                <th>Note</th>


                <th colspan="10" rowspan="2">Product</th>
               {{--  <th >Action</th> --}}
              </tr>
            </thead>
            <tbody>


                @forelse ($deliveries as $delivery)
               {{--  {{$delivery->deliveries}} --}}
                <tr >
                    <td>

                        <input type="checkbox" name="select" id="select">
                    </td>
                    <td>{{$delivery->tracking_id}}</td>
                    <td>
                        <strong>Name:</strong>{{$delivery->order->company->name}}
                        <br>
                        <strong>Phone:</strong>{{$delivery->order->company->phone}}
                        <br>
                        <strong>Address:</strong>
                        <Address>
                            {{$delivery->order->company->address}}
                        </Address>


                    </td>
                    <td>
                        <strong>Name:</strong>{{$delivery->delivery_by_name}}
                        <br>
                        <strong>Phone:</strong>{{$delivery->delivery_to_phone}}
                        <br>
                        <strong>Address:</strong>
                        <Address>
                            {{$delivery->delivery_to_address}}
                        </Address>


                    </td>


                    <td>
                        <strong>Name:</strong>  {{$delivery->delivery_to_name}}
                        <br>
                        <strong>Phone:</strong>  {{$delivery->delivery_to_phone}}
                        <br>
                        <strong>Address:</strong>
                        <Address>
                            {{$delivery->delivery_by_address}}
                        </Address>

                    </td>
                    <td><span class="badge badge-success">{{ucwords($delivery->status)}}</span>
                        <a class="btn btn-primary btn-sm " wire:click="payment({{$delivery->id}})"><i class="fas fa-pen">edit</i>

                        </a>

                        </td>


                    <td>
                        {{$delivery->note}}
                    </td>
                    {{-- <strong>Total : </strong>{{$delivery->order->price * $delivery->order->quantity}} --}}


                       {{--  @foreach(
                            $delivery->order->products as $index => $product
                        )

                        <td >
                        <h5 class="text-bold">
                           <u> Product {{$index}} </u>
                        </h5>
                        <br>


                       <strong>production Price:</strong>{{$product->costingPrice}}<br>
                        <strong>costing Price:</strong>{{$product->productionPrice}}<br>
                        <strong>Order Quantity:</strong>{{$product->quantity}}<br> --}}

                        {{-- {{$order->products->find('quantity')}} --}}
                       {{--  <strong>production Price:</strong>{{$order->products->costingPrice}}<br> --}}
                        {{-- <strong>costing Price:</strong>{{$order->products->productionPrice}}<br> --}}
                        {{-- <strong>costing Type:</strong>Pices<br> --}}
{{--
<strong>Name:</strong>{{$product->details->name}}<br>
<strong>Material:</strong>{{$product->details->meterial}}<br>
<strong>Code:</strong>{{$product->details->code}}<br>
<strong>Product Quantity:</strong>{{$product->details->quantity}}<br>
<strong>Weight:</strong>{{$product->details->weight}}<br>
<strong>Stripes:</strong>{{$product->details->stripes}}<br>
<strong>Thickness:</strong>{{$product->details->thickness}}<br>
<strong>Packaging:</strong>{{$product->details->packaging}}<br>
<strong>Color:</strong>{{$product->details->color}}<br>
<strong>Price:</strong>{{$product->details->price}}<br>

</td>
@endforeach
 --}}

 @foreach(
     $delivery->products as $index => $product
     )
    @php

    $pro = $product->orderProduct;

    @endphp
    <td class=" p-0" >
        <div class="card px-3">
        <h5> <u>Product {{$index+1}}</u></h5>
      {{--  {{ $product->delivery->order->products}} --}}
    @if ($pro)
            <span class="row">

                <strong>Name:</strong> {{ $pro->details->name }}<br>
            </span>
    <strong>Order Quantity: </strong> {{ ($pro->quantity) }} <strong> {{unitHelper($pro->costType)}} </strong><br>
    <strong>Total Delivered:</strong>{{ ($pro->delivered) }} <strong> {{unitHelper($pro->costType)}} </strong> <br>
    <strong>Delivery Quantity:</strong> {{ ($product->quantity) }} <strong> {{unitHelper($pro->costType)}} </strong> <br>
    <strong>Order Type : </strong>{{$order->type}} <br>
    <strong>Unit Type:
    </strong>
        {{unitHelper($pro->costType)}}
   <br>
    <strong>Total Amount: {{currencySignHelper($order->type)}}
         {{round(floatval($product->quantity) *  floatval( $pro->costingPrice ),2)}}</strong> <br>
    {{-- <strong>Product Quantity:</strong>{{$product->quantity}}<br> --}}
    @endif

{{-- <strong>Material:</strong>{{$delivery->details->meterial}}<br>
<strong>Code:</strong>{{$product->details->code}}<br> --}}
{{-- <strong>Weight:</strong>{{$product->details->weight}}<br>
<strong>Stripes:</strong>{{$product->details->stripes}}<br>
<strong>Thickness:</strong>{{$product->details->thickness}}<br>
<strong>Packaging:</strong>{{$product->details->packaging}}<br>
<strong>Color:</strong>{{$product->details->color}}<br> --}}
{{-- <strong>Price:</strong>{{$product->price}}<br> --}}
</div>
</td>
@endforeach









                <td>


                        <div class="custom-control d-flex">

                            <a class="btn btn-info m-1"  href="/admin/delivery/invoice/{{$delivery->id}}"> <i class="fa fa-print" aria-hidden="true"></i> </a>
                            {{-- <a class="btn btn-warning m-1" > <i class=" fas fa-truck"></i> </a> --}}
                            <a class="btn btn-dark m-1"  wire:click="payment({{$order->id}})"> <i class=" fas fa-coins" style='color:#FFD700'></i> </a>
                            <button class="btn btn-primary m-1" {{-- wire:click="$emit('showModal',{{$data->id}})" --}}> <i class=" fa fa-edit"></i> </button>
                            <button class="btn btn-danger m-1"  wire:click="$emit('deleteConfirmation',{{$order ? $order->id : ''}})" > <i class=" fa fa-trash"></i> </button>

                        </div>
                    </td>
                </tr>
                <tr>

                    @empty
                    Empty
                    @endforelse
                </tr>












            </tbody>
          </table>
          <div class="card">

             {{$deliveries->links()}}
          </div>
        </div>
        <!-- /.card-body -->
        <x-partials.modal>



            <form autocomplete="off"  wire:submit.prevent="addMoney""}}">
                @csrf













{{--
            <div class="form-row mx-3 my-2">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">

                  <input type="text" class="form-control @error('request.name') is-invalid @enderror  " placeholder="Row Metarial Name" name="name" id="name" wire:model.defer="request.name">
                  <small class="text-danger">Row Material Name</small>
                  @error('request.name')

                  <div class="invalid-feedback">
                     {{$message}}
                  </div>
                  @enderror
                </div>
                </div> --}}


                  {{--   <div class="form-row mx-3 my-2">

                        <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                  <div class="col-sm-10">

                  <input type="text" class="form-control @error('request.quantity') is-invalid @enderror" placeholder="Row Metarial Quantity" id="quantity" wire:model.defer="request.quantity">
                  <small class="text-danger">Bag</small>
                  @error('request.quantity')

                  <div class="invalid-feedback">
                      {{$message}}
                  </div>
                  @enderror
              </div>
              </div> --}}



              <div class="form-row mx-3 my-2">


                  <label for="price" class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                      <select name="status" id="status" class="form-control @error('account.status') is-invalid @enderror  " placeholder="status"   wire:model.defer="account.status" >

                  <option value="">Choose an Option ...</option>
                  <option value="pending">Pending</option>
                  <option value="active">Active</option>
                  <option value="delivered">Delivered</option>

                </select>
                  @error('account.status')

                  <div class="invalid-feedback">
                      {{$message}}
                  </div>
                  @enderror
                </div>
                </div>







        <div class="form-row mx-3 my-2">


            <label for="date" class="col-sm-2 col-form-label">Date</label>
            <div class="input-group col-sm-10">

                <div class="input-group-prepend">
                    <div class="input-group-text"> <i class="fa fa-calendar" aria-hidden="true"></i></div>
                </div>





                <input  wire:model.lazy="date" id="datepicker"  placeholder="DD/MM/YY"
                class="form-control @error('date') is-invalid @enderror"
                x-data

                x-ref="input"
                x-init="new Pikaday({ field: $refs.input, format: 'DD/MM/YYYY', })"
                    type="text"
                    class=" shadow-sm mt-1 focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md w-27rem"
                />
                @error('date')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror



            </div>
        </div>

        <div class="form-row mx-3 my-2">
            <label for="note" class="col-sm-2 col-form-label">note</label>
            <div class="col-sm-10">

              <textarea type="text" class="form-control @error('account.note') is-invalid @enderror  " placeholder="Note" name="note" id="note" wire:model.defer="account.note"></textarea>
              <small class="text-danger">Note</small>
              @error('account.note')

              <div class="invalid-feedback">
                 {{$message}}
              </div>
              @enderror
            </div>
            </div>

       {{--  {{$selectedOrder}} --}}







            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="Submit" class="btn btn-primary">Save</button>
            </div>
        </form>










         </x-partials.modal>
      </div>
</div>
