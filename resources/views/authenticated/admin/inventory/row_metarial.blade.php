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


    </x-admin.partials.mainsidebar>

    <!-- Content Wrapper. Contains page content -->
    <x-admin.partials.maincontent title="Row Metarial" root="Inventory" child="Row Metarial">

     @livewire('modal',[


         'Modal' => 'App\\Models\\RowMetarial',
         'factory' => $factory,
         'add' => true,
     ]

     )


        {{-- table --}}
        @livewire('row-metarial-table',[

           'Modal' => 'App\\Models\\RowMetarial',
            'factory' => $factory,

        ]

        )

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
