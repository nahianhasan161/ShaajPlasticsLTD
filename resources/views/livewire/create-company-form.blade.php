<div>
    <div>
        <div class="container m-3" wire:click ="createModalButton">
            <button type="button" class="btn btn-primary" >
                Create New Row Metarial
               </button>

        </div>
     <x-partials.modal>



        <form autocomplete="off"  wire:submit.prevent="{{ false ? 'updateOrder' : 'createVia' }}">
            @csrf


            <div class="form-row mx-3 my-2">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">

                  <input type="text" class="form-control @error('request.name') is-invalid @enderror  " placeholder="Company Phone" name="name" id="name" wire:model.defer="request.name">

                  @error('request.name')

                  <div class="invalid-feedback">
                     {{$message}}
                  </div>
                  @enderror
                </div>
                </div>

                <div class="form-row mx-3 my-2">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">

                      <input type="number" class="form-control @error('request.phone') is-invalid @enderror  " placeholder="Company Phone" name="phone" id="phone" wire:model.defer="request.phone">

                      @error('request.phone')

                      <div class="invalid-feedback">
                         {{$message}}
                      </div>
                      @enderror
                    </div>
                    </div>



        <div class="form-row mx-3 my-2">
            <label for="address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">

              <textarea type="text" class="form-control @error('request.address') is-invalid @enderror  " placeholder=" address" name="address" id="address" wire:model.defer="request.address"></textarea>

              @error('request.address')

              <div class="invalid-feedback">
                 {{$message}}
              </div>
              @enderror
            </div>
            </div>




        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>









     </x-partials.modal>
    </div>


</div>


