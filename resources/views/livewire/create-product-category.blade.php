<div>
    <div>
        <div class="container m-3" wire:click ="createModalButton">
            <button type="button" class="btn btn-primary" >
                Create New  Product Category
               </button>

        </div>
     <x-partials.modal>

         <div wire:loading.class="text-muted">
            <form  autocomplete="off"  wire:submit.prevent="{{$showEditModal ? 'updateProduct' : 'createProduct' }}">
                @csrf

            <div class="form-row mx-3 my-2"  >
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">

                  <input type="text" class="form-control @error('request.name') is-invalid @enderror  " placeholder=" Product Name" name="name" id="name" wire:model.defer="request.name">

                  @error('request.name')

                  <div class="invalid-feedback">
                     {{$message}}
                  </div>
                  @enderror
                </div>
                </div>
            <div class="form-row mx-3 my-2">

                <label for="image" class="col-sm-2 col-form-label">image</label>
                <div class="col-sm-10">

                  <input type="file" class=" @error('request.image') is-invalid @enderror  "   id="image" wire:model.defer="photo">
                  <small id="imageHelpBlock" class="form-text text-muted">
                    size:500X300
                  </small>
                  @error('request.image')

                  <div class="invalid-feedback">
                     {{$message}}
                  </div>
                  @enderror

                  <div wire:loading wire:target="photo">Uploading...</div>
                </div>
                @if ($photo)
                Photo Preview:
                <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail" >
                 @endif
                </div>















            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="Submit" wire:loading.attr="disabled" class="btn btn-primary"  >Save changes</button>
            </div>
        </form>
    </div>




     </x-partials.modal>
    </div>

</div>
