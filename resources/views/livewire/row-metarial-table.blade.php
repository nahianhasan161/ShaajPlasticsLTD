<div>
    <div class="card">
        {{-- <div class="card-header">
            <div class="row d-flex justify-content-between">

                <h3 class="card-title">Bordered Table</h3>
                <button type="button" class="btn btn-warning">
                    <i class="fa fa-filter">filters</i>
                </button>
            </div>
            <div class="row">
                <div class="col-3">
                      <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Preference</label>
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                      <option selected>Choose...</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-3">
                      <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Preference</label>
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                      <option selected>Choose...</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-3">
                      <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Preference</label>
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                      <option selected>Choose...</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-3">
                      <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Preference</label>
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                      <option selected>Choose...</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                </div>
            </div>
        </div> --}}
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Name</th>

                <th>Qantity</th>
                <th>Price</th>
                <th style="width: 40px">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($datas as $key => $data)


              <tr>
                <td>{{$key+1}}</td>
                <td >
                    {{$data->name}}


                </td>
                <td>




                    <div>
                        <strong class="bold"  style="font-size: 2rem" > {{kgTobagHelper($data->quantity)
                            }}   </strong>
                        <span class="badge bg-danger">  Bag</span>

                    </div>
                    <div>
                        <strong class="bold"  style="font-size: 2rem"> {{round($data->quantity,2)}}  </strong>
                        <span class="badge bg-danger"> KG</span>

                    </div>

                </td>
                <td>

                    <div>
                        <strong class="bold"  style="font-size: 2rem" > {{priceHelper($data->price,$data->quantity) }}  </strong>
                    <span class="badge bg-danger">TK Per KG</span>

                </div>
                <div>
                    <strong class="bold"  style="font-size: 2rem"> {{priceHelper($data->price,$data->quantity) * 25 }} </strong>
                    <span class="badge bg-danger"> TK Per Bag</span>

                </div>
                <div>
                    <strong class="bold" style="font-size: 2rem"> {{round($data->price ,2)}}  </strong>
                    <span class="badge bg-danger">TK Total</span>

                </div>


            </td>
                <td>
                    <div class="custom-control d-flex">

                    <a class="btn btn-warning m-1" wire:click="$emit('addMaterial',{{$data->id}})"> <i class=" fa fa-plus"></i> </a>
                    <a class="btn btn-warning m-1" href="/admin/inventory/row-metarial/{{$data->id}}"> <i class=" fa fa-eye"></i> </a>
                    <button class="btn btn-primary m-1" wire:click="$emit('showModal',{{$data->id}})"> <i class=" fa fa-edit"></i> </button>
                    <button class="btn btn-danger m-1" wire:click="$emit('deleteConfirmation',{{$data->id}})"> <i class=" fa fa-trash"></i> </button>

                </div>
            </td>
              </tr>

              @endforeach
            </tbody>
          </table>
        </div>
        <div>

            <div class="card-footer clearfix ">
                <div class="float-right">
                    {{$datas->links()}}

                </div>
            </div>
        </div>
</div>
@push('scripts')
<script>
  /*   livewire.on('deleteRowMeterial',$event=>{
        alert($event);
    }) */
</script>

@endpush
