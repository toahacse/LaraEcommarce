<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){
        $user = Auth::user();
        return view('frontend.pages.user.dashboard', compact('user'));
    }
    public function profile(){
        $districts = District::orderBy('name','asc')->get();
        $divisions = Division::orderBy('priority','asc')->get();
        $user = Auth::user();
        return view('frontend.pages.user.profile', compact('user','divisions','districts'));
    }

    public function profileUpdate(Request $request){

        $user = Auth::user();

        $this->validate($request,[
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['nullable', 'string', 'max:50'],
            'username' => ['required', 'alpha_dash', 'max:100', 'unique:users,username,'.$user->id],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email,'.$user->id],
            'division_id' => ['required', 'numeric'],
            'district_id' => ['required', 'numeric'],
            'phone_no' => ['required', 'max:15','unique:users,phone_no,'.$user->id],
            'street_address' => ['required', 'max:100'],
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->division_id = $request->division_id;
        $user->district_id = $request->district_id;
        $user->phone_no = $request->phone_no;
        $user->street_address = $request->street_address;
        $user->shipping_address = $request->shipping_address;
        if ($request->password != NULL || $request->password != ''){
            $user->password = Hash::make($request->password);
        }
        $user->ip_address = request()->ip();
        $user->save();

        session()->flash('success','User Profile has updated successfully!!');
        return back();
    }

}
