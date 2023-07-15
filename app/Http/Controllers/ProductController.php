<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->query('name'); 
        $type = $request->query('type');
    if($request->has('name') && $request->has('type')){
        $products = Product::orderBy($name, $type)->paginate(3);
    }else{
        $products = Product::paginate(3);
    }
        return view('product.index', compact('products','type'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create($request->all());

        return redirect()->route('product.index')
            ->with('success', 'Product created successfully.');
    }
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update($request->all());

        return redirect()->route('product.index')
            ->with('success', 'Product updated successfully.');
    }
    public function delete($id)
    {
         $product = Product::findOrFail($id);
         $product->delete();
        return redirect()->route('product.index')
        ->with('success', 'Product deleted successfully!');
    }
}
