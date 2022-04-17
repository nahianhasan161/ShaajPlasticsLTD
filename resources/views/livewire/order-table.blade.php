<div>
    <a href="{{route('admin.order.create')}}" class="btn btn-primary m-3">Create New Order</a>


 {{--    <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Orders Table</h3>
        </div>

        <div class="card-body">
          <table class="table table-bordered table-hover table-responsive">
            <thead>
              <tr>
                <th>#</th>
                <th>Tracking_id</th>
                <th>Company</th>
                <th>Via</th>

                <th>Payment Type</th>
                <th>Doller Rate</th>
                <th>Status</th>
                <th>Note</th>
                <th>Price</th>
                <th>Paid</th>

                <th colspan="10" rowspan="2">Product</th>

              </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)

                <tr >
                    <td>

                        <input type="checkbox" name="select" id="select">
                    </td>
                    <td>{{$order->tracking_id}}</td>
                    <td>
                        <strong>Name:</strong>{{$order->company->name}}
                        <br>
                        <strong>Phone:</strong>{{$order->company->phone}}
                        <br>
                        <strong>Address:</strong>
                        <Address>
                            {{$order->company->address}}
                        </Address>


                    </td>
                    <td>
                        <strong>Name:</strong>{{$order->via->name}}
                        <br>
                        <strong>Phone:</strong>{{$order->via->phone}}
                        <br>
                        <strong>Address:</strong>
                        <Address>
                            {{$order->via->address}}
                        </Address>


                    </td>

                    <td><span class="badge badge-success">{{ucWords($order->type)}}</span></td>
                    <td>
                        @if ($order->rate)
                            {{$order->rate}}
                            @else
                            <span class="badge badge-danger">N/A</span>
                        @endif

                      </td>
                    <td><span class="badge badge-success">{{ucWords($order->status)}}</span>
                    <td>
                        @if ($order->note)
                        {{$order->note}}
                        @else
                        <span class="badge badge-danger">N/A</span>
                    @endif
                        </td>

                    <td>
                        @foreach(
                        $order->products as $index => $product
                    )
                     @php
                     $total = 0;
                     $total = $total + $product->quantity * $product->costingPrice;
                 @endphp

                    @endforeach

                    <strong><u> Total : </u>{{currencySignHelper($order->type). $total}}</strong>
                    </td>
                    <td>
                        <strong>Paid:</strong>{{currencySignHelper($order->type). $order->paid}}
                    </td>


                        @forelse(
                            $order->products as $index => $product
                        )

                        <td class="container  ">

                            <div class=" card px-3">
                                <h5 >
                                    Product
                                    <strong >{{ $index + 1}}</strong>
                                    <hr>
                                </h5>
                                <br>


                       <strong>production Price:</strong>{{$product->costingPrice}}<br>
                        <strong>costing Price:</strong>{{$product->productionPrice}}<br>
                        <strong>Order Quantity:</strong>{{$product->quantity}}<br>

                                <hr>
                        @if ($product )

                        <strong>Name:</strong>{{$product->details->name }}<br>
                        <strong>Material:</strong>{{$product->details->meterial}}<br>
                        <strong>Code:</strong>{{$product->details->code}}<br>
                        <strong>Product Quantity:</strong>{{$product->details->quantity}}<br>

<strong>Weight:</strong>{{$product->details->weight}}<br>
<strong>Stripes:</strong>{{$product->details->stripes}}<br>
<strong>Thickness:</strong>{{$product->details->thickness}}<br>
<strong>Packaging:</strong>{{$product->details->packaging}}<br>
<strong>Color:</strong>{{$product->details->color}}<br>
<strong>Price:</strong>{{$product->details->price}}<br>
@endif

</div>
</td>
@empty
<h1>No Products Found</h1>
@endforelse












                <td>


                        <div class="custom-control d-flex">

                            <a class="btn btn-info m-1"  href="/admin/order/invoice/{{$order->id}}"> <i class="fa fa-print" aria-hidden="true"></i> </a>
                            <a class="btn btn-warning m-1"  href="/admin/delivery/all/{{$order->id}}"> <i class=" fas fa-truck"></i> </a>

                            <a class="btn btn-dark m-1"  href="{{route('admin.bill.all',['order' => $order->id])}}"> <i class=" fas fa-coins" style='color:#FFD700'></i> </a>
                            <button class="btn btn-primary m-1" > <i class=" fa fa-edit"></i> </button>
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

              {{$orders->links()}}
          </div>
        </div>
        </div> --}}

        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Orders Table</h3>
            </div>

            <div class="card-body">
            <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Tracking_id</th>
                <th>Company</th>
                <th>Via</th>

                <th>Payment Type</th>

                <th>Status</th>

                <th>Total Price</th>
                <th>Total Paid</th>
                <th>Paid</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)


                <tr data-widget="expandable-table" aria-expanded="false">
                    <td><input type="checkbox" name="selectOrder" id="selectOrder"></td>
                    <td>{{$order->tracking_id}}</td>
                    <td>
                        <strong>Name:</strong>{{$order->company->name}} <br>
                        <hr>
                        <strong>Phone:</strong>{{$order->company->phone}} <br>
                        <hr>
                        <strong>Address:</strong><address>{{$order->company->address}} </address> <br>
                        <hr>

                    </td>
                    <td>
                        <strong>Name:</strong>{{$order->via->name}} <br>
                        <hr>
                        <strong>Phone:</strong>{{$order->via->phone}} <br>
                        <hr>
                        <strong>Address:</strong><address>{{$order->via->address}} </address> <br>
                        <hr>

                    </td>

                    <td><span class="badge badge-success">{{ucWords($order->type)}}</span></td>

                    <td><span class="badge badge-success">{{ucWords($order->status)}}</span></td>
                    <td> <span class="input-group-text">{{currencySignHelper($order->type). number_format((float)$order->paid, 2,)}}</span> </td>
                    <td>
                        <span class="input-group-text">{{currencySignHelper($order->type). number_format((float)$order->paid, 2,)}}</span>

                        </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                             Action
                            </button>

                            <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item  bg-secondary m-1" > <i class=" fa fa-pen"></i>Note </a>
                                <a class="dropdown-item  bg-info m-1 "  href="/admin/order/invoice/{{$order->id}}"> <i class="fa fa-print" aria-hidden="true"></i> invoice</a>
                            <a class="dropdown-item  bg-warning m-1"  href="/admin/delivery/all/{{$order->id}}"> <i class=" fas fa-truck"></i>Delivery </a>

                            <a class="dropdown-item  bg-dark m-1"  href="{{route('admin.bill.all',['order' => $order->id])}}"> <i class=" fas fa-coins" style='color:#FFD700'></i> Bills</a>
                            <a class="dropdown-item  bg-primary m-1" > <i class=" fa fa-edit"></i>Edit </a>
                            <a class="dropdown-item  bg-danger m-1"  wire:click="$emit('deleteConfirmation',{{$order ? $order->id : ''}})" > <i class=" fa fa-trash"></i>Delete </a>
                             {{--  <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a> --}}
                            </div>
                          </div>
                    </td>
                    </tr>
                    <tr class="expandable-body d-none">
                    <td colspan="5">
                        @forelse(
                            $order->products as $index => $product
                        )



                            <p style="display: none;">
                                <table class="table table-bordered">
                                    <thead>


                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Color</th>
                                    <th>weight</th>
                                    <th>Quantity Type</th>
                                    <th>Stock Quantity</th>
                                    <th>Order Quantity</th>
                                    <th>Delivered</th>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td> <strong >{{ $index + 1}}</strong></td>
                                        <td>{{$product->details->name}}</td>
                                        <td>{{$product->details->code}}</td>
                                        <td>{{$product->details->color}}</td>
                                        <td>{{$product->details->weight}}</td>
                                        <td>{{unitHelper($product->costType)}}</td>
                                        <td>{{$product->details->quantity}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{$product->delivered}}</td>
                                    </tr>
                                </tbody>
                                </table>
                            </p>


@empty
<h1>No Products Found</h1>
@endforelse

                    </td>
                    </tr>
                    @empty
                    <h1>No Records Found</h1>
                @endforelse
            </tbody>
            </table>
            <div class="card-footer float-right">

                {{$orders->links()}}
            </div>
        </div>

            </div>
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


                  <label for="price" class="col-sm-2 col-form-label">Amount</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control @error('account.amount') is-invalid @enderror  " placeholder="Amount" name="amount" id="amount" wire:model.defer="account.amount">
                  <small class="text-danger">Per Bag</small>
                  @error('account.amount')

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
