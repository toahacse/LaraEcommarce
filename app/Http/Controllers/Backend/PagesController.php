<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\ProductImage;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(){
        return view('backend.pages.index');
    }



}
