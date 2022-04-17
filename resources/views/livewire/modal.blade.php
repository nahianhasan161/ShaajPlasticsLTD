<div>
    <div class="container m-3" wire:click ="createModalButton">
        <button type="button" class="btn btn-primary" >
            Create New Row Metarial
           </button>

    </div>
 <x-partials.modal>



    <form autocomplete="off"  wire:submit.prevent="{{$showEditModal ? 'updateRowMetarial' : ($addMaterial ? 'addQuantity' : 'createRowMetarial' )}}">
        @csrf


@if (!$addMaterial && !$showEditModal)




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
        </div>
        @endif
@if ($showEditModal || $addMaterial)


@if ($showEditModal)

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
        </div>

@endif
            <div class="form-row mx-3 my-2">

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
      </div>



      <div class="form-row mx-3 my-2">


          <label for="price" class="col-sm-2 col-form-label">Price</label>
          <div class="col-sm-10">
          <input type="text" class="form-control @error('request.price') is-invalid @enderror  " placeholder="Row Metarial Price" name="price" id="price" wire:model.defer="request.price">
          <small class="text-danger">Per Bag</small>
          @error('request.price')

          <div class="invalid-feedback">
              {{$message}}
          </div>
          @enderror
        </div>
        </div>





@if($addMaterial)

<div class="form-row mx-3 my-2">


    <label for="price" class="col-sm-2 col-form-label">Date</label>
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
        {{-- minDate: new Date(), --}}


    </div>
</div>

@endif
@endif







    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Save changes</button>
    </div>
</form>










 </x-partials.modal>
</div>


