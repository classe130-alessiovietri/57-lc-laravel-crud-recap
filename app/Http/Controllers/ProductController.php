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
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'min:3',
                'max:64'
            ],
            'price' => 'required|numeric|min:0|max:999.99',
            'description' => 'required|max:4096',
            'img' => 'nullable|url',
            'quantity' => 'required|numeric|min:0',
            'category' => 'required|max:16',
            'tags' => 'nullable|min:3|max:128',
            'visible' => '',
        ]);

        // $product = new Product();
        // $product->name = $validatedData['name'];
        // $product->slug = str()->slug($validatedData['name']);
        // $product->price = $validatedData['price'];
        // $product->description = $validatedData['description'];
        // $product->img = $validatedData['img'];
        // $product->quantity = $validatedData['quantity'];
        // $product->category = $validatedData['category'];
        // $tagsArray = explode(',', $validatedData['tags']);
        // $product->tags = json_encode($tagsArray);
        // // $product->visible = isset($validatedData['visible']);
        // $product->visible = array_key_exists('visible', $validatedData);
        // $product->save();

        /* OPPURE */

        $validatedData['slug'] = str()->slug($validatedData['name']);
        $tagsArray = explode(',', $validatedData['tags']);
        $validatedData['tags'] = json_encode($tagsArray);
        $validatedData['visible'] = array_key_exists('visible', $validatedData);
        $product = Product::create($validatedData);

        return redirect()->route('products.show', ['product' => $product->id]);
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
