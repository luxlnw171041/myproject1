<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\OrderProduct;
use App\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;
        $user = Auth::user();
        
        switch(Auth::user()->role)
        {
            case "admin" : 
                $order = Order::latest()->paginate($perPage);

                if (!empty($keyword)) {
                    $order = Order::where('id', 'LIKE', "%$keyword%")
                        ->orWhere('tracking', 'LIKE', "%$keyword%")
                        ->latest()->paginate($perPage);
                } else {
                    $order = Order::latest()->paginate($perPage);
                }
                break;
                
            default : 
                //means guest
                $order = Order::where('user_id',Auth::id() )->latest()->paginate($perPage);      
        }


        return view('order.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        //รวมราคาสินค้าในตะกร้า
        $total = OrderProduct::whereNull('order_id')
            ->where('user_id', Auth::id() )->sum('total');
        //กำหนดราคารวม, ผู้ใช้, สถานะ
        $requestData['total'] = $total;
        $requestData['user_id'] = Auth::id();
        $requestData['status'] = "created"; 
        
        $order = Order::create($requestData);
        
        OrderProduct::whereNull('order_id')
            ->where('user_id', Auth::id() )->update(['order_id'=> $order->id]);

        //ปรับลดสินค้าในสต๊อก
        $order_products = $order->order_products;
        foreach($order_products as $item)
        {
            Product::where('id',$item->product_id)->decrement('quantity', $item->quantity);
        }

        return redirect('order')->with('flash_message', 'Order added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $order = Order::findOrFail($id);
        $order->update($requestData);
        switch($requestData['status']){
            case "paid" : 
                $requestData['paid_at'] = date("Y-m-d H:i:s");
                break;
            case "completed" : 
                $requestData['completed_at'] = date("Y-m-d H:i:s");
                break;
            case "cancelled" :
                $requestData['cancelled_at'] = date("Y-m-d H:i:s");
                //ปรับเพิ่มสินค้าในสต๊อก
                $order_products = $order->order_products;
                foreach($order_products as $item)
                {
                    Product::where('id',$item->product_id)->increment('quantity', $item->quantity);
                }
                break;
        }

        return redirect('order')->with('flash_message', 'Order updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Order::destroy($id);

        return redirect('order')->with('flash_message', 'Order deleted!');
    }
}
