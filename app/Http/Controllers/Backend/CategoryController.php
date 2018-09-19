<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\StringHelper;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function index()
  {
    $categories = Category::orderBy('id', 'DESC')->get();
    return view('backend.pages.category.index', compact('categories'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|unique:categories',
    ]);

    $category = new Category();
    $category->name = $request->name;
    $category->slug = StringHelper::createSlug($request->name, 'Category', 'slug');
    $category->save();

    session()->flash('success', 'Category added successfully');
    return redirect()->route('admin.category.index');
  }


  public function update(Request $request, $id)
  {
    $category = Category::find($id);
    $this->validate($request, [
      'name' => 'required|unique:categories,name,'.$category->id,
    ]);

    $category->name = $request->name;
    $category->slug = StringHelper::createSlug($request->name, 'Category', 'slug');
    $category->save();

    session()->flash('success', 'Category updated successfully');
    return redirect()->route('admin.category.index');
  }


  public function destroy(Request $request, $id)
  {
    $category = Caegory::find($id);
    $category->delete();
    session()->flash('error', 'Category deleted successfully');
    return redirect()->route('admin.category.index');
  }
}
