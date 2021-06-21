<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\category;
use Image;
use File;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(){
        $categories = category::orderBy('id','desc')->get();
        return view('backend.pages.categories.index', compact('categories'));
    }

    public function create(){
        $main_categories = category::orderBy('name','desc')->where('parent_id', NULL)->get();
        return view('backend.pages.categories.create', compact('main_categories'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|max:150',
            'image' => 'nullable|image',
            ],
            [
                'name.required' => 'Please Provide a category name',
                'image.required' => 'Please Provide a Valid Image',
            ]);

        $category = new category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;

        //Category Image insert

        if ($request->image){
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = 'images/categories/' . $img;
            Image::make($image)->save($location);

            $category->image = $img;

        }
        $category->save();



        session()->flash('success','Category Added successfully');
        return redirect()->route('admin.categories');
    }

    public function edit($id){
        $main_categories = category::orderBy('name','desc')->where('parent_id', NULL)->get();
        $category = category::find($id);
        return view('backend.pages.categories.edit')->with([
            'category' => $category,
            'main_categories' => $main_categories,
        ]);
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required|max:150',
            'image' => 'nullable|image',
        ],
            [
                'name.required' => 'Please Provide a category name',
                'image.required' => 'Please Provide a Valid Image',
            ]);

        $category = category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;

        //Category Image insert

        if ($request->image){
            if (File::exists('images/categories/'.$category->image)){
                File::delete('images/categories/'.$category->image);
            }

            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = 'images/categories/' . $img;
            Image::make($image)->save($location);

            $category->image = $img;

        }
        $category->save();



        session()->flash('success','Category Updated successfully');
        return redirect()->route('admin.categories');
    }

    public function delete($id){
        $category = category::find($id);
        if (!is_null($category)){
            if ($category->parent_id == NULL){
                $sub_categories = category::orderBy('name','desc')->where('parent_id', $category->id)->get();
                foreach ($sub_categories as $sub){
                    if (File::exists('images/categories/'.$sub->image)){
                        File::delete('images/categories/'.$sub->image);
                    }
                    $sub->delete();
                }
            }

            if (File::exists('images/categories/'.$category->image)){
                File::delete('images/categories/'.$category->image);
            }
            $category->delete();
        }
        session()->flash('success','Category has delete successfully');
        return back();
    }



}
