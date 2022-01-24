<div>

    <div>
        <div class="modal fade" id="ModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog" role="document" >
              <div class="modal-content">

                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">{{$title}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    {{$slot}}
                </div>




            </div>
          </div>







        </div>

    </div>
    </div>


@push('scripts')

<script>
        livewire.on('showModal',$event =>
        {
            if($event){
                livewire.emit('editRowMetarial',$event);
            }
            $('#ModalForm').modal('toggle');
        })
    </script>
       @endpush
