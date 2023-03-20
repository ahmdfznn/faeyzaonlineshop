<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ManageProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product', [
            'title' => 'Manage Product',
            'products' => Product::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.upload-product', [
            'title' => 'Upload Product'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'image' => 'image|file|max:1024|nullable',
        //     'kode_product' => 'required',
        //     'slug' => 'required|unique:products',
        //     'harga' => 'required',
        //     'stock' => 'required',
        //     'diskon' => 'nullable',
        //     'deskripsi' => 'nullable',
        // ]);

        $product = Product::where('product_name', $request->name)->first();

        if (empty(Product::where('product_name', $request->name)->first())) {

            $rules = [
                'product_name' => $request->name,
                'slug' => Str::slug($request->name),
                'price' => $request->harga,
                'stock' => $request->stock,
                'discount' => $request->diskon,
                'min_purchase' => $request->min,
                'description' => $request->deskripsi,
            ];

            if ($request->file('image')) {
                $rules['image'] = $request->file('image')->store('product-images');
            }

            Product::create($rules);
        } else {
            $product->stock = $product->stock + $request->stock;
            $product->update();
        }

        return redirect('/manageProduct');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $slug)
    {
        return view('admin.edit-product', [
            'title' => 'Edit Product',
            'product' => $product->where('slug', $slug)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $slug)
    {
        $products = $product->where('slug', $slug)->first();

        $rules = [
            'product_name' => $request->name,
            'price' => $request->harga,
            'stock' => $request->stock,
            'discount' => $request->diskon,
            'min_purchase' => $request->min,
            'description' => $request->deskripsi
        ];

        if ($request->file('image')) {
            if ($products->image) {
                Storage::delete($products->image);
            }
            $rules['image'] = $request->file('image')->store('product-images');
        }

        Product::where('id', $products->id)->update($rules);

        return redirect('/manageProduct');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        Product::destroy($id);

        return redirect('/manageProduct');
    }
}
