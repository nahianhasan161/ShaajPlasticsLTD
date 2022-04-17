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

     <x-admin.partials.mainsidebar>


    </x-admin.partials.mainsidebar active='inventory'>

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
                  <span class="bg-red">
                      <strong>Item Name :</strong>{{$RowMaterial->name}} <br>
                    <strong>Item Quantity :</strong>{{$RowMaterial->quantity}} <br>
                    <strong>Item Price :</strong>{{$RowMaterial->price}} <br>
                </span>
                  {{-- <span class="bg-red">10 Feb. 2014</span> --}}
                </div>
                <!-- /.timeline-label -->

                @forelse ($RowMaterial->histories->sortByDesc('created_at')/* ->take(10) */ as $history)
                     <!-- timeline item -->
                <div>
                    <i class="fa fa-cubes bg-blue"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="fas fa-clock"></i>created: {{$history->created_at}}</span>
                      <h3 class="timeline-header"><a href="#">{{$history->user->name}}</a> </h3>

                      <div class="timeline-body">
                          <div class="d-flex justify-content-between">

                              <div>
                                  <strong>Item Name :</strong>{{$history->name}} <br>

                                @if ($history->type == 'updated')
                                <div class="text-danger">

                                    <strong>Old Item Quantity :</strong>{{$history->oldQuantity}} <br>
                                    <strong>Old Item Price :</strong>{{priceHelper($history->oldQuantity,$history->oldPrice)}} <br>
                                </div>
                                    @endif
                                <div   @if ($history->type == 'Used') class="text-danger" @endif>

                                    <strong>Item Quantity :</strong>{{$history->quantity}} Bag<br>
                                    <strong>Item Price :</strong>{{$history->price}}tk Per Bag<br>
                                </div>
                            </div>
                            <div>
                                <strong  @if ($history->type == 'Used' || $history->type == 'updated') class="text-danger" @else class="text-success" @endif ><span class="time"><i class="fas fa-check"></i>Quantity {{ $history->type }}</strong> <br>
                            </div>
                          </div>

                      </div>
                      <div class="timeline-footer">
                        <div class="d-flex justify-content-between">
                            <div class="">
                               {{--  <a class="btn btn-primary btn-sm">Read more</a>
                                <a class="btn btn-danger btn-sm">Delete</a> --}}
                            </div>
                            <div>
                                <strong class="text-success"><span class="time"><i class="fas fa-clock"></i>Date:{{ \Carbon\Carbon::parse($history->date)->format('d/m/Y')}}</strong> <br>
                            </div>
                        </div>


                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                @empty
                    <h1 class="text-center">No History Found</h1>
                @endforelse



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
