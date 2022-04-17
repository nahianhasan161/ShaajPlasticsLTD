<div wire:loading.class="text-muted">












{{-- Modal --}}




        <div class="modal  fade" id="ModalWebsiteForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog" role="document" >
              <div class="modal-content">

                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Send Message</h5>
                  <button type="button" class="btn-close close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

       <form autocomplete="off"  wire:submit.prevent="  createRequest">
            @csrf

            <h4>Your Details</h4>
        <div class="container">
            <div class="mb-3">

                <label for="inputName" class="form-label">Name</label>
                <input type="text" id="inputName" wire:model.defer="request.name" class="form-control @error('request.name')
                is-invalid
                @enderror"  placeholder="Your Name">
                @error('request.name')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">

                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" id="inputEmail" wire:model.defer="request.email" class="form-control @error('request.email')
                is-invalid
                @enderror" placeholder="Your Email" >
                @error('request.email')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">

                <label for="inputPhone" class="form-label">Phone</label>
                <input type="tel" id="inputPhone" wire:model.defer="request.phone" class="form-control @error('request.phone')
                is-invalid
                @enderror"  placeholder="Your Phone">
                @error('request.phone')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">

                <label for="inputNote" class="form-label">Details</label>
                <textarea id="inputNote" wire:model.defer="request.note" class="form-control @error('request.note')
                is-invalid
                @enderror"  placeholder="What Ever On Your Mind..."></textarea>
                @error('request.note')

                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

















        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary" wire:loading.attr="disabled">Submit</button>
        </div>
    </form>
</div>
</div>
</div>








    </div>


</div>


@push('scripts')

<script>
        livewire.on('showWebsiteModal',$event =>
        {
            /* if($event){
                livewire.emit('editRowMetarial',$event);
            } */
            $('#ModalWebsiteForm').modal('toggle');
        })

    </script>
       @endpush
