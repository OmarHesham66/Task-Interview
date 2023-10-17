<?php

namespace App\Http\Controllers\Admin;

use App\Traits\Photo;
use App\Models\Category;
use App\Traits\Save_Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use Photo;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(8);
        return view('Admin.Category.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Category.Crud-Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:150',
            'photo' => 'required|image|mimes:png,jpg,jpeg',
        ]);
        $data = $this->DataWithPhoto($request, 'category_photos');
        Category::create($data);
        notify()->success('Created Category Success !!', 'Creatation');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('Admin.Category.Crud-Category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:150',
        ]);
        if ($request->has('photo')) {
            $data =  $this->UpdateDataWithPhoto($request, $category, 'category_photos');
            $category->update($data);
        } else {
            $category->update($request->all());
        }
        notify()->success('Updated Category Success !!', 'Updating');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $old_photo = $category->photo;
        $category->delete();
        Storage::disk("Images")->delete($old_photo);
        notify()->success('Deleted Category Success !!', 'Deleting');
        return redirect()->route('category.index');
    }
}
