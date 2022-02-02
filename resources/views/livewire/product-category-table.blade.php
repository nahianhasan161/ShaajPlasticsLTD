<div>



 <!-- Modal -->
 <div data-backdrop="false" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content bg-transparent">


           <button type="button" class="close " data-dismiss="modal" aria-label="Close" >
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
             <th>slug</th>
             <th>active</th>

             <th style="width: 40px">Action</th>
           </tr>
         </thead>
         <tbody>



           @forelse ($categories as $key => $product)


           <tr>
             <td>{{$key+1}}</td>
             <td >


                   <img  wire:click="showPhoto({{$product->id}})" role="button" class="img-thumbnail"  src="{{asset($product->image) }} "  alt="" srcset="">


               </td>


             <td>
                {{$product->name}}

               </td>

             <td>






                 <div>
                     <strong class="bold" style="font-size: 2rem">  {{$product->slug}} </strong>


                 </div>

             </td>

             <td>






                 <div>
                     <strong class="bold" style="font-size: 2rem">  {{$product->active ?? 'N/A'}} </strong>


                 </div>

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

