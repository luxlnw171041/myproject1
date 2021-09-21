@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
              <li class="breadcrumb-item active">mounthly Sale Report</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">mounthly Sale Report</h3>
              </div><br>
              <form method="GET" action="{{ url('/order-product/reportmonthly') }}" accept-charset="UTF-8" >
                            <div class="form-row" style="margin-left:19px">
                                <div class="col-4">
                                    @php
                                        $months = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฏาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
                                    @endphp
                                    <select class="form-control" name="month" id="month" >
                                        <option value="">เลือกเดือน</option>
                                        @foreach($months as $item)
                                        <option value="{{ $loop->iteration }}">{{ $item }}</option>
                                        @endforeach
                                    </select>                                    
                                    <script>
                                        document.querySelector("#month").value = "{{ request('month') }}"
                                    </script>
                                </div>
                                <div class="col-4">
                                    @php
                                        //$start_at = 2020;
                                        $start_at = date('Y');
                                    @endphp
                                    <select class="form-control" name="year" id="year">
                                        <option value="">เลือกปี</option>
                                        @for($year = $start_at; $year > $start_at - 5 ; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>                                      
                                    <script>
                                        document.querySelector("#year").value = "{{ request('year') }}"
                                    </script>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-search"></i> Search
                                    </button>
                                </div>
                            </div>   
                        </form>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    
                
                        
                  <thead class="text-center">
                  <tr>
                  <th>User</th><th>Order Time</th><th>Order id</th><th>Product</th><th>Quantity</th><th>Price</th><th>Total</th><th>Cost</th>
                  </tr>
                  </thead>
                  <tbody class="text-center">
                  @foreach($orderproduct as $item)
                  <tr>
                    <td>{{ $item->user->name }}</td>
                    <td class="text-center">{{ $item->created_at->format('l d F Y') }}  <br> Time {{ $item->created_at->format('H:i') }}</td>
                    <!-- <td>{{ $item->created_at  }}</td> -->
                    <td>{{ $item->order_id }}</td>
                    <td>                                            
                        <div>
                            @if(!empty($item->product->photo))
                                <img src="{{ url('storage/'.$item->product->photo )}}" width="100" /> 
                            @endif
                        </div>                                            
                        <div>
                            @if(!empty($item->product->title))
                                {{ $item->product->title }}
                            @endif
                        </div>
                    </td>
                    <td>{{ $item->sum_quantity }} </td>
                    <td>{{ number_format($item->avg_price) }}</td>
                    <td>{{ number_format($item->sum_total) }}</td>   
                    <td>{{ number_format($item->sum_cost) }}</td>   
                  </tr>
                  @endforeach
                  </tfoot>
                </table>
                <h2>Total Price {{ number_format($orderproduct->sum('sum_total')) }} Bath</h2>
                <h2>Total Cost {{ number_format( (($orderproduct->sum('sum_total'))) -  (($orderproduct->sum('sum_total')) - ($orderproduct->sum('sum_cost')))) }} Bath</h2>
                <h2>Net Profit {{ number_format(($orderproduct->sum('sum_total')) - ($orderproduct->sum('sum_cost'))) }} Bath</h2>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

<!-- 
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card mb-4">
                    <div class="card-header">รายงานรายเดือน</div>
                    <div class="card-body">
                        <form method="GET" action="{{ url('/order-product/reportmonthly') }}" accept-charset="UTF-8" >
                            <div class="form-row">
                                <div class="col-4">
                                    @php
                                        $months = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฏาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
                                    @endphp
                                    <select class="form-control" name="month" id="month" >
                                        <option value="">เลือกเดือน</option>
                                        @foreach($months as $item)
                                        <option value="{{ $loop->iteration }}">{{ $item }}</option>
                                        @endforeach
                                    </select>                                    
                                    <script>
                                        document.querySelector("#month").value = "{{ request('month') }}"
                                    </script>
                                </div>
                                <div class="col-4">
                                    @php
                                        //$start_at = 2020;
                                        $start_at = date('Y');
                                    @endphp
                                    <select class="form-control" name="year" id="year">
                                        <option value="">เลือกปี</option>
                                        @for($year = $start_at; $year > $start_at - 5 ; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>                                      
                                    <script>
                                        document.querySelector("#year").value = "{{ request('year') }}"
                                    </script>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-search"></i> Search
                                    </button>
                                </div>
                            </div>   
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">รายงานเดือน : {{ request('month') }} / {{ request('year') }} </div>
                    <div class="card-body">                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>สมาชิก</th><th>วันที่สั่งซืื้อ</th><th>เลขที่สั่งซื้อ</th><th>สินค้า</th><th>จำนวน</th><th>ราคา</th><th>รวม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orderproduct as $item)
                                    <tr>
                                        
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->created_at  }}</td>
                                        <td>{{ $item->order_id }}</td>
                                        <td>                                            
                                            <div>
                                                @if(!empty($item->product->photo))
                                            <img src="{{ url('storage/'.$item->product->photo )}}" width="100" /> 
                                        @endif
                                        </div>                                            
                                            <div>@if(!empty($item->product->title)){{ $item->product->title }}@endif</div>
                                        </td>
                                        <td>{{ $item->sum_quantity }}</td>
                                        <td>{{ $item->avg_price }}</td>
                                        <td>{{ $item->sum_total }}</td>                                        
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>                           
                        </div>
                        <h2>รวมราคาสินค้า {{ number_format($orderproduct->sum('sum_total')) }} บาท</h2>

                        


                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection