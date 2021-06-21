<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {

    }

    public function show($id)
    {
        $category = category::find($id);
        if (!is_null($category)){
            return view('frontend.pages.categories.show',compact('category'));
        }else{
            session()->flash('errors','Sorry!! There is no Category by this ID');
            return redirect('/');
        }
    }

}
