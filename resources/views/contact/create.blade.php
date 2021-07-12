@extends('layouts.app')
@section('content')
    <div class="container">
    @if ($errors->all())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>
            {{$error}}
        </li>
    @endforeach
    </ul>
    @endif
    
    {!! Form::open(['action' => 'ContactController@store','method'=>'POST']) !!}
        <div class='col-md-6'>
            <div class="form-grop">  
             {!! Form::label('Name') !!} 
             {!! Form::text('name',null,["class"=>"form-control"])!!}
             </div>
             <div class="form-grop">  
             {!! Form::label('Email') !!} 
             {!! Form::text('email',null,["class"=>"form-control"])!!}
             </div>
             <div class="form-grop">  
             {!! Form::label('phone') !!} 
             {!! Form::text('phone',null,["class"=>"form-control"])!!}
             </div>
             <div class="form-grop">  
             {!! Form::label('Address') !!} 
             {!! Form::text('address',null,["class"=>"form-control"])!!}
             </div>

            <input type="submit" value="บันทึก" class="btn btn-primary">
        </div> 
        
    {!! Form::close() !!}
    </div>
@endsection