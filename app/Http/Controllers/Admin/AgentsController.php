<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AgentsController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Agents Show', only: ['index','show']),
            new Middleware('permission:Agents Create', only: ['create','store']),
            new Middleware('permission:Agents Edit', only: ['edit','update']),
            new Middleware('permission:Agents Delete', only: ['destroy']),
        ];
    }


    public function index()
    {
        $users = User::role('Agents')->get();
        return view('admin.agents.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::whereNotIn('name',['User','Auditor','Super Admin'])->get();
        return view('admin.agents.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'last_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits:10|regex:/^[6789]/|unique:users,phone',
            'aadhaar_number' => 'nullable|digits:12|unique:users,aadhar_card_number',
            'pan_card_number' => 'nullable|regex:/[A-Z]{5}[0-9]{4}[A-Z]{1}/|unique:users,pan_card_number',
            'password' => 'required|min:8',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'aadhar_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'pan_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:1,0'
        ], [
            'profile_image.max' => 'The Profile Image must not be larger than 2 MB.',
            'aadhar_image.max' => 'The Aadhar Image must not be larger than 2 MB.',
            'pan_image.max' => 'The Pan Image must not be larger than 2 MB.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{
            $agents = new User();
            $agents->status = $request->status;
            $agents->user_id = generateUniqueId('agents');
            $agents->first_name = $request->first_name;
            $agents->last_name = $request->last_name;
            $agents->name = $request->first_name.' '.$request->last_name;
            $agents->date_of_birth = format_date_for_db($request->date_of_birth);
            $agents->gender = $request->gender;
            $agents->address = $request->address;
            $agents->email = $request->email;
            $agents->phone = $request->phone;
            $agents->opt_mobile_no = $request->opt_mobile_no;
            $agents->password = bcrypt($request->password);
            $agents->aadhar_card_number = $request->aadhaar_number;
            $agents->pan_card_number = $request->pan_card_number;

            if ($request->hasFile('profile_image')) {
                $agents->addMedia($request->file('profile_image'))->toMediaCollection('system-user-image');
            }

            if ($request->hasFile('aadhar_image')) {
                $agents->addMedia($request->file('aadhar_image'))->toMediaCollection('system-user-aadhar');
            }

            if ($request->hasFile('pan_image')) {
                $agents->addMedia($request->file('pan_image'))->toMediaCollection('system-user-pan');
            }

            $agents->syncRoles($request->roles);
            $res = $agents->save();

            if($res){
                return back()->with('success','User Added Successfully');
            }else{
                return back()->with('success','User Not Added');
            }
        }
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.agents.show',compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::whereNotIn('name',['User','Auditor','Super Admin'])->get();
        return view('admin.agents.edit',compact('user','roles'));
    }

    public function update(Request $request, string $id)
    {
        $agents = User::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'last_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'email' => 'required|email|unique:users,email,'. $agents->id,
            'phone' => 'required|digits:10|regex:/^[6789]/|unique:users,phone,'. $agents->id,
            'aadhaar_number' => 'nullable|digits:12|unique:users,aadhar_card_number,'. $agents->id,
            'pan_card_number' => 'nullable|regex:/[A-Z]{5}[0-9]{4}[A-Z]{1}/|unique:users,pan_card_number,'. $agents->id,
            'password' => 'nullable|min:8',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'aadhar_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'pan_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:1,0'
        ], [
            'profile_image.max' => 'The Profile Image must not be larger than 2 MB.',
            'aadhar_image.max' => 'The Aadhar Image must not be larger than 2 MB.',
            'pan_image.max' => 'The Pan Image must not be larger than 2 MB.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else{
            $agents->first_name = $request->first_name;
            $agents->last_name = $request->last_name;
            $agents->name = $request->first_name.' '.$request->last_name;
            $agents->status = $request->status;
            $agents->date_of_birth = format_date_for_db($request->date_of_birth);
            $agents->gender = $request->gender;
            $agents->address = $request->address;
            $agents->email = $request->email;
            $agents->phone = $request->phone;
            $agents->opt_mobile_no = $request->opt_mobile_no;
            if(isset($request->password)){
                $agents->password = bcrypt($request->password);
            }
            $agents->aadhar_card_number = $request->aadhaar_number;
            $agents->pan_card_number = $request->pan_card_number;

            if ($request->hasFile('profile_image')) {
                $agents->clearMediaCollection('system-user-image');
                $agents->addMedia($request->file('profile_image'))->toMediaCollection('system-user-image');
            }
        
            if ($request->hasFile('aadhar_image')) {
                $agents->clearMediaCollection('system-user-aadhar');
                $agents->addMedia($request->file('aadhar_image'))->toMediaCollection('system-user-aadhar');
            }
        
            if ($request->hasFile('pan_image')) {
                $agents->clearMediaCollection('system-user-pan');
                $agents->addMedia($request->file('pan_image'))->toMediaCollection('system-user-pan');
            }

            $agents->syncRoles($request->roles);
            $res = $agents->update();

            if($res){
                return back()->with('success','Auditor Updated Successfully');
            }else{
                return back()->with('success','Auditor Not Updated');
            }
        }
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $res = $user->delete();
        if($res){
            return back()->with(['success'=>'User Deleted Successfully']);
        }else{
            return back()->with(['error'=>'User Not Deleted']);
        }
    }
}
