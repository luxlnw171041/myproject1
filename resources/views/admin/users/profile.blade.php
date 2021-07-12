@extends('layouts.app')

@section('content')
<center>
<div class="card-header" style="background-color: slateblue;width: 90%;font-size: 30px;filter: drop-shadow(3px 4px 6px black);">รายชื่อสมาชิก</div></center> 
<br>
<center>
<div class="table-responsive" >
<style>
                    .table {
                    display: table;
                    margin: 0px;
                    }
                    .tr {
                    display: table-row;
                    }
                    .th {
                    float: left;
                    display: table-cell;
                    font-weight: bold;
                    text-align: center;
                    vertical-align: middle;
                    width: 10%;
                    .td {
                    float: left;
                    display: table-cell;
                    vertical-align: middle;
                    }       
           
    </style>



                
                       <center>     
                            <div style="display: table width: 100%;">
                                
                                <div class="table"  style = "display: table";>
                                <div class="tr"  style = "display: table-row; background: azure";>
                                    <div class="th" style="border: 1px solid; width: 5%;">ลำดับ</div>
                                        <div class="th" style="border: 1px solid; width: 5%;">รหัสผู้ใช้</div>
                                        <div class="th" style="border: 1px solid;">ชื่อสมาชิก</div>
                                        <div class="th" style="border: 1px solid; width: 17%;">E-mail</div>
                                        
                                        <div class="th" style="border: 1px solid;">สถานะ</div>
                                        <div class="th" style="border: 1px solid;"></div>
                                       
                                </div>
                                </div>
                             
                        @foreach($user as $item) 

                         <form action="{{ url('/users/') }}/profile/{{ $item->id }}" method="POST"> 
                                    @if (Auth::user()->role === "admin" ) 
                                        {{ method_field('PATCH') }}
	                                    {{ csrf_field() }}       
                                        
                                
                                <div class="table"  style = "display: table";>
                                    <div class="tr"  style = "display: table-row; background: azure";>
                                        <div class="th" style="height: 45px;border: 1px solid; padding-top: 10px; width: 5%;" >{{ $loop->iteration }}</div>
                                        <div class="th" style="height: 45px;border: 1px solid; width: 5%; padding-top: 10px;">{{ $item->id }}</div>
                                        <div class="th" style="height: 45px;border: 1px solid; padding-top: 10px;"> {{ $item->name }}</div>
                                        <div class="th" style="height: 45px;border: 1px solid; padding-top: 10px; width: 17%;"> {{ $item->email }}</div>
                                        <div class="th" style="height: 45px;border: 1px solid; padding-top: 10px;"> {{ $item->role }}</div>
                                        <div class="th" style="height: 45px;border: 1px solid; padding-top: 10px;">
                                       
                                       
                                            <div class="th" style="height: 45px;border: 1px solid; padding-top: 10px; "> 
                                            <button type="submit" class="btn btn-success btn-sm" value = "submit" 
                                            style="background-color: orange;border-color: white; filter: drop-shadow(2px 4px 6px black); width: 71px; ">ยืนยัน</button></div>
                                </div>
                                </div>
                               </center>
                                <tbody>
                               
                                    <!-- <td>
			                            <input class="btn btn-primary" type="submit" style="background-color: springgreen;" value="ยืนยัน">
                                    </td> -->
                                    @else
                                        <td>{{ $item->role }}</td>
                                    @endif 
                                    </tr>
                                    </form>
                                @endforeach
                                </tbody>
                            </table>
                    </div>  
                    </div>
                    
                    </center>
  
@endsection