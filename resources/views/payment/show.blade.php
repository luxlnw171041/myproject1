@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Payment {{ $payment->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/payment') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        @if (Auth::user()->role === "admin" )
                        <a href="{{ url('/payment/' . $payment->id . '/edit') }}" title="Edit Payment"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('payment' . '/' . $payment->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Payment" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>
                        @endif
           
                        
                        <div class="card mt-4">
                            <div class="card-header">รายละเอียด Order </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table">
                                <tbody>
                               
                        
                                    <tr><th>ID</th><td>{{ $payment->id }}</td></tr>
                                    <tr><th> Total </th><td> {{ $payment->total }} </td></tr>
                                    <tr><th> User Id </th><td> {{ $payment->user_id }} </td></tr>
                                    <tr><th> Order Id </th><td> {{ $payment->order_id }} </td></tr>
                                    <tr><th> Slip </th><td> <img src="{{ url('storage/'.$payment->slip )}}"width="500" /></td></tr>
                                    <tr><th> Address </th><td> {{ $payment->address }} </td></tr>
                                </tbody>
                                </table>
                                </div>
                            </div>   
                            </div>
                        </div>

                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
