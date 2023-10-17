<?php

namespace App\Http\Controllers\Admin;

use App\Traits\Photo;
use App\Models\Product;
use App\Models\Category;
use App\Traits\Save_Photo;
use Illuminate\Http\Request;
use App\Http\Requests\FormProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use Photo;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('Admin.Product.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('Admin.Product.Crud-Product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormProduct $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:png,jpg,jpeg',
        ]);
        $data = $this->DataWithPhoto($request, 'product_photos');
        Product::create($data);
        notify()->success('Created Product Success !!', 'Creatation');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * <Show></Show> the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('Admin.Product.Crud-Product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormProduct $request, Product $product)
    {
        if ($request->has('photo')) {
            $data = $this->UpdateDataWithPhoto($request, $product, 'product_photos');
            $product->update($data);
        } else {
            $product->update($request->all());
        }
        notify()->success('Updated Product Success !!', 'Updating');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $old_photo = $product->photo;
        $product->delete();
        Storage::disk("Images")->delete($old_photo);
        notify()->success('Deleted Product Success !!', 'Deleting');
        return redirect()->route('product.index');
    }
}
