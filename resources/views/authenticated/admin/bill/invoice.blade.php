<x-layout.admin >

    <body class="sidebar-mini layout-fixed sidebar-open">
    <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('/img/logo/logo-sm.png')}}" alt="AdminLTELogo" height="60" width="60">
        {{-- {{asset('adminlte/dist/img/AdminLTELogo.png')}} --}}
        {{-- {{asset('/img/logo/logo-sm.png')}} --}}
      </div>

      <!-- Navbar -->
     <x-admin.partials.navbar>

    </x-admin.partials.navbar>
     <!-- /.navbar -->

     <!-- Main Sidebar Container -->

     <x-admin.partials.mainsidebar>



    </x-admin.partials.mainsidebar>

    <!-- Content Wrapper. Contains page content -->
    <x-admin.partials.maincontent>

                <section class="container-fluid">

                    <div class="row">
                      <div class="col-12">
                        {{-- <div class="callout callout-info">
                          <h5><i class="fas fa-info"></i> Note:</h5>
                          This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                        </div> --}}


                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                          <!-- title row -->
                          <div class="row">
                            <div class="col-12">
                                <h1 class="text-center">
                                    {{-- 'https://i.ibb.co/1QhsfSY/logo1.png' --}}
                                     <img src="{{asset('img/logo/logo-sm.png')}}" alt="AdminLTE Logo" class="" style="opacity: .8;">
                                    {{-- <img src="{{asset('frontend/images/text-logo.png')}}" alt="Logo" class="" style="height:50px"> --}}
                                     <span class="font-weight-bold text-primary" style="font-family: Xavier  ;  ">Shaaj Plastics LTD</span>
                                </h1>
                              <h4>
                                {{-- <i class="fas fa-globe"></i> AdminLTE, Inc. --}}
                                <small class="float-right">Date: {{\Carbon\Carbon::now()->format('d-m-Y');}}</small>
                              </h4>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- info row -->
                          <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <b>Order No. {{$order->tracking_id}}</b><br>
                                To,
                              <address>
                                <strong>{{$order->company->name}}</strong><br>
                                {{$order->company->address}}<br>
                                {{-- San Francisco, CA 94107<br> --}}
                                Phone: {{$order->company->phone}}<br>
                               {{--  Email: info@almasaeedstudio.com --}}
                              </address>
                            </div>
                            <!-- /.col -->
                           {{--  <div class="col-sm-4 invoice-col">
                              To
                              <address>
                                <strong>John Doe</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (555) 539-1037<br>
                                Email: john.doe@example.com
                              </address>
                            </div> --}}
                            <!-- /.col -->
                            {{-- <div class="col-sm-4 invoice-col">

                              <br>
                              <b>Order ID:</b> 4F3S8J<br>
                              <b>Payment Due:</b> 2/22/2014<br>
                              <b>Account:</b> 968-34567
                            </div> --}}
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                          <u><h1 class="text-center text-bold"> Bill</h1></u>
                          <!-- Table row -->
                          <div class="row">
                            <div class="col-12 table-responsive">
                              <table class="table table-striped">
                                <thead>
                                <tr>
                                  <th>item</th>
                                  <th>Description</th>
                                  <th>Quantity</th>
                                  <th>Rate</th>
                                  <th>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @forelse ($bill->products as $key => $product)
                                    <tr>
                                       {{--  {{$product->details}} --}}
                                       @php

                                           $total = $total + ($product->orderProduct->costingPrice) * $product->quantity
                                       @endphp
                                        <td>{{$key + 1}}</td>
                                        <td>{{$product->orderProduct->details->name}} - {{$product->orderProduct->details->thickness}}" - {{$product->orderProduct->details->color}}</td>
                                        <td>({{$product->quantity}} X {{$product->orderProduct->costType  }}{{ unitHelper($product->orderProduct->costType)}}) = {{$product->quantity * $product->orderProduct->costType}}<strong> Pis </strong> </td>
                                         <td>
                                            <strong >

                                            {{currencySignHelper($order->type )}}

                                            </strong>

                                            {{$product->orderProduct->costingPrice}}/




                                            <strong>
                                                {{unitHelper($product->orderProduct->costType)}}
                                            </strong>


                                        </td>
                                        <td>

                                            {{currencySignHelper($order->type )}}  {{round(($product->orderProduct->costingPrice) * $product->quantity,2)}}</td>
                                      </tr>
                                    @empty
                                        N/A
                                    @endforelse

                               {{--  <tr>
                                  <td>2</td>
                                  <td>Hanger Big size</td>
                                  <td>22</td>
                                  <td>10$/DZ</td>
                                  <td>$50.00</td>
                                </tr> --}}

                                </tbody>
                              </table>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->

                          <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                              <p class="lead">Terms & Conditions:</p>
                           {{--    <img src="../../dist/img/credit/visa.png" alt="Visa">
                              <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                              <img src="../../dist/img/credit/american-express.png" alt="American Express">
                              <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> --}}

                              <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">

                              <p> <strong>1.</strong> 90 day's at sight letter of credit in our favor.<br></p>
                              <p> <strong>2.</strong>  Cash payment: 50% payments will be made before start production and balance 50% payment will be paid before delivery.<br></p>
                              <p> <strong>3.</strong>  Delivery will be sten 10 days receiving UC or cash payment.<br></p>
                              <p> <strong>4.</strong> Price Validity should be 20 days. <br></p>


                              </p>

                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                             {{--  <p class="lead">Amount Due 2/22/2014</p> --}}

                              <div class="table-responsive">
                                <table class="table">
                                  <tr>
                                    <th style="width:50%" class="ml-5">total:</th>
                                    <td>
                                        <strong >
                                            @if ($product->type == 'lc')
                                                $
                                                @else
                                                ৳
                                            @endif
                                            {{round($total,2)}}
                                        </strong>
                                    </td>
                                  </tr>
                                 {{--  <tr>
                                    <th>Tax (9.3%)</th>
                                    <td>$10.34</td>
                                  </tr>
                                  <tr>
                                    <th>Shipping:</th>
                                    <td>$5.80</td>
                                  </tr>
                                  <tr>
                                    <th>Total:</th>
                                    <td>$265.24</td>
                                  </tr> --}}
                                </table>

                              </div>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                          <hr style="width: 100%">
                       <p class="text-center">  <strong>Head Office :</strong>  9/B/1. Hosne Dalan Road. Nam. Bagicha. Lalbagh. Dhaka, Cell 01748 986129. 01761 898555 <br>
                           <strong>Email :</strong>  shaajplastIcind@gmail.com habib©shaajplastic corn. Webs. : www.shaaiplaslic.com
                           <br>
                           <strong>Factory :</strong>  Dakkhin Dawutpur, Bhatpara. Panchdona. Narsingdi
                       </p>

                          <!-- this row will not appear when printing -->
                       {{--    <div class="row no-print">
                            <div class="col-12">
                              <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                              <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                Payment
                              </button>
                              <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Generate PDF
                              </button>
                            </div>
                          </div> --}}
                        </div>
                        <!-- /.invoice -->
                      </div><!-- /.col -->
                    </div><!-- /.row -->

                </section>
                <!-- /.content -->


    </x-admin.partials.maincontent>

    <!-- /.content-wrapper -->
   {{--  <x-admin.partials.footer>

            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
              <b>Version</b> 3.2.0-rc
            </div>

    </x-admin.partials.footer> --}}


      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    </x-layout.admin>
