@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">ProductAttribute {{ $productattribute->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/product-attribute') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/product-attribute/' . $productattribute->id . '/edit') }}" title="Edit ProductAttribute"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('productattribute' . '/' . $productattribute->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete ProductAttribute" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $productattribute->id }}</td>
                                    </tr>
                                    <tr><th> Productattribute Id </th><td> {{ $productattribute->productattribute_id }} </td></tr><tr><th> Product Id </th><td> {{ $productattribute->product_id }} </td></tr><tr><th> Size </th><td> {{ $productattribute->size }} </td></tr><tr><th> Price </th><td> {{ $productattribute->price }} </td></tr><tr><th> Stock </th><td> {{ $productattribute->stock }} </td></tr><tr><th> Sku </th><td> {{ $productattribute->sku }} </td></tr><tr><th> Status </th><td> {{ $productattribute->status }} </td></tr><tr><th> Created At </th><td> {{ $productattribute->created_at }} </td></tr><tr><th> Updated At </th><td> {{ $productattribute->updated_at }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
