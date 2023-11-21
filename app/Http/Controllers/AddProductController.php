<?php

namespace App\Http\Controllers;

use App\Models\AddProduct;
use Illuminate\Http\Request;

class AddProductController extends Controller
{
    public function store(Request $request)
    {
        
        // dd("hello");
        
        // Server-side validation
        $request->validate([
            'name' => 'required|string',
            'brand' => 'required|string',
            'price' => 'required|integer',
            'category' => 'required|string',
            'item-weight' => 'required|integer',
            'description' => 'required|string',
        ]);

        // Insert the record into the database using the model
        AddProduct::create([
            'product_name' => $request->input('name'),
            'brand' => $request->input('brand'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'weight' => $request->input('item-weight'),
            'product_description' => $request->input('description'),
        ]);

        // You can add a success message or redirect to another page here
        return redirect()->back()->with('success', 'Product added successfully!');
    }
}