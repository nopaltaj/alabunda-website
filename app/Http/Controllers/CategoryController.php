<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::latest()->get();

        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();

        return view('admin.category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $image->storeAs('public/categories', $image->hashName());

        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|string'

        ]);
        //save to DB
        $category = Category::create([
            'name'   => $request->name,
            'image'  => $image->hashName(),
            'description' => $request->description
        ]);

        if ($category) {
            return redirect()->route('category.index')->with([
                'success' => 'data berhasil disimpan'
            ]);
        } else {
            return redirect()->route('category.index')->with([
                'error' => 'data gagal disimpan'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name'  => 'required|unique:categories,name,' . $category->id,

        ]);

        //check jika image kosong
        if ($request->file('image') == '') {

            //update data tanpa image
            $category = Category::findOrFail($category->id);
            $category->update([
                'name'   => $request->name,
                'description'   => $request->description
            ]);
        } else {

            //hapus image lama
            Storage::disk('local')->delete('public/categories/' . basename($category->image));

            //upload image baru
            $image = $request->file('image');
            $image->storeAs('public/categories', $image->hashName());

            //update dengan image baru
            $category = Category::findOrFail($category->id);
            $category->update([
                'image'  => $image->hashName(),
                'name'   => $request->name,
                'description' => $request->description
            ]);
        }

        return redirect()->route('category.index')->with([
            Alert::success('Succes', 'Berhasil diupdate')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        if ($category) {
            return redirect()->route('category.index')->with([
                'success' => 'data berhasil dihapus'
            ]);
        } else {
            return redirect()->route('category.index')->with([
                'error' => 'data gagal dihapus'
            ]);
        }
    }
}