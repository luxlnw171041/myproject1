<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use PDF;
class PDFController extends Controller
{
    public function product(){
        $product = Product::all();
        return view('product.pdf')->with('product' , $product);
    }

    public function generatePDF(){
        $product = Product::all();

        view()->share('product' , $product);
        $pdf = PDF::loadView('product.stock' , $product);

        return view('payment.test_pdf')->with('product' , $product);
    }
    public function pdf(){
        $product = Product::all();

        $pdf = PDF::loadView('product.test', compact('product'));
         return $pdf->stream('pdf');
         
        view()->share('product' , $product);
        $pdf = PDF::loadView('product.stock' , $product);

        return view('payment.test_pdf')->with('product' , $product);
    }
    public function print()
{

    $data = [ ];
        $pdf = PDF::loadView('index',$data);
        return $pdf->stream('index');
}
}
