<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;
use File;

class SlidersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $sliders = Slider::orderBy('priority','asc')->get();
        return view('backend.pages.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'priority' => 'required',
            'button_link' => 'nullable',
        ],
            [
                'title.required' => 'Please Provide a Slider title',
                'priority.required' => 'Please Provide a Valid Slider Priority',
                'image.required' => 'Please Provide a Slider Image',
            ]);

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;

        if ($request->image > 0 ){
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = 'images/sliders/' . $img;
            Image::make($image)->save($location);

            $slider->image = $img;

        }
        $slider->save();

        session()->flash('success','Slider Added successfully');
        return redirect()->route('admin.sliders');

    }


    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable',
            'priority' => 'required',
            'button_link' => 'nullable',
        ],
            [
                'title.required' => 'Please Provide a Slider title',
                'priority.required' => 'Please Provide a Valid Slider Priority',
            ]);

        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;

        if ($request->image > 0 ){

            if (File::exists('images/sliders/'.$slider->image)){
                File::delete('images/sliders/'.$slider->image);
            }

            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = 'images/sliders/' . $img;
            Image::make($image)->save($location);

            $slider->image = $img;

        }
        $slider->save();

        session()->flash('success','Slider Update successfully');
        return redirect()->route('admin.sliders');
    }

    public function delete($id){
        $slider = Slider::find($id);
        if (!is_null($slider)){
            if (File::exists('images/sliders/'.$slider->image)){
                File::delete('images/sliders/'.$slider->image);
            }
            $slider->delete();
        }
        session()->flash('success','Slider has delete successfully');
        return back();
    }

}
