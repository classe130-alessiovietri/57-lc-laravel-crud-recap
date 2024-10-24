<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $queryStringParams = request()->all();

        // $products = Product::where('id', '>', 0);
        $products = Product::whereNotNull('id');

        if (isset($queryStringParams['name'])) {
            $products = $products->where('name', 'LIKE', '%'.$queryStringParams['name'].'%');
        }

        if (isset($queryStringParams['visible'])) {
            $products = $products->where('visible', true);
        }

        $products = $products->get();


        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
    // public function show(string $id)
    // {
    //     $product = Product::find($id);
    //     $product = Product::where('id', $id)->first();

    //     if ($product == null) {
    //         abort(404);
    //     }

    //     /*
    //         OPPURE
    //     */

    //     $product = Product::findOrFail($id);
    //     $product = Product::where('id', $id)->firstOrFail();

    //     return view('products.show', compact('product'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
