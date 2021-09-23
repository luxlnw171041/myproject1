<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Procat;
use App\Category;
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
        $pricemax  = $request->get('pricemax');
        $pricemin  = $request->get('pricemin');
        $title  = $request->get('title');
        $category_id  = $request->get('$category_id');
        $cost  = $request->get('cost');

        $category = Category::all(['id', 'category']);
        $category1  = $request->get('category');

        $pricemin = empty($pricemin) ? 0 :$pricemin;
        $pricemax = empty($pricemax) ? 99000000 :$pricemax;
        
        $needFilter =  !empty($pricemax)    || !empty($pricemin) || !empty($title) || !empty($cost) || !empty($category_id);

        if ($needFilter) {
            $product = Product::where('title', 'LIKE', '%' .$title.'%')
                ->where('cost',    'LIKE', '%' .$cost.'%')
                ->where('cost',    'LIKE', '%' .$category_id.'%')
                ->whereBetween('price', [$pricemin,$pricemax])
                ->latest()->paginate($perPage);
        } else {
            $product = Product::latest()->paginate($perPage);
        }

        
        return view('product.index', compact('product' , 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    
    {
        $category = Category::all(['id', 'category']);

        return view('product.create' , compact( 'category'));
    }

    public function category(Request $request)
    
    {
        $product = Product::findOrFail($request);

        $categoryName = $request->category;
        $productcat = DB::table('products')->leftJoin( 'categorys' , 'categorys.id' , '=', 'products.category_id')->where('categorys.category' , '=', $categoryName)->paginate(2);

        return view('product.test', compact('productcat' ,'product'));
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
        if (\Auth::user()->role == 'admin') {
            return redirect('admin/stock')->with('flash_message', 'Product updated!');
            // or return route('routename');
        }
        
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
        $product = Product::all()->random(3);
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

        $category = Category::all(['id', 'category']);
        $procat = Procat::all(['id', 'product_id' ,'catagory_id']);
        return view('product.show', compact('product' , 'size' , 'color' ,'stock' ,'product_attribute' ,'category' ,'procat'));
        
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
        $category = Category::all(['id', 'category']);

        return view('product.edit', compact('product' ,'category'));
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
        $category = Category::all(['id', 'category']);

        if (\Auth::user()->role == 'admin') {
            return redirect('admin/stock')->with('flash_message', 'Product updated!');
            // or return route('routename');
        }
    
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

        if (\Auth::user()->role == 'admin') {
            return redirect('admin/stock')->with('flash_message', 'Product deleted!');
            // or return route('routename');
        }

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
