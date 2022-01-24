<div>
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Expandable Table</h3>
        </div>
        <!-- ./card-header -->
        <div class="card-body">
          <table class="table table-bordered table-hover table-responsive">
            <thead>
              <tr>
                <th>#</th>
                <th>Tracking_id</th>
                <th>Company</th>
                <th>Via</th>
                <th>Quantity</th>
                <th>Payment Type</th>
                <th>Doller Rate</th>
                <th>Status</th>
                <th>Note</th>
                <th>Price</th>
                <th>Product</th>
                <th>Action</th>
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
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->type}}</td>
                    <td>{{$order->rate}}</td>
                    <td>Approved</td>
                    <td>{{$order->note}}</td>
                    <td><strong>Per Pis : </strong>{{$order->price}}

                    <strong>Total : </strong>{{$order->price * $order->quantity}}
                    </td>
                    <td>



<strong>Name:</strong>{{$order->product->name}}<br>
<strong>Material:</strong>{{$order->product->meterial}}<br>
<strong>Code:</strong>{{$order->product->code}}<br>
<strong>Quantity:</strong>{{$order->product->quantity}}<br>
<strong>Weight:</strong>{{$order->product->weight}}<br>
<strong>Stripes:</strong>{{$order->product->stripes}}<br>
<strong>Thickness:</strong>{{$order->product->thickness}}<br>
<strong>Packaging:</strong>{{$order->product->packaging}}<br>
<strong>Color:</strong>{{$order->product->color}}<br>
<strong>Price:</strong>{{$order->product->price}}<br>








                    </td>
                    <td>

                        <div class="custom-control d-flex">

                            <a class="btn btn-warning m-1" {{-- href="/admin/inventory/row-metarial/{{$data->id}}" --}}> <i class=" fa fa-eye"></i> </a>
                            <button class="btn btn-primary m-1" {{-- wire:click="$emit('showModal',{{$data->id}})" --}}> <i class=" fa fa-edit"></i> </button>
                            <button class="btn btn-danger m-1"  wire:click="$emit('deleteConfirmation',{{$order->id}})" > <i class=" fa fa-trash"></i> </button>

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
        <!-- /.card-body -->
      </div>
</div>
