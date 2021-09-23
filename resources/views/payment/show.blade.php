@extends('layouts.app')

@section('content')
<section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/product') }}">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">รายละเอียดการชำระเงิน</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div>
    <h1 class="col-md-12 text-center">รายละเอียดการชำระเงิน</h1><br>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="#" onclick="goBack()" title="Back"><button class="btn btn-light"><i class="fa fa-arrow-left" aria-hidden="true"></i> กลับ</button></a>
                            </div>
                            <div class="col-md-7 d-flex justify-content-start">
                                <h3 class="text-center">หลักฐานการชำระเงิน</h3>
                            </div>
                            
                            <div class="col-md-12"><br>
                                <a href="{{ url('/storage/'.$payment->slip )}}" data-toggle="lightbox" data-title="sample 12 - black" data-gallery="gallery">
                                                <img src="{{ url('/storage/'.$payment->slip )}}" width="100%" />
                                </a>
                            </div>
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
                                        <h5> <b>หมายเลขสั่งซื้อที่ {{ $payment->id }}</b> </h5>
                                    <br>
                                </div>
                                <div class="col-md-2 ">
                                   <b>ชื่อ</b> 
                                </div>
                                <div class="col-md-6">
                                    {{ $payment->user->name }}
                                </div>
                                <div class="col-md-12"><hr></div>
                                <div class="col-md-2">
                                    <b>เวลาสั่งซื้อ</b> 
                                </div>
                                <div class="col-md-6">
                                    {{ $payment->created_at->thaidate('l j F Y') }} 
                                </div>
                                <div class="col-md-12"><hr></div>
                                <div class="col-md-2">
                                    <b>ราคา</b> 
                                </div>
                                <div class="col-md-6">
                                    {{ number_format($payment->total) }} บาท
                                </div>
                                <div class="col-md-12"><hr></div>
                                <div class="col-md-3">
                                    <b>เบอร์โทรศัพท์</b> 
                                </div>
                                <div class="col-md-6">
                                    
                                @if(!empty($payment->tel))
                                    <td>0{{ $payment->tel}}</td>
                                @else
                                    <td>{{ $payment->tel}}</td>
                                @endif
                                </div>
                                <div class="col-md-12"><hr></div>
                                <div class="col-md-2">
                                    <b>ที่อยู่</b> 
                                </div>
                                <div class="col-md-10">
                                    {{ $payment->address }} 
                                </div>
                                <div class="col-md-12"><hr></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
