<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    
    public function dashboard()
    {
        $users = User::all();
        $total_user = User::selectRaw('count(id) as count')
                    	->get();
				        foreach ($total_user as $key ) {
				        	$all_user = $key->count;
				        }
        $vmarket_desc =Order::groupBy('status')
            ->selectRaw('count(status) as count,status')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();
        $vmarket_desc_count[0] = "";
        $vmarket_desc_count[1] = "";
        $vmarket_desc_count[2] = "";
        $vmarket_desc_count[3] = "";
        $vmarket_desc_count[4] = "";

        for ($i=0; $i < count($vmarket_desc);) { 
            foreach($vmarket_desc as $item ){
                $vmarket_desc_count[$i] = $item->count;

                $i++;
            }
        }
      return view('admin_shop.dashboard', compact('all_user' ,'vmarket_desc'));


    }

    public function user()
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
        
        return view('admin_shop.users', compact('users'));


    }
    public function editadmin($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.editadmin', compact('user'));

        
        
    }
    // public function edit(User $user)
    // {
    //     $users = User::all();
    //     return view ('admin.users.editadmin')->with([
    //         'user' => $user ,
            
    //     ]);
        
    // }
    public function update(Request $request,$id)
    {
        $requestData = $request->all();
        $users = User::findOrFail($id);
        $users->update($requestData);
        return redirect('admin/user')->with('flash_message', 'User updated!');
    }

}
