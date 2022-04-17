<x-layout.admin>

    <body class="sidebar-mini layout-fixed sidebar-collapse">
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

     <x-admin.partials.mainsidebar active='inventory'>


    </x-admin.partials.mainsidebar >

    <!-- Content Wrapper. Contains page content -->
    <x-admin.partials.maincontent title="Row Metarial" root="Inventory" child="Row Metarial">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

          <!-- Timelime example  -->
          <div class="row">
            <div class="col-md-12">
              <!-- The time line -->
              <div class="timeline">
                <!-- timeline time label -->
                <div class="time-label">
                  <h1 class="bg-red">
                    {{$factory->name}}
                    {{-- <strong>Item Quantity :</strong>{{$factory->quantity}} <br>
                    <strong>Item Price :</strong>{{$factory->price}} <br> --}}
                </h1>
                  {{-- <span class="bg-red">10 Feb. 2014</span> --}}
                </div>
                <!-- /.timeline-label -->

                @forelse ($productions as $history)
                     <!-- timeline item -->

                <div>
                    <i class="fa fa-cubes bg-blue"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="fas fa-clock"></i> {{$history->created_at}}</span>
                      <h3 class="timeline-header"><a href="#">{{$history->name}} <br>
                        {{$history->quantity}}
                    </a> </h3>

                      <div class="timeline-body">
                          @forelse ( $history->rowMaterials as $item)
                          <strong>Item Name :</strong>{{$item->name}} <br>
                          <strong>Item Quantity :</strong>{{$item->quantity}} <strong>Kg</strong> <br>
                          <strong>Per Pis Quantity :</strong>{{(($item->quantity * 1000)/($history->quantity))}} <strong>g</strong> <br>

                          @empty
                              <h1>No item Found</h1>
                          @endforelse

                      </div>
                      <div class="timeline-footer">
                        {{-- <a class="btn btn-primary btn-sm">Read more</a> --}}
                       {{--  <a class="btn btn-danger btn-sm">Delete</a> --}}
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                @empty
                    <h1 class="text-center">No History Found</h1>
                @endforelse


                  {{$productions->links()}}
              </div>
            </div>
            <!-- /.col -->
          </div>
        </div>
        <!-- /.timeline -->

      </section>
      <!-- /.content -->

        {{-- <livewire:row-metarial-table></livewire:row-metarial-table> --}}
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
