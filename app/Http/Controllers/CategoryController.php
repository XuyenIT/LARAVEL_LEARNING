<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('category.index',compact('categories'));
    }
    public function allProductByCategory($id){
        $products = Category::find($id)->products()->paginate(2);
        return view('category.product',compact('products'));
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
        ]);
        Category::create($request->all());
        return redirect()->route('category.index')
        ->with('success', 'Category created successfully.');
    }
}
