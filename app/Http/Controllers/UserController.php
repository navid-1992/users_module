<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('modules')->get();
        return response()->json($users, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modules = Module::all();
        return view('users.create',compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required',
            'module_id' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ];
        DB::beginTransaction();
        try{
            $user = User::create($data);
            $user->modules()->attach($request->input('module_id'));
            session()->flash('message', 'User Created Successfully');
            DB::commit();
        }catch (\Exception $exception){
            session()->flash('message', 'Something went wrong');
            DB::rollBack();
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $modules = Module::all();
        return view('users.edit', compact('user','modules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required | email',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ];
        DB::beginTransaction();
        try{
            User::where('id', $id)->update($data);
            $user = User::find($id);
            $user->modules()->sync($request->input('module_id'));
            session()->flash('message', 'User Update Successfully');
            DB::commit();
        }catch (\Exception $exception){
            session()->flash('message', 'Something went wrong');
            DB::rollBack();
        }
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id',$id)->delete();
        session()->flash('message', 'User Deleted Successfully');
        return redirect('/');
    }
}
