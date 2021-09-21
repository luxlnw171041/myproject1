
@extends('layouts.app')
@section('content')
<div class="content ">
    <!-- Content Header (Page header) -->
    <section class="content-header ">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
              <li class="breadcrumb-item active">Payment</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<div class="content " >
      <div class="container-fluid ">
        <div class="row d-flex justify-content-center">
          <div class="col-10">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Payment</h3>
              </div>
              <!-- /.card-header -->
            <div class="card-body">
                <table id="example3" class="table table-bordered table-striped" >
                    <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>datetime</th>
                                <th>Price</th>
                                <th>UserName</th>
                                <th>Slip</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    <tbody>
                        @foreach($payment as $item)
                            <tr class="text-center">
                                <td>{{ $item->order_id }}</td>
                                <td class="text-center">{{ $item->created_at->thaidate('l j F Y') }}  <br> เวลา {{ $item->created_at->format('H:m') }}</td>
                                <!-- <td class="text-center">{{ $item->created_at->format('l d F Y') }}  <br> Time {{ $item->created_at->format('H:m') }}</td> -->
                                <td>
                                    {{ number_format($item->total) }} บาท
                                </td>
                                <td>{{ $item->user->name }}</td>
                                
                                <td class="text-center">
                                    <a href="{{ url('/storage/'.$item->slip )}}" data-toggle="lightbox" data-title="sample 12 - black" data-gallery="gallery">
                                        <img src="{{ url('/storage/'.$item->slip )}}" width="100" />
                                    </a>
                                </td>
                                <td>
                                    
                                    <a href="{{ url('/payment/' . $item->id) }}" title="View Payment"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                    @if(Auth::user()->role == "admin")
                                    <a href="{{ url('/payment/' . $item->id . '/edit') }}" title="Edit Payment"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                    <form method="POST" action="{{ url('/payment' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Payment" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                    @endif
                                    </form>
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
    </div>
</div>
@endsection

