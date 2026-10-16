<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::latest()->paginate(10);
        return view('productdir.index', compact('product'));
    }

    public function create()
    {
        return view('productdir.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('productdir', 'public');
        }

        Product::create($validated);

        return redirect()->route('admin-product.index')->with('success', 'Data created successfully.');
    }

    public function edit(Product $product)
    {
        return view('productdir.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('productdir', 'public');
        }

        $product->update($validated);

        return redirect()->route('admin-product.index')->with('success', 'Data updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'Data deleted successfully.');
    }
}
