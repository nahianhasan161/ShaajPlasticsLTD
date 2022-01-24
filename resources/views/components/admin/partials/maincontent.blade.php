<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@if (isset($title)){{$title}}@else Title @endif</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">@if (isset($root)){{$root}}@else Root @endif</a></li>
              <li class="breadcrumb-item active">@if (isset($child)){{$child}}@else Child @endif</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    {{$slot}}
   {{--  <a class="btn btn-app bg-danger position-fixed z-index rounded-lg" style="right:20px; bottom:20px">

        <i class="fas fa-plus-circle"></i> Create
      </a> --}}
    <!-- /.content -->
  </div>
