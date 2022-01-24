<x-layout.admin>

    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('/img/logo/logo-sm.png')}}" alt="AdminLTELogo" height="60" width="60">
        {{-- {{asset('adminlte/dist/img/AdminLTELogo.png')}} --}}
      </div>

      <!-- Navbar -->
     <x-admin.partials.navbar>

    </x-admin.partials.navbar>
     <!-- /.navbar -->

     <!-- Main Sidebar Container -->

     <x-admin.partials.mainsidebar>


    </x-admin.partials.mainsidebar>

    <!-- Content Wrapper. Contains page content -->
    <x-admin.partials.maincontent title="Row Metarial" root="Inventory" child="Row Metarial">
        {{-- create product --}}
       {{--  <div class="container row m-3 ">

            <div class="col-md-6 card ">
                <h4 class="card-title mt-3">Create Product</h4>
             <form class="card-body" wire:submit.prevent="createProduct">

                 <div class="form-group row">
                   <label for="productName" class="col-sm-2 col-form-label"> Name</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control @error('productName')
                         is-invalid
                     @enderror" id="inputProductName" wire:model.defer="productName">
                     <div class="invalid-feedback">
                      Please provide a valid city.
                    </div>
                   </div>



                 </div>



                 <div class="form-group row">
                   <div class="col-sm-10">
                     <button type="submit" class="btn btn-primary">Create Product</button>
                   </div>
                 </div>
               </form>
            </div>
            <div class="col-md-6 ">
            <div class="container card">
             <h4 class="card-title mt-3">Create Product Code</h4>
             <form class="card-body" autocomplete="false" wire:submit.prevent="createProductCode">
                 <div class="form-group row">
                   <label for="inputEmail3" class="col-sm-2 col-form-label"> Name</label>
                   <div class="col-sm-10">
                    <div class="form-group">
                        <select class="custom-select @error('productNameForCode')
                        is-invalid
                        @enderror"  wire:model.defer="productNameForCode">
                          <option value="">Please Select One</option>
                            @foreach ($allProducts as $product)

                            <option value="{{$product->name}}">{{$product->name}}</option>
                            @endforeach

                        </select>
                        @error('productNameForCode')

                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                   </div>
                 </div>


                 <div class="form-group row">
                   <label for="productCode" class="col-sm-2 col-form-label"> Code</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control @error('productCode')
                         is-invalid
                     @enderror" id="productCode" wire:model.defer="productCode">
                     <div class="invalid-feedback">Example invalid custom select feedback</div>
                   </div>
                 </div>



                 <div class="form-group row">
                   <div class="col-sm-10">
                     <button type="submit" class="btn btn-primary">Create Product Code</button>
                   </div>
                 </div>
               </form>
            </div>
        </div>
     </div> --}}



        <!-- Modal -->
     {{--  <x-partials.modal>
          <input type="text">
      </x-partials.modal> --}}
     @livewire('modal',[

         'Modal' => 'App\\Models\\RowMetarial',
     ]

     )

        {{-- table --}}
        <livewire:row-metarial-table></livewire:row-metarial-table>
            <!-- /.card-body -->

          </div>

    </x-admin.partials.maincontent>

    <!-- /.content-wrapper -->
    <x-admin.partials.footer>

            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
              <b>Version</b> 3.2.0-rc
            </div>

    </x-admin.partials.footer>


      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


    </x-layout.admin>
