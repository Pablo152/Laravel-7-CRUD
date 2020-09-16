<?php

namespace App\Http\Controllers;

use App\Mail\TestMailable;
use Mail;
use Illuminate\Http\Request;
use App\Product;
use PDF;

class ContactController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products/index', compact('products'));
    }
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name'=>'required',
            'product_details'=>'required'
        ]);

        $product = new Product([
            'product_name' => $request->get('product_name'),
            'product_details' => $request->get('product_details')
        ]);

        $product->save();
        return redirect('/products')->with('success', 'Product saved!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('edit', compact('product'));
    }

    public function update(Request $request, $id)
    {

        $request-> validate([
            'product_name'=>'required',
            'product_details'=>'required'
        ]);

        $product = Product::find($id);
        $product->product_name = $request->get('product_name');
        $product->product_details = $request->get('product_details');
        $product->save();

        return redirect('/products')->with('success', 'Product updated! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/products')->with('success', 'Product deleted! ');
    }

    public function exportPdf() {
        $products = Product::all();
        $pdf = PDF::loadView('products/index', compact('products'));

        return $pdf->download('test.pdf');
    }
}
