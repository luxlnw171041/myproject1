<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\ProductAttribute;
use App\product_attributes;
use Illuminate\Http\Request;

class ProductController extends Controller
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

        if (!empty($keyword)) {
            $product = Product::where('title', 'LIKE', "%$keyword%")
                ->orWhere('cost', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $product = Product::latest()->paginate($perPage);
        }

        return view('product.index', compact('product' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('product.create');
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
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('storage/uploads', 'public'); 
        }

        Product::create($requestData);

        return redirect('product')->with('flash_message', 'Product added!');
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
        $product = Product::findOrFail($id);
        $product_attribute = DB::table('product_attributes')->get();
        

        $size = ProductAttribute::selectRaw('size')
        ->where('product_id', $product->id)
        ->groupBy('size')
        ->get();

        $color = ProductAttribute::selectRaw('color')
        ->where('product_id', $product->id)
        ->groupBy('color')
        ->get();

        $stock = ProductAttribute::selectRaw('stock')
        ->where('id', $id)
        ->groupBy('stock')
        ->get();

        return view('product.show', compact('product' , 'size' , 'color' ,'stock' ,'product_attribute'));
        
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
        $product = Product::findOrFail($id);

        return view('product.edit', compact('product'));
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
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('storage/uploads', 'public'); 
        }

        $product = Product::findOrFail($id);
        $product->update($requestData);

        return redirect('product')->with('flash_message', 'Product updated!');
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
        Product::destroy($id);

        return redirect('product')->with('flash_message', 'Product deleted!');
    }
   
    public function stock(Request $request)
    {
        $perPage = 25;
        
        if (!empty($keyword)) {
            $product = Product::where('title', 'LIKE', "%$keyword%")
                ->orWhere('cost', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $product = Product::latest()->paginate($perPage);
        }

        return view('product.stock', compact('product' ));
    
    }
}
