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
              <li class="breadcrumb-item"><a href="{{ url('product') }}">Home</a></li>
              <li class="breadcrumb-item active">stock</li>
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
                <h3 class="card-title">product</h3>
                <div class="d-flex justify-content-end">
                  <a href="{{ url('/product/create') }}" class="btn btn-success btn-sm" title="Add New Product">
                      <i class="fa fa-plus" aria-hidden="true"></i> Add New
                  </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>product_id</th> <th>photo</th> <th>name</th><th>quantity</th><th>price</th><th>Cost</th><th>action</th>
                    </tr>
                  </thead>
                    <tbody>
                        @foreach($product as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td class="text-center"><img width="164px" src="{{ url('storage/'.$item->photo )}}" alt="..." /></td>
                                <td>{{ $item->title }} </td>
                                <td>{{ $item->quantity }}</td>      
                                <td>{{ $item->price }}</td>      
                                <td>{{ $item->cost }}</td>  
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
                                    @endif      
                                </td>      
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
    </div> -->


@endsection