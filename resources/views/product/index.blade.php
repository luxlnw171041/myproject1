@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="col-md-12 card">
        <div class="row d-flex justify-content-center">
           
        
            <div class="col-md-12  card-header">
                <div class="row col-md-12">
                    <div class="col-md-6">
                        @if (Auth::user()->role  == "admin" )
                                        <a href="{{ url('/product/create') }}" class="btn btn-success btn-sm" title="Add New Product">
                                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                        </a>
                        @endif
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <form method="GET" action="{{ url('/product') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            

            
            @foreach($product as $item)

            <div class="col-md-2" >
            <div class="row">
                    <br>
                    <div class="card" style="width: 18rem;">
                        <a href="{{ url('/product/' . $item->id) }}">
                            <center><img class="d-flex justify-content-center" style="width: 100%;height: 200px;object-fit: contain;" src="{{ url('storage/'.$item->photo )}}" width="120" /></center>
                            <div class="card-body">
                                <h5 class="card-title" style="margin-top:-10px;white-space: nowrap;width: 150px;overflow: hidden;text-overflow: ellipsis;font-size:15px ">{{ $item->title }} </h5>
                                <!-- <p class="card-text">{{ $item->content }}</p> -->
                                <p style="color:red;float:right">฿<b>{{ number_format($item->price) }}</b></p>
                          
                                
                                @if (Auth::user()->role === "admin" )
                                            <hr style="margin-top:45px">
                                            <a href="{{ url('/product/' . $item->id . '/edit') }}" title="Edit Product"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button></a>
                                            <form method="POST" action="{{ url('/product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                            @if (Auth::user()->role === "admin" )
                                                <button style="float:right;" type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="far fa-trash-alt"></i></i> </button>
                                            @endif
                                            </form>
                                @endif  
                            </div>
                        </a>
                    </div>
                </div> 
                <br>
            </div>&nbsp;&nbsp;&nbsp;
            @endforeach
            <!-- <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Product</div>
                    <div class="card-body">
                    

                        @if (Auth::user()->role  == "admin" )
                        <a href="{{ url('/product/create') }}" class="btn btn-success btn-sm" title="Add New Product">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        @endif
                        <form method="GET" action="{{ url('/product') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>ชื่อ</th>
                                        <th>รายละเอียด</th>
                                        <th>ราคา</th>
                                        @if (Auth::user()->role === "admin" )
                                        <th>ต้นทุน</th>
                                        @endif
                                        <th>รูปภาพ</th>
                                        <th>จำนวน</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($product as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->content }}</td>
                                        <td>{{ $item->price }}</td>
                                        @if (Auth::user()->role === "admin" )
                                        <td>{{ $item->cost }}</td>
                                        @endif
                                        <td><img src="{{ url('storage/'.$item->photo )}}" width="120" /></td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>
                                            <a href="{{ url('/product/' . $item->id) }}" title="View Product"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            @if (Auth::user()->role === "admin" )
                                            <a href="{{ url('/product/' . $item->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            @endif  
                                            <form method="POST" action="{{ url('/product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                            @if (Auth::user()->role === "admin" )
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            @endif
                                            </form>
                                        </td>
                                    </tr>

                                    
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $product->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                   
                </div>
            </div> -->
        </div>
    </div>
    </div>
    </div>
@endsection
<style>
/* unvisited link */
a:link {
  color: black;
}

/* visited link */
a:visited {
  color: black;
}

/* mouse over link */
a:hover {
    color:black;
    text-decoration:none;
    cursor:pointer;
}

/* selected link */
a:active {
  color: black;
}
a {
text-decoration: none !important;
color: black;
}
</style>