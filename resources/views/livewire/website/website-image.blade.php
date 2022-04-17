<div>

{{-- @dump($images) --}}
    <div class="contact-wrapper card">
        <form autocomplete="off"   wire:submit.prevent="{{$images ? 'updateImages' : 'createImages'}}">
            @csrf
            <div class=" card form-row mx-3 my-2">

                <label for="landing_one" class="col-sm-2 col-form-label">Landing Image 1</label>
                <div class="col-sm-10">
                    <img class="img-fluid" src="{{asset(defaultHelper($images ? $images['landing_one'] : null))}}" alt="" srcset="">
                  <input type="file" class=" @error('landing_one') is-invalid @enderror  "   id="landing_one" wire:model.defer="landing_one">
                  <small id="imageHelpBlock" class="form-text text-muted">
                    size:1300X700
                  </small>
                  @error('landing_one')

                  <div class="invalid-feedback">
                     {{$message}}
                  </div>
                  @enderror
                  <div wire:loading wire:target="landing_one">Uploading...</div>
                </div>
                {{--  @if ($landing_one)
                Photo Preview:
                <img src="{{ $landing_one->temporaryUrl() }}" class="img-thumbnail" >
                 @endif --}}
                </div>
            <div class="card form-row mx-3 my-2">

                <label for="landing_two" class="col-sm-2 col-form-label">Landing Image 2</label>
                <div class="col-sm-10">
                    <img class="img-fluid" src="{{asset(defaultHelper($images ? $images['landing_two'] : null))}}" alt="" srcset="">

                  <input type="file" class=" @error('landing_two') is-invalid @enderror  "   id="landing_two" wire:model.defer="landing_two">
                  <small id="imageHelpBlock" class="form-text text-muted">
                    size:1300X700
                  </small>
                  @error('landing_two')

                  <div class="invalid-feedback">
                     {{$message}}
                  </div>
                  @enderror
                  <div wire:loading wire:target="landing_two">Uploading...</div>
                </div>
                {{-- @if ($photo)
                Photo Preview:
                <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail" >
                 @endif --}}
                </div>
            <div class="card form-row mx-3 my-2">

                <label for="landing_three" class="col-sm-2 col-form-label">Landing Image 3</label>
                <div class="col-sm-10">
                    <img class="img-fluid" src="{{asset(defaultHelper($images ? $images['landing_three'] : null))}}" alt="" srcset="">

                  <input type="file" class=" @error('landing_three') is-invalid @enderror  "   id="landing_three" wire:model.defer="landing_three">
                  <small id="imageHelpBlock" class="form-text text-muted">
                    size:1300X700
                  </small>
                  @error('landing_three')

                  <div class="invalid-feedback">
                     {{$message}}
                  </div>
                  @enderror
                  <div wire:loading wire:target="landing_three">Uploading...</div>
                </div>
                {{-- @if ($photo)
                Photo Preview:
                <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail" >
                 @endif --}}
                </div>

            <div class="card form-row mx-3 my-2">

                <label for="certificate_one" class="col-sm-2 col-form-label">certificate Image 1</label>
                <div class="col-sm-10">
                    <img class="img-fluid" src="{{asset(defaultHelper($images ? $images['certificate_one'] : null))}}" alt="" srcset="">

                  <input type="file" class=" @error('certificate_one') is-invalid @enderror  "   id="certificate_one" wire:model.defer="certificate_one">
                  <small id="imageHelpBlock" class="form-text text-muted">
                    size:650X300
                  </small>
                  @error('certificate_one')

                  <div class="invalid-feedback">
                     {{$message}}
                  </div>
                  @enderror
                  <div wire:loading wire:target="certificate_one">Uploading...</div>
                </div>

                </div>
            <div class="card form-row mx-3 my-2">

                <label for="certificate_two" class="col-sm-2 col-form-label">certificate Image 2</label>
                <div class="col-sm-10">
                    <img class="img-fluid" src="{{asset(defaultHelper($images ? $images['certificate_two'] : null))}}" alt="" srcset="">

                  <input type="file" class=" @error('certificate_two') is-invalid @enderror  "   id="certificate_two" wire:model.defer="certificate_two">
                    <small id="imageHelpBlock" class="form-text text-muted">
                    size:650X300
                  </small>
                  @error('certificate_two')

                  <div class="invalid-feedback">
                     {{$message}}
                  </div>
                  @enderror
                  <div wire:loading wire:target="certificate_two">Uploading...</div>
                </div>
                {{-- @if ($photo)
                Photo Preview:
                <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail" >
                 @endif --}}
                </div>
            <div class="card form-row mx-3 my-2">

                <label for="certificate_three" class="col-sm-2 col-form-label">certificate Image 3</label>
                <div class="col-sm-10">

                    <img class="img-fluid" src="{{asset(defaultHelper($images ? $images['certificate_three'] : null))}}" alt="" srcset="">

                  <input type="file" class=" @error('certificate_three') is-invalid @enderror  "   id="certificate_three" wire:model.defer="certificate_three">
                    <small id="imageHelpBlock" class="form-text text-muted">
                    size:650X300
                  </small>
                  @error('certificate_three')

                  <div class="invalid-feedback">
                     {{$message}}
                  </div>
                  @enderror
                  <div wire:loading wire:target="certificate_three">Uploading...</div>
                </div>
                {{-- @if ($photo)
                Photo Preview:
                <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail" >
                 @endif --}}
                </div>
            <div class="card form-row mx-3 my-2">

                <label for="about" class="col-sm-2 col-form-label">About Image</label>
                <div class="col-sm-10">

                    <img class="img-fluid" src="{{asset(defaultHelper($images ? $images['about'] : null))}}" alt="" srcset="">

                  <input type="file" class=" @error('about') is-invalid @enderror  "   id="about" wire:model.defer="about">
                    <small id="imageHelpBlock" class="form-text text-muted">
                    size:650X300
                  </small>
                  @error('about')

                  <div class="invalid-feedback">
                     {{$message}}
                  </div>
                  @enderror
                  <div wire:loading wire:target="about">Uploading...</div>
                </div>
                {{-- @if ($photo)
                Photo Preview:
                <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail" >
                 @endif --}}
                </div>
            <div class="card form-row mx-3 my-2">

                <label for="distribution" class="col-sm-2 col-form-label">distribution Image</label>
                <div class="col-sm-10">
                    <img class="img-fluid" src="{{asset(defaultHelper($images ? $images['distribution'] : null))}}" alt="" srcset="">

                  <input type="file" class=" @error('distribution') is-invalid @enderror  "   id="distribution" wire:model.defer="distribution">
                    <small id="imageHelpBlock" class="form-text text-muted">
                    size:650X300
                  </small>
                  @error('distribution')

                  <div class="invalid-feedback">
                     {{$message}}
                  </div>
                  @enderror
                  <div wire:loading wire:target="distribution">Uploading...</div>
                </div>
                {{-- @if ($photo)
                Photo Preview:
                <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail" >
                 @endif --}}
                </div>
            <div class="card form-row mx-3 my-2">

                <label for="office_one" class="col-sm-2 col-form-label">Office 1 Image</label>
                <div class="col-sm-10">

                    <img class="img-fluid" src="{{asset(defaultHelper($images ? $images['office_one'] : null))}}" alt="" srcset="">

                  <input type="file" class=" @error('office_one') is-invalid @enderror  "   id="office_one" wire:model.defer="office_one">
                    <small id="imageHelpBlock" class="form-text text-muted">
                    size:650X300
                  </small>
                  @error('office_one')

                  <div class="invalid-feedback">
                     {{$message}}
                  </div>
                  @enderror
                  <div wire:loading wire:target="office_one">Uploading...</div>
                </div>
                {{-- @if ($photo)
                Photo Preview:
                <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail" >
                 @endif --}}
                </div>
            <div class="card form-row mx-3 my-2">

                <label for="office_two" class="col-sm-2 col-form-label">office 2 Image</label>
                <div class="col-sm-10">

                    <img class="img-fluid" src="{{asset(defaultHelper($images ? $images['office_two'] : null))}}" alt="" srcset="">

                  <input type="file" class=" @error('office_two') is-invalid @enderror  "   id="office_two" wire:model.defer="office_two">
                    <small id="imageHelpBlock" class="form-text text-muted">
                    size:650X300
                  </small>
                  @error('office_two')

                  <div class="invalid-feedback">
                     {{$message}}
                  </div>
                  @enderror
                  <div wire:loading wire:target="feature">Uploading...</div>
                </div>
                {{-- @if ($photo)
                Photo Preview:
                <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail" >
                 @endif --}}
                 <button type="Submit" class=" btn btn-lg btn-primary">Save</button>
                </div>



        </form>
        </div>
        {{defaultHelper('to')}}

        </div>
