<div>

{{--      <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary" wire:click="showPhoto('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRyXvzJib8clmr-0OhQgf-bd4CAyj_NUdWj3A&usqp=CAU')">
    Launch demo modal
  </button> --}}

  <!-- Modal -->
  <div class="modal fade" data-backdrop="false" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content bg-transparent">


            <button type="button" class="close " data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>


          <img src=" {{asset($bigPhoto)}} " alt="" srcset="">

      </div>
    </div>
  </div>


    <div class="table-responsive">


        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Image</th>

              <th>Name</th>
              <th>Meterial</th>
              <th>Code</th>
              <th>Quantity</th>
              <th>Weight</th>
              <th>Number of Stripe</th>
              <th>Thickness</th>
              <th>Packaging Type</th>
              <th>Category</th>
              <th>Color</th>
              <th>Active</th>
              <th style="width: 40px">Action</th>
            </tr>
          </thead>
          <tbody>



            @forelse ($products as $key => $product)


            <tr>
              <td>{{$key+1}}</td>
              <td >


                    <img src="{{asset($product->image)}}" wire:click="showPhoto('{{$product->id}}')"  alt="" srcset="">


                </td>


              <td>
                 {{$product->name}}
                </td>

              <td>






                  <div>
                      <strong class="bold" style="font-size: 2rem">  {{$product->meterial}} </strong>


                  </div>

              </td>
              <td>



              <div>
                  <strong class="bold"  style="font-size: 2rem"> {{$product->code}}  </strong>
                  <span class="badge bg-danger"> TK Per Bag</span>

              </div>


              </td>
              <td>



              <div>
                  <strong class="bold"  style="font-size: 2rem"> {{$product->quantity}}  </strong>
                  <span class="badge bg-danger">  Pis</span>

              </div>


              </td>
              <td>



              <div>
                  <strong class="bold"  style="font-size: 2rem"> {{$product->weight}}  </strong>
                  <span class="badge bg-danger"> Kg</span>

              </div>


              </td>
              <td>



              <div>
                  <strong class="bold"  style="font-size: 2rem"> {{$product->stripes}}  </strong>
                  <span class="badge bg-danger"> stripes</span>

              </div>


              </td>
              <td>



              <div>
                  <strong class="bold"  style="font-size: 2rem"> {{$product->thickness}}  </strong>
                  <span class="badge bg-danger"> inces</span>

              </div>


              </td>
              <td>



              <div>
                  <strong class="bold"  style="font-size: 2rem"> {{$product->packaging}}  </strong>


              </div>

              </td>
              <td>



              <div>
                  <strong class="bold"  style="font-size: 2rem"> {{$product->category->name}}  </strong>


              </div>

              </td>
              <td>



              <div>
                  <strong class="bold"  style="font-size: 2rem"> {{$product->color}}   </strong>


              </div>


              </td>
              <td>
                <label class="switch">
                    @if ($product->active == 0)
                    <input type="checkbox" wire:click="isActive({{$product->id}})">
                    @else

                    <input type="checkbox" wire:click="isActive({{$product->id}})" checked>
                    @endif
                    <span class="slider round"></span>
                  </label>
              </td>
              <td>
                  <div class="custom-control d-flex">

                  <a class="btn btn-warning m-1" {{-- href="/admin/inventory/row-metarial/{{$data->id}}" --}}> <i class=" fa fa-eye"></i> </a>
                  <button class="btn btn-primary m-1" wire:click="updateProduct({{$product->id}})"> <i class=" fa fa-edit"></i> </button>
                  <button class="btn btn-danger m-1"  wire:click="$emit('deleteConfirmation',{{$product->id}})" > <i class=" fa fa-trash"></i> </button>

              </div>
          </td>
            </tr>
            @empty
            <h1>Empty</h1>
            @endforelse

          </tbody>
        </table>
        <div class="float-right">
            {{$products->links()}}
        </div>
    </div>
</div>

@push('scripts')
<script>

    livewire.on('showPhoto', event =>{
        $('#exampleModalCenter').modal('show');
    })
    </script>
@endpush
