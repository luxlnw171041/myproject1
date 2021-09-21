@extends('layouts.app')

@section('content')
<style>
.item2 { grid-area: menu; }
.item3 { grid-area: main; }
.item5 { grid-area: footer; }

.grid-container {
  display: grid;
  grid-template-areas:
    'header header header header header header'
    'menu main main main main main'
    'menu footer footer footer footer footer';
}
.aa {
  text-decoration: none;
  color:black;
}

.aa:hover {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>
<section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/product') }}">Home</a></li>
              <li class="breadcrumb-item active">order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <a href="#" onclick="goBack()" title="Back"><button class="btn btn-light"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            </div>
                            <div class="col-md-7 d-flex justify-content-start">
                                <h3 class="text-center">Product</h3>
                            </div>
                            @php
                                $orderproduct = $order->order_products;
                            @endphp

                            @foreach($orderproduct as $item)
                                @if(!empty($item->product->id))
                                    <div class="col-md-12">
                                        <a class="aa" href="{{ url('/product/' . $item->product->id) }}">
                                            <div class="grid-container col-md-12">
                                                    <div class="item2"><img src="{{ url('storage/'.$item->product->photo )}}" width="150" /></div>
                                                    <div class="item3"><br>{{ $item->product->title }}</div>  
                                                    <div class="item5 d-flex justify-content-end text-right">x{{ $item->quantity }} <br> ฿{{ number_format($item->price) }}</div>
                                            
                                            </div>
                                        </a>
                                    </div>
                                @else
                                    <h5 class="text-center">ไม่มีข้อมูลสินค้า สินค้าอาจถูกนำออกไปแล้ว</h5>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row" style="font-size:15px">
                                <div class="col-md-12">
                                    <br>
                                        <h5> <b>Order No {{ $order->id }}</b> </h5>
                                    <br>
                                </div>
                                <div class="col-md-2 ">
                                   <b>Name</b> 
                                </div>
                                <div class="col-md-6">
                                    {{ $order->user->name }}
                                </div>
                                <div class="col-md-12"><hr></div>
                                <div class="col-md-2">
                                    <b>Total</b> 
                                </div>
                                <div class="col-md-6">
                                    {{ number_format($order->total) }} บาท
                                </div>
                                <div class="col-md-12"><hr></div>
                                <div class="col-md-2">
                                    <b>Status</b> 
                                </div>
                                <div class="col-md-10">
                                    {{ $order->status }}
                                </div>
                                <div class="col-md-12"><hr></div>
                                <div class="col-md-3">
                                    <b>Order Time</b> 
                                </div>
                                <div class="col-md-5">
                                    {{ $order->created_at->thaidate('l j F Y') }} 
                                </div>
                                <div class="col-md-12"><hr></div>
                                <div class="col-md-3">
                                    <b>Payment Time</b> 
                                </div>
                                <div class="col-md-5">
                                     @if(!empty($order->payment->created_at))
                                        {{ $order->payment->created_at->thaidate('l j F Y') }} 
                                    @endif
                                </div>
                                <div class="col-md-12"><hr></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection