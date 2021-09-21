<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\ProductAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
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
        $pricemax  = $request->get('pricemax');
        $pricemin  = $request->get('pricemin');

        $needFilter =  !empty($pricemax)    || !empty($pricemin);

        if (!empty($keyword)) {
            $productattribute = ProductAttribute::where('productattribute_id', 'LIKE', "%$keyword%")
                ->orWhere('product_id', 'LIKE', "%$keyword%")
                ->orWhere('size', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('stock', 'LIKE', "%$keyword%")
                ->orWhere('sku', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->whereBetween('price', [$pricemin,$pricemax])
                ->orWhere('created_at', 'LIKE', "%$keyword%")
                ->orWhere('updated_at', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $productattribute = ProductAttribute::latest()->paginate($perPage);
        }

        return view('product-attribute.index', compact('productattribute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('product-attribute.create');
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
        
        ProductAttribute::create($requestData);

        return redirect('product-attribute')->with('flash_message', 'ProductAttribute added!');
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
        $productattribute = ProductAttribute::findOrFail($id);

        return view('product-attribute.show', compact('productattribute'));
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
        $productattribute = ProductAttribute::findOrFail($id);

        return view('product-attribute.edit', compact('productattribute'));
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
        
        $productattribute = ProductAttribute::findOrFail($id);
        $productattribute->update($requestData);

        return redirect('product-attribute')->with('flash_message', 'ProductAttribute updated!');
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
        ProductAttribute::destroy($id);

        return redirect('product-attribute')->with('flash_message', 'ProductAttribute deleted!');
    }
}
