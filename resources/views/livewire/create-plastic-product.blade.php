<div>
    <div class="container m-3" wire:click ="createModalButton">
        <button type="button" class="btn btn-primary" >
            Create New Plastic Product
           </button>

    </div>
 <x-partials.modal>
    <div wire:loading.class="text-muted">
        <form autocomplete="off"  wire:submit.prevent="{{$showEditModal ? 'updateProduct' : 'createProduct' }}">
            @csrf


        <div class="form-row mx-3 my-2">
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

                    <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
              <div class="col-sm-10">

              <input type="number" class="form-control @error('request.quantity') is-invalid @enderror" placeholder=" Product Quantity" id="quantity" wire:model.defer="request.quantity">

              @error('request.quantity')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
          </div>
          </div>

          <div class="form-row mx-3 my-2">

            <label for="category" class="col-sm-2 col-form-label">Category</label>
      <div class="col-sm-10">
        <select id="category" class="custom-select @error('request.category_id')
        is-invalid
        @enderror"  wire:model="request.category_id">
          <option value="">Please Select One</option>

        @foreach ($categories as $category)

        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach



        </select>



      @error('request.category_id')

      <div class="invalid-feedback">
          {{$message}}
      </div>
      @enderror
      <small ><u> <a class="text-danger" href="{{route('admin.inventory.product.category')}}">Create New Category</a> </u></small>
  </div>
  </div>

          <div class="form-row mx-3 my-2">


              <label for="meterial" class="col-sm-2 col-form-label">Meterial</label>
              <div class="col-sm-10">
              <input type="text" class="form-control @error('request.meterial') is-invalid @enderror  " placeholder=" Product meterial" name="meterial" id="meterial" wire:model.defer="request.meterial">

              @error('request.meterial')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>
            </div>

          <div class="form-row mx-3 my-2">


              <label for="code" class="col-sm-2 col-form-label">Code</label>
              <div class="col-sm-10">
              <input type="text" class="form-control @error('request.code') is-invalid @enderror  " placeholder=" Product code" name="code" id="code" wire:model.defer="request.code">

              @error('request.code')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>
            </div>
          <div class="form-row mx-3 my-2">


              <label for="weight" class="col-sm-2 col-form-label">Weight</label>
              <div class="col-sm-10">
              <input type="number" class="form-control @error('request.weight') is-invalid @enderror  " placeholder=" Product weight" name="weight" id="weight" wire:model.defer="request.weight">

              @error('request.weight')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>
            </div>

          <div class="form-row mx-3 my-2">


              <label for="stripes" class="col-sm-2 col-form-label">Stripes</label>
              <div class="col-sm-10">
              <input type="number" class="form-control @error('request.stripes') is-invalid @enderror  " placeholder=" Product stripes" name="stripes" id="stripes" wire:model.defer="request.stripes">

              @error('request.stripes')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>
            </div>

          <div class="form-row mx-3 my-2">


              <label for="thickness" class="col-sm-2 col-form-label">Thcikness</label>
              <div class="col-sm-10">
              <input type="number" class="form-control @error('request.thickness') is-invalid @enderror  " placeholder=" Product thickness" name="thickness" id="thickness" wire:model.defer="request.thickness">

              @error('request.thickness')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>
            </div>
          <div class="form-row mx-3 my-2">


              <label for="packaging" class="col-sm-2 col-form-label">Packaging Type</label>
              <div class="col-sm-10">
              <input type="text" class="form-control @error('request.packaging') is-invalid @enderror  " placeholder=" Product packaging" name="packaging" id="packaging" wire:model.defer="request.packaging">

              @error('request.packaging')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>
            </div>
          <div class="form-row mx-3 my-2">


              <label for="color" class="col-sm-2 col-form-label">Color</label>
              <div class="col-sm-10">
              <input type="text" class="form-control @error('request.color') is-invalid @enderror  " placeholder=" Product color" name="color" id="color" wire:model.defer="request.color">

              @error('request.color')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>
            </div>
          <div class="form-row mx-3 my-2">


              <label for="price" class="col-sm-2 col-form-label">Price Per Pis</label>
              <div class="col-sm-10">
              <input type="number" class="form-control @error('request.price') is-invalid @enderror  " placeholder=" Per Pis Price" name="price" id="price" wire:model.defer="request.price">

              @error('request.price')

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
                  <small id="imageHelp" class="form-text text-muted">Size:500X300</small>
                  @error('request.image')

                  <div class="invalid-feedback">
                     {{$message}}
                  </div>
                  @enderror
                </div>
                <div wire:loading>
                    Uploading ...
                </div>
                 @if ($photo)
                Photo Preview:
                <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail" >
                 @endif
                </div>



        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="Submit" wire:loading.attr="disabled" class="btn btn-primary">Save changes</button>
        </div>
    </form>

</div>



 </x-partials.modal>
</div>
