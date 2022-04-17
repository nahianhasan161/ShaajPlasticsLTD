<div>
    <div class="container m-3" wire:click ="createModalButton">
        <button type="button" class="btn btn-primary" >
            Create New  Factory
           </button>

    </div>
 <x-partials.modal>

     <div wire:loading.class="text-muted">
        <form  autocomplete="off"  wire:submit.prevent="{{$showEditModal ? 'updateFactory' : 'createFactory' }}">
            @csrf

        <div class="form-row mx-3 my-2"  >
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">

              <input type="text" class="form-control @error('name') is-invalid @enderror  " placeholder=" Factory Name" name="name" id="name" wire:model.defer="name">

              @error('name')

              <div class="invalid-feedback">
                 {{$message}}
              </div>
              @enderror
            </div>
            </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="Submit" wire:loading.attr="disabled" class="btn btn-primary"  >Save changes</button>
        </div>
    </form>
</div>




 </x-partials.modal>

 <div class="row">
     @forelse ($factories as $factory)
     <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">

            {{-- <button class="btn btn-danger m-1 float-right"  wire:click="$emit('deleteConfirmation',{{$factory->id}})" > <i class=" fa fa-trash"></i> </button> --}}
          <a href="#" class="small-box-footer  " wire:click="updateModal({{$factory->id}})"> <i class="fas fa-pen text-warning"></i> Edit</a>
          <a href="#" class="small-box-footer  float-right" wire:click="$emit('deleteConfirmation',{{$factory->id}})"> <i class="fas fa-trash text-danger"></i> Delete</a>
          <div class="inner">
              <h3 class="bold">{{$factory->name}}</h3>

            <h4>{{$factory->rowmeterials->count()}}</h4>

          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{route('admin.inventory.factory_meterial',['id' => $factory->id])}}" class="small-box-footer bg-primary">All Row Meterials <i class="fas fa-arrow-circle-right"></i></a>
          <a href="{{route('admin.inventory.factory_production',['id' => $factory->id])}}" class="small-box-footer bg-dark">Production <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
     @empty
         <h1 class="text-center">No Factory Found</h1>
     @endforelse



  </div>

</div>




