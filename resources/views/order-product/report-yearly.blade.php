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
              <li class="breadcrumb-item active">ยอดขายรายปี</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> <div>
    @if(!empty($year))
    <h1 class="text-center">ยอดขายปี {{ $year }}</h1>
    @else
      <h1 class="col-md-12 text-center">ยอดขายรายปี</h1><br>
    @endif
    </div>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card"><br>
                        <form method="GET" action="{{ url('/order-product/reportyearly') }}" accept-charset="UTF-8" >
                            <div class="form-row" style="margin-left:20px">
                                <div class="col-4">
                                    @php
                                        $start_at = 2021;
                                    @endphp
                                    <select class="form-control" name="year" id="year" >
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
                      <td>{{ $item->sum_quantity }}</td>
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
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <div id="chart_div"></div>
      
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
   
@endsection