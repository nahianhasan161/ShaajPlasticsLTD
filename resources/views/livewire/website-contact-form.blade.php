


<div >

    <div>
        <form autocomplete="off"  wire:submit.prevent="createContact">

            <div>

                <input type="text" class="form-control @error('request.name') is-invalid @enderror  "
                placeholder="Your Name" name="price" id="price"
                wire:model="request.name">

                @error('request.name')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div>
            <input type="text" class="form-control @error('request.email') is-invalid @enderror  "
               placeholder="Your Email" name="price" id="price"
                wire:model="request.email">

              @error('request.email')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            <input type="tel" class="form-control @error('request.phone') is-invalid @enderror  "
               placeholder=" Your  Phone" name="phone" id="phone"
                wire:model="request.phone">

              @error('request.phone')

              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror

            </div>

              <div>

                  <textarea class="form-control @error('request.note') is-invalid @enderror  "
                  placeholder="Write Someting ..." name="note" id="note"
                  wire:model="request.note"></textarea>

                  @error('request.note')

                  <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                </div>



            <button type="submit" class="submit mb-4">Submit</button>
         </form>
         </div>
 </div>
