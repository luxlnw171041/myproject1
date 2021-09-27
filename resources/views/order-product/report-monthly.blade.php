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
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">ยอดขายรายเดือน</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div>
    @if(!empty($month))
    <h1 class="text-center">ยอดขายเดือน 
    @switch($month)
        @case('1')
            <span>มกราคม</span>
        @break
        @case('2')
            <span>กุมภาพันธ์</span>
        @break
        @case('3')
            <span>มีนาคม</span>
        @break
        @case('4')
            <span>เมษายน</span>
        @break
        @case('5')
            <span>พฤษภาคม</span>
        @break
        @case('6')
            <span>มิถุนายน</span>
        @break
        @case('7')
            <span>กรกฏาคม</span>
        @break
        @case('8')
            <span>สิงหาคม</span>
        @break
        @case('9')
            <span>กันยายน</span>
        @break
        @case('10')
            <span>ตุลาคม</span>
        @break
        @case('11')
            <span>พฤศจิกายน</span>
        @break
        @case('12')
            <span>ธันวาคม</span>
        @break
    @endswitch 
        <span> ปี {{ $year }}  </span>
    @else
      <h1 class="col-md-12 text-center">ยอดขายรายเดือน</h1><br>
    @endif

    
    </div>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card"><br>
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
                                        <i class="fa fa-search"></i> ค้นหา
                                    </button>
                                </div>
                            </div>   
                        </form>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="report" class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                        <th>ชื่อผู้ใช้</th><th>เวลาสั่งซื้อ</th><th>รหัสสั่งซื้อ</th><th>สินค้า</th><th>จำนวน</th><th>ราคา</th><th>รวม</th><th>ต้นทุน</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($orderproduct as $item)
                        <tr>
                            <td>{{ $item->user->name }}</td>
                            <td> {{ $item->created_at->thaidate('l j F Y') }} <br> เวลา {{ $item->created_at->format('h:i') }}</td>
                            <!-- <td class="text-center">{{ $item->created_at->format('l d F Y') }}  <br> Time {{ $item->created_at->format('H:i') }}</td> -->
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
                        <tr >
                            <td colspan="8" class="d-none">รวมทั้งหมด {{ number_format($orderproduct->sum('sum_total')) }} บาท</td>
                            <td class="d-none"> ต้นทุนทั้งหมด {{ number_format( (($orderproduct->sum('sum_total'))) -  (($orderproduct->sum('sum_total')) - ($orderproduct->sum('sum_cost')))) }} บาท</td>
                            <td class="d-none">กำไร {{ number_format(($orderproduct->sum('sum_total')) - ($orderproduct->sum('sum_cost'))) }} บาท</td>
                            <td class="d-none"></td>
                            <td class="d-none"></td>
                            <td class="d-none"></td>
                            <td class="d-none"></td>
                            <td class="d-none"></td>
                        </tr>
                    </tbody>
                </table>
                <h2>รวมทั้งหมด {{ number_format($orderproduct->sum('sum_total')) }} บาท</h2>
                <h2>ต้นทุนทั้งหมด {{ number_format( (($orderproduct->sum('sum_total'))) -  (($orderproduct->sum('sum_total')) - ($orderproduct->sum('sum_cost')))) }} บาท</h2>
                <h2>กำไร {{ number_format(($orderproduct->sum('sum_total')) - ($orderproduct->sum('sum_cost'))) }} บาท</h2>
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