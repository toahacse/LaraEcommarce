<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $divisions = Division::orderBy('priority','asc')->get();
        return view('backend.pages.divisions.index', compact('divisions'));
    }

    public function create(){
        return view('backend.pages.divisions.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'priority' => 'required',
        ],
            [
                'name.required' => 'Please Provide a Division name',
                'priority.required' => 'Please Provide a Valid Division Priority',
            ]);

        $division = new Division();
        $division->name = $request->name;
        $division->priority = $request->priority;
        $division->save();

        session()->flash('success','Division Added successfully');
        return redirect()->route('admin.divisions');

    }

    public function edit($id){
        $division = Division::find($id);
        if (!is_null($division)){
            return view('backend.pages.divisions.edit', compact('division'));
        }else{
            return redirect()->route('admin.divisions');
        }
    }

    public function update(Request $request,$id)
    {

        $request->validate([
            'name' => 'required',
            'priority' => 'required',
        ],
            [
                'name.required' => 'Please Provide a Division name',
                'priority.required' => 'Please Provide a Division Priority',
            ]);

        $division = Division::find($id);
        $division->name = $request->name;
        $division->priority = $request->priority;
        $division->save();

        session()->flash('success','Division Updated successfully');
        return redirect()->route('admin.divisions');
    }

    public function delete($id){
        $division = Division::find($id);
        if (!is_null($division)){

            $districts = District::where('division_id',$division->id)->get();
            foreach ($districts as $district){
                $district->delete();
            }
            $division->delete();
        }
        session()->flash('success','Division has delete successfully');
        return back();
    }

}
