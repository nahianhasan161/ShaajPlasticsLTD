<div class="table-responsive">


    <table class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th>Produced Product Name</th>

          <th>Produced Product Name</th>
          <th>Row Material Name</th>
          <th>Row Material Name</th>
          <th>Date</th>

          <th style="width: 40px">Action</th>
        </tr>
      </thead>
      <tbody>



        @forelse ($categories as $key => $product)


        <tr>
          <td>{{$key+1}}</td>
          <td >


               <strong>{{$product->name}}</strong>


            </td>


          <td>
            <strong>
             {{$product->quantity}}
            </strong>
            </td>

          <td>






              <div>
                  <strong class="bold" style="font-size: 2rem">  {{$product->rowMaterials->first()->name}} </strong>


              </div>

          </td>

          <td>






              <div>
                  <strong class="bold" style="font-size: 2rem">  {{$product->rowMaterials->first()->quantity }} </strong>


              </div>

          </td>


          <td>
              <strong>

                  {{$product->created_at}}
              </strong>
          </td>




          <td>
              <div class="custom-control d-flex">

              <a class="btn btn-warning m-1" {{-- href="/admin/inventory/row-metarial/{{$data->id}}" --}}> <i class=" fa fa-eye"></i> </a>
              <button class="btn btn-primary m-1" wire:click="updateProduct({{$product->id}})" {{-- wire:click="$emit('showModal',{{$data->id}})" --}}> <i class=" fa fa-edit"></i> </button>
              <button class="btn btn-danger m-1"  wire:click="$emit('deleteConfirmation',{{$product->id}})" > <i class=" fa fa-trash"></i> </button>

          </div>
      </td>
        </tr>
        @empty
        <h1>Empty</h1>
        @endforelse

      </tbody>
    </table>
    {{$categories->links()}}
</div>
</div>

@push('scripts')
<script>

livewire.on('showPhoto', event =>{
    $('#exampleModalCenter').modal('show');
})
</script>
@endpush
