<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Category;
use App\Product;
use App\Procat;
use Illuminate\Http\Request;

class ProcatController extends Controller
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
            $procat = Procat::where('product_id', 'LIKE', "%$keyword%")
                ->orWhere('catagory_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $procat = Procat::latest()->paginate($perPage);
        }

        return view('procat.index', compact('procat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('procat.create');
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
        
        Procat::create($requestData);

        return redirect('procat')->with('flash_message', 'Procat added!');
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
        $procat = Procat::findOrFail($id);

        return view('procat.show', compact('procat'));
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
        $procat = Procat::findOrFail($id);

        return view('procat.edit', compact('procat'));
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
        
        $procat = Procat::findOrFail($id);
        $procat->update($requestData);

        return redirect('procat')->with('flash_message', 'Procat updated!');
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
        Procat::destroy($id);

        return redirect('procat')->with('flash_message', 'Procat deleted!');
    }
}
