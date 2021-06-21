<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Image;
use File;

class BrandsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(){
        $brands = Brand::orderBy('id','desc')->get();
        return view('backend.pages.brands.index', compact('brands'));
    }

    public function create(){

        return view('backend.pages.brands.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|max:150',
            'image' => 'nullable|image',
        ],
            [
                'name.required' => 'Please Provide a Brand name',
                'image.required' => 'Please Provide a Valid Image',
            ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;

        //Brand Image insert

        if ($request->image){
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/brands/' . $img);
            Image::make($image)->save($location);

            $brand->image = $img;

        }
        $brand->save();



        session()->flash('success','Brand Added successfully');
        return redirect()->route('admin.brands');
    }

    public function edit($id){
        $brand = Brand::find($id);
        return view('backend.pages.brands.edit')->with([
            'brand' => $brand
        ]);
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required|max:150',
            'image' => 'nullable|image',
        ],
            [
                'name.required' => 'Please Provide a Brand name',
                'image.required' => 'Please Provide a Valid Image',
            ]);

        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->description = $request->description;

        //Brand Image insert

        if ($request->image){
            if (File::exists('images/brands/'.$brand->image)){
                File::delete('images/brands/'.$brand->image);
            }

            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/brands/' . $img);
            Image::make($image)->save($location);

            $brand->image = $img;

        }
        $brand->save();



        session()->flash('success','Brand Updated successfully');
        return redirect()->route('admin.brands');
    }

    public function delete($id){
        $brand = Brand::find($id);
        if (!is_null($brand)){

            if (File::exists('images/brands/'.$brand->image)){
                File::delete('images/brands/'.$brand->image);
            }
            $brand->delete();
        }
        session()->flash('success','Brand has delete successfully');
        return back();
    }



}
