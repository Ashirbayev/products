<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
                               'article' => 'required|unique:products|max:255',
                               'name' => 'required|min:10',
                               'status' => 'required',
                               'color' => 'nullable|string',
                               'size' => 'nullable|string',
                           ]);

        $data = [
            'color' => $request->input('color'),
            'size' => $request->input('size'),
        ];

        $product = new Product([
                                   'article' => $request->input('article'),
                                   'name' => $request->input('name'),
                                   'status' => $request->input('status'),
                                   'data' => json_encode($data),
                               ]);
        $product->save();

        return redirect('/products')->with('success', 'Product has been added');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
                               'name' => 'required|string|min:10',
                               'status' => 'required|string',
                               'data' => 'nullable|json'
                           ]);

        $product = Product::findOrFail($id);

        $product->update($request->all());

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index');
    }
}
