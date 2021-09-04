<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = 25;
        $users = User::all();
        
        switch(Auth::user()->role)
        {
                case "admin" : 
                    $users = User::latest()->paginate($perPage);
    
                    if (!empty($keyword)) {
                        $users = User::where('user_id', 'LIKE', "%$keyword%")
                            ->orWhere('name', 'LIKE', "%$keyword%")
                            ->orWhere('email', 'LIKE', "%$keyword%")
                            ->orWhere('role', 'LIKE', "%$keyword%")
                            ->latest()->paginate($perPage);
                    } else {
                        $users = User::latest()->paginate($perPage);
                    }
                    break;
            default : 
                //means guest
                $users = User::where('id',Auth::id() )->latest()->paginate($perPage);      
        }  
        
        return view('admin.users.index', compact('users'));

        }

    public function profile1(Request $request)
    {
        $perPage = 25;
        $users = User::all();
        
        switch(Auth::user()->role)
        {
                case "admin" : 
                    $users = User::latest()->paginate($perPage);
    
                    if (!empty($keyword)) {
                        $users = User::where('user_id', 'LIKE', "%$keyword%")
                            ->orWhere('name', 'LIKE', "%$keyword%")
                            ->orWhere('email', 'LIKE', "%$keyword%")
                            ->orWhere('role', 'LIKE', "%$keyword%")
                            ->latest()->paginate($perPage);
                    } else {
                        $users = User::latest()->paginate($perPage);
                    }
                    break;
            default : 
                //means guest
                $users = User::where('id',Auth::id() )->latest()->paginate($perPage);      
        }  
        
        return view('admin_shop.users' , compact('payment'));

        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $users = User::all();
        return view ('admin.users.edit')->with([
            'user' => $user ,
            
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $requestData = $request->all();
        $users = User::findOrFail($id);
        $users->update($requestData);
        return redirect('admin/users')->with('flash_message', 'User updated!');
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('admin/users')->with('flash_message', 'User deleted!');
    }

    // 

    public function store(Request $request)
    {

        $requestData = $request->all();
        User::create($requestData);
        return redirect('admin/users')->with('flash_message', 'user added!');
    
    }
}
