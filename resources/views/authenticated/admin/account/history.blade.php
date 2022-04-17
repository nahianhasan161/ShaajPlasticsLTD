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

     <x-admin.partials.mainsidebar active='account'>


    </x-admin.partials.mainsidebar>

    <!-- Content Wrapper. Contains page content -->
    <x-admin.partials.maincontent title="Accounts" root="Account" child="HIstory">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>৳{{$account->debit}}</h3>

                      <p>Total Debit</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>{{$histories->where('type','debit')->count()}}</h3>

                      <p>Total Debit Count</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3>{{$histories->where('type','credit')->count()}}</h3>

                      <p>Total Credit Count</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>৳{{$account->credit}}</h3>

                      <p>Total Credit </p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
              </div>


          <!-- Timelime example  -->
          <div class="row">
            <div class="col-md-12">
              <!-- The time line -->
              <div class="timeline">
                <!-- timeline time label -->
                <div class="time-label">
               {{--    <span class="bg-red">
                      <strong>Item Name :</strong>{{$RowMaterial->name}} <br>
                    <strong>Item Quantity :</strong>{{$RowMaterial->quantity}} <br>
                    <strong>Item Price :</strong>{{$RowMaterial->price}} <br>
                </span> --}}
                  {{-- <span class="bg-red">10 Feb. 2014</span> --}}
                </div>
                <!-- /.timeline-label -->
                @forelse ($histories as $history)
                <!-- timeline item -->
           <div>
               <i class="fa fa-cubes bg-blue"></i>
               <div class="timeline-item">
                 <span class="time"><i class="fas fa-clock"></i>created: {{ \Carbon\Carbon::parse($history->created_at)->format('d/m/Y')}}</span>
                 <h3 class="timeline-header"><a href="#">  @if ($history->type == 'credit')
                    <span class="badge badge-danger"> {{ucwords($history->type)}} </span>
                        @else
                        <span class="badge badge-success">{{ucwords($history->type)}} </span><br>
                    @endif</a> </h3>

                 <div class="timeline-body">
                     <div class="d-flex justify-content-between">
                        {{$history->note ?? "N/A"}}
                         <div>



                           @if ($history->type == 'debit')
                           <div class="text-success">

                               <strong>Amount :</strong>{{$history->amount}} <br>
                               <strong>Description:</strong>{{$history->reason}} <br>
                           </div>
                               @endif
                               @if ($history->type == 'credit')
                               <div class="text-danger" >


                               <strong>Amount :</strong>{{$history->amount}} TK<br>
                               <strong>Description :</strong>{{$history->reason}}<br>
                            </div>
                            @endif

                       </div>
                       <hr>
                       <strong>@if ($history->type == 'debit')
                        <div class="text-success">

                           +
                        </div>
                            @endif
                            @if ($history->type == 'credit')
                            <div class="text-danger" >


                           -
                         </div>
                         @endif
</strong>
                      {{--  <div>
                           <strong  @if ($history->type == 'Used' || $history->type == 'updated') class="text-danger" @else class="text-success" @endif ><span class="time"><i class="fas fa-check"></i>Quantity {{ $history->type }}</strong> <br>
                       </div> --}}
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

        <!-- /.timeline -->

      </section>
      <!-- /.content -->

        {{-- <livewire:row-metarial-table></livewire:row-metarial-table> --}}
            <!-- /.card-body -->

          </div>

    </x-admin.partials.maincontent>

    <!-- /.content-wrapper -->
    <x-admin.partials.footer>

            <strong>Copyright &copy; 2014-2021 <a href="">Shaaj Plastic Ind</a>.</strong>
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
