@extends('layouts.app')

@section('content')
<section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/product') }}">Home</a></li>
              <li class="breadcrumb-item active">Payment</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div>
        <h1 class="col-md-12 text-center">ชำระเงิน</h1><br>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">บัญชี</h3>
                        <ul style="list-style-type: none;">
                            <li>
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="{{ url('/img/SCB.jpg') }}" width="100" /> 
                                    </div>
                                    <div class="col-md-8" style="margin-left:80px;">
                                        <span style="font-size: 19px;">ธนาคารไทยพาณิชย์</span> <br>
                                        <span style="font-size: 19px;">045-289431-6</span> <br>
                                        <span style="font-size: 19px;">ชื่อบัญชี : นาย ธีรศักดิ์ เสนารักษ์</span> <br>
                                    </div>
                                </div>
                            </li>
                            <hr>
                            <li>
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="{{ url('/img/logo.jpg') }}" width="100" /> 
                                    </div>
                                    <div class="col-md-8" style="margin-left:80px;">
                                        <span style="font-size: 19px;">ธนาคารไทยพาณิชย์</span> <br>
                                        <span style="font-size: 19px;">045-289431-6</span> <br>
                                        <span style="font-size: 19px;">ชื่อบัญชี : นาย ธีรศักดิ์ เสนารักษ์</span> <br>
                                    </div>
                                </div>
                            </li>
                            <hr>
                            <li>
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="{{ url('/img/ธนาคารกรุงไทย.jpg') }}" width="100" /> 
                                    </div>
                                    <div class="col-md-8" style="margin-left:80px;">
                                        <span style="font-size: 19px;">ธนาคารกรุงไทย</span> <br>
                                        <span style="font-size: 19px;">045-289431-6</span> <br>
                                        <span style="font-size: 19px;">ชื่อบัญชี : นาย ธีรศักดิ์ เสนารักษ์</span> <br>
                                    </div>
                                </div>
                            </li>
                        </ul>
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
                                        <h5>หมายเลขสั่งซื้อที่ {{ $order->id }}</h5>
                                    <br>
                                </div>
                                <div class="col-md-2 ">
                                   <b>ชื่อ</b> 
                                </div>
                                <div class="col-md-6">
                                    {{ $order->user->name }}
                                </div>
                                <div class="col-md-12"><hr></div>
                                <div class="col-md-2">
                                    <b>วันที่สั่งซื้อ</b> 
                                </div>
                                <div class="col-md-6">
                                    {{ $order->created_at->thaidate('l j F Y') }} 
                                </div>
                                <div class="col-md-12"><hr></div>
                                <div class="col-md-2">
                                    <b>ราคา</b> 
                                </div>
                                <div class="col-md-6">
                                    {{ number_format($order->total) }} บาท
                                </div>
                                <div class="col-md-12"><hr></div>
                        </div>

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/payment') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('payment.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
