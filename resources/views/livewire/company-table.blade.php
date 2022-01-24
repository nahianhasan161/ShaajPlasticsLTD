<div>
    <div>
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Expandable Table</h3>
            </div>
            <!-- ./card-header -->
            <div class="card-body">
              <table class="table table-bordered table-hover table-responsive">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>

                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($companies as $company)

                    <tr >
                        <td>

                            <input type="checkbox" name="select" id="select">
                        </td>
                        <td>

                            <strong>{{$company->name}}</strong>
                        </td>
                        <td><strong>{{$company->phone}}</strong></td>
                        <td>


                            <strong>Address:</strong>
                            <Address>
                                {{$company->address}}
                            </Address>


                        </td>


                        <td>

                            <div class="custom-control d-flex">

                                <a class="btn btn-warning m-1" {{-- href="/admin/inventory/row-metarial/{{$data->id}}" --}}> <i class=" fa fa-eye"></i> </a>
                                <button class="btn btn-primary m-1" {{-- wire:click="$emit('showModal',{{$data->id}})" --}}> <i class=" fa fa-edit"></i> </button>
                                <button class="btn btn-danger m-1"  wire:click="$emit('deleteConfirmation',{{$company->id}})" > <i class=" fa fa-trash"></i> </button>

                            </div>
                        </td>
                    </tr>
                    <tr>

                        @empty
                        Empty
                        @endforelse
                    </tr>












                </tbody>
              </table>
              <div class="card">

                  {{$companies->links()}}
              </div>
            </div>
            <!-- /.card-body -->
          </div>
    </div>

</div>
