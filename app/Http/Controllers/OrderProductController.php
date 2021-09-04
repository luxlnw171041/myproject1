<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\OrderProduct;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = 25;

        $orderproduct = OrderProduct::whereNull('order_id')
            ->where('user_id', Auth::id() )
            ->latest()->paginate($perPage);

        return view('order-product.index', compact('orderproduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('order-product.create');
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

        //คำนวณ total 
        $requestData['total'] = $requestData['quantity'] * $requestData['price'];

        //find user
        $requestData['user_id'] = Auth::id();

        OrderProduct::create($requestData);

        return redirect('order-product')->with('flash_message', 'OrderProduct added!');
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
        $orderproduct = OrderProduct::findOrFail($id);

        return view('order-product.show', compact('orderproduct'));
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
        $orderproduct = OrderProduct::findOrFail($id);

        return view('order-product.edit', compact('orderproduct'));
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
        
        $orderproduct = OrderProduct::findOrFail($id);
        $orderproduct->update($requestData);

        return redirect('order-product')->with('flash_message', 'OrderProduct updated!');
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
        OrderProduct::destroy($id);

        return redirect('order-product')->with('flash_message', 'OrderProduct deleted!');
    }

    public function reportdaily(Request $request)
    {      
        $date = $request->get('date');
        //SELECT *, orders.completed_at, SUM(price) as sum_price, SUM(quantity) as sum_quantity FROM `order_products` GROUP BY product_id
        $orderproduct = OrderProduct::join('orders', 'order_products.order_id', '=', 'orders.id')
            ->select(DB::raw('order_products.*, orders.created_at, AVG(order_products.price) as avg_price, SUM(order_products.quantity) as sum_quantity, SUM(order_products.total) as sum_total'))
            ->whereDate('orders.created_at',$date)
            ->where('orders.status','completed')
            ->groupByRaw('user_id')
            ->get();       
        return view('order-product.report-daily', compact('orderproduct'));
    } 

    public function reportmonthly(Request $request)
    {      
        $month = $request->get('month');
        $year = $request->get('year');
        //SELECT order_products.* FROM `order_products` INNER JOIN orders ON order_products.order_id = orders.id WHERE orders.completed_at = DATE($date) AND where orders.status = 'completed'
        //SELECT *, SUM(price) as sum_price, SUM(quantity) as sum_quantity FROM `order_products` GROUP BY product_id
        $orderproduct = OrderProduct::join('orders', 'order_products.order_id', '=', 'orders.id')
            ->select(DB::raw('order_products.*, orders.created_at, AVG(order_products.price) as avg_price, SUM(order_products.quantity) as sum_quantity, SUM(order_products.total) as sum_total'))
            ->whereMonth('orders.created_at',$month)
            ->whereYear('orders.created_at',$year)
            ->where('orders.status','completed')
            ->groupByRaw('user_id')
            ->get();       
        return view('order-product.report-monthly', compact('orderproduct'));
    } 

    public function reportyearly(Request $request)
    {      
        $year = $request->get('year');
        //SELECT *, SUM(price) as sum_price, SUM(quantity) as sum_quantity FROM `order_products` GROUP BY product_id
        $orderproduct = OrderProduct::join('orders', 'order_products.order_id', '=', 'orders.id')
            ->select(DB::raw('order_products.*, orders.created_at, AVG(order_products.price) as avg_price, SUM(order_products.quantity) as sum_quantity, SUM(order_products.total) as sum_total'))
            ->whereYear('orders.created_at',$year)
            ->where('orders.status','completed')
            ->groupByRaw('user_id')
            ->get();       
        return view('order-product.report-yearly', compact('orderproduct'));
    } 

 
}