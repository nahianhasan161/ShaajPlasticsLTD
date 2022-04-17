
<div>

    <a href="{{route('admin.bill.create',$order->id)}}" class="btn btn-primary m-3">Create New Bill</a>
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
                <th>Transection_id</th>
                <th>Client Details</th>
                <th>Type</th>

                <th>Status</th>
                <th>Total Paid</th>
                <th>Total Due</th>
                <th>Total </th>



                <th>Note</th>


                <th colspan="10" rowspan="2">Product</th>

              </tr>
            </thead>
            <tbody>


                @forelse ($bills as $bill)
               {{--  {{$bill->deliveries}} --}}
                <tr >
                    <td>

                        <input type="checkbox" name="select" id="select">
                    </td>
                    <td>{{$bill->transection_id}}</td>
                    <td>

                         <strong>Client Name : </strong> <br>   {{$bill->client ? $bill->client ->name : "N/A"}} <br>
                         <strong>Client Phone :</strong>  <br> {{$bill->client ? $bill->client->phone : "N/A"}} <br>
                         <strong>Client Address :</strong>  <br> {{$bill->client ? $bill->client->address : "N/A"}} <br>



                    </td>
                    <td>

                            {{$bill->type}}



                    </td>
                    <td><span class="badge badge-success">{{$bill->status}}</span>
                    <td>
                       <strong>{{currencySignHelper($bill->order->type).$bill->paid}}</strong>


                    </td>


                    <td>
                      <strong> {{currencySignHelper($bill->order->type).$bill->total - $bill->due}}</strong>

                    </td>
                    <td>
                      <strong>{{currencySignHelper($bill->order->type).$bill->total}}</strong>

                    </td>
                        </td>
                    <td> {{!empty($bill->note) ? $bill->note :  "N/A"}}
                    </td>


 @foreach(
     $bill->products as $index => $product
     )
    @php

    $pro = $product->orderProduct;

    @endphp
    <td class=" p-0" >

        <div class="card px-3">
        <h5> <u>Product {{$index+1}}</u></h5>
      {{--  {{ $product->bill->order->products}} --}}
    @if ($pro)
            <span class="row">

                <strong>Name:</strong> {{ $pro->details->name }}<br>
            </span>
    <strong>Order Quantity: </strong> {{ ($pro->quantity) }} <strong> {{unitHelper($pro->costType)}} </strong><br>
    <strong>Total Delivered:</strong>{{ ($pro->delivered) }} <strong> {{unitHelper($pro->costType)}} </strong> <br>
    <strong>bill Quantity:</strong> {{ ($product->quantity) }} <strong> {{unitHelper($pro->costType)}} </strong> <br>
    <strong>Order Type : </strong>{{$order->type}} <br>
    <strong>Unit Type:
    </strong>
        {{unitHelper($pro->costType)}}
   <br>
    <strong>Total Amount: {{currencySignHelper($order->type)}}
         {{round(floatval($product->quantity) *  floatval( $pro->costingPrice ),2)}}</strong> <br>
    {{-- <strong>Product Quantity:</strong>{{$product->quantity}}<br> --}}
    @endif

{{-- <strong>Material:</strong>{{$bill->details->meterial}}<br>
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

                            <a class="btn btn-info m-1"  href="{{route('admin.bill.invoice',['order' => $order->id,'bill' =>  $bill->id])}}"> <i class="fa fa-print" aria-hidden="true"></i> </a>
                            {{-- <a class="btn btn-warning m-1" > <i class=" fas fa-truck"></i> </a> --}}
                            <a class="btn btn-dark m-1"  wire:click="payment({{$bill->id}})"> <i class=" fas fa-coins" style='color:#FFD700'></i> </a>
                            <button class="btn btn-primary m-1" {{-- wire:click="$emit('showModal',{{$data->id}})" --}}> <i class=" fa fa-edit"></i> </button>
                            <button class="btn btn-danger m-1"  wire:click="$emit('deleteConfirmation',{{$bill ? $bill->id : ''}})" > <i class=" fa fa-trash"></i> </button>

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

             {{$bills->links()}}
          </div>
        </div>
        <!-- /.card-body -->
        <x-partials.modal title="Payment">



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
      <div class="form-row mx-3 my-2">

                    <label for="paymentType" class="col-sm-2 col-form-label"> Type</label>
              <div class="col-sm-10">

              <select   class="form-control @error('paymentType') is-invalid @enderror" id="paymentType" wire:model.defer="paymentType">
              <option value="">Choose Option ...</option>
              <option value="debit">Debit</option>
              <option value="credit">Credit</option>
              </select>
              @error('paymentType')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
          </div>
          </div>






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
</div>
