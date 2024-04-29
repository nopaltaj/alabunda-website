<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::latest()->get();
        $category = Category::all();

        return view('admin.product.index', compact('product', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();

        return view('admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/products', $gambar->hashName());
        
        $this->validate($request, [
            'name' => 'required|max:255',
            'category_id' => 'required',
            'price' => 'required|integer',
            'description' => 'required|string'
             
        ]);

        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'gambar' => $gambar->hashName(),
            'price' => $request->price,
            'description' => $request->description
        ]);

        if($product){
            return redirect()->route('product.index')->with([
                'success' => 'data berhasil disimpan'
            ]);
        }else{
            return redirect()->route('product.index')->with([
                'error' => 'data gagal disimpan'
            ]);
        } 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::all();
        $product = Product::findOrFail($id);

        return view('admin.product.show', compact('product', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::all();
        $product = Product::findOrFail($id);

        return view('admin.product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:categories,name,'. $id,
            'category_id' => 'required',
            'price' => 'required|integer',
            'description' => 'required|string'

        ]);

        //check jika image kosong
        if ($request->file('gambar') == '') {

            //update data tanpa image
            $product = Product::findOrFail($id);
            $product->update([
                'name'   => $request->name,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'description'   => $request->description,
            ]);
        } else {

            //hapus image lama
            Storage::disk('local')->delete('public/products/' . basename($id));

            //upload image baru
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/products', $gambar->hashName());

            //update dengan gambar baru
            $product = Category::findOrFail($id);
            $product->update([
                'gambar'  => $gambar->hashName(),
                'name'   => $request->name,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'description' => $request->description
            ]);
        }

        return redirect()->route('product.index')->with([
            Alert::success('Succes', 'Berhasil diupdate')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        if($product)
        {
            return redirect()->route('product.index')->with([
                'success' => 'data berhasil dihapus'
            ]);
        }else{
            return redirect()->route('product.index')->with([
                'error' => 'data gagal dihapus'
            ]);
        }
    }
}