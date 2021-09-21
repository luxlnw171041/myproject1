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
              <li class="breadcrumb-item active">Yearly Sale Report</li>
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
                <h3 class="card-title">Yearly Sale Report</h3>
              </div><br>
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
                    <td>{{ $item->sum_quantity }}</td>
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