@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">สต๊อกสินค้า</div>
                    <div class="card-body">                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>รหัสสินค้า</th><th>ชื่อสินค้า</th><th>จำนวน</th><th>ราคา</th><th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($product as $item)
                                    <tr>
                                    <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->quantity }}</td>      
                                        <td>{{ $item->price }}</td>      
                                        <td>
                                        @if (Auth::user()->role === "admin" )
                                            <a href="{{ url('/product/' . $item->id . '/edit') }}" title="Edit Product"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button></a>
                                            <form method="POST" action="{{ url('/product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                            @if (Auth::user()->role === "admin" )
                                                <button style="float:right;" type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="far fa-trash-alt"></i></i> </button>
                                            @endif
                                            </form>
                                @endif      </td>      
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>                           
                        </div>
                       

                        


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection