<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;

class DistrictsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $districts = District::orderBy('name','asc')->get();
        return view('backend.pages.districts.index', compact('districts'));
    }

    public function create(){
        $divisions = Division::orderBy('priority','asc')->get();
        return view('backend.pages.districts.create',compact('divisions'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'division_id' => 'required',
        ],
            [
                'name.required' => 'Please Provide a District name',
                'division_id.required' => 'Please Provide a Division for the District',
            ]);

        $district = new District();
        $district->name = $request->name;
        $district->division_id = $request->division_id;
        $district->save();

        session()->flash('success','District Added successfully');
        return redirect()->route('admin.districts');

    }

    public function edit($id){
        $divisions = Division::orderBy('priority','asc')->get();
        $district = District::find($id);
        if (!is_null($district)){
            return view('backend.pages.districts.edit', compact('district','divisions'));
        }else{
            return redirect()->route('admin.districts');
        }
    }

    public function update(Request $request,$id)
    {

        $request->validate([
            'name' => 'required',
            'division_id' => 'required',
        ],
            [
                'name.required' => 'Please Provide a District name',
                'division_id.required' => 'Please Provide a Division for the District',
            ]);

        $district = District::find($id);
        $district->name = $request->name;
        $district->division_id = $request->division_id;
        $district->save();


        session()->flash('success','District Updated successfully');
        return redirect()->route('admin.districts');
    }

    public function delete($id){
        $district = District::find($id);
        if (!is_null($district)){
            $district->delete();
        }
        session()->flash('success','Districts has delete successfully');
        return back();
    }
}
