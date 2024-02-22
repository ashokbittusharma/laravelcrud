<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with('userProfile')->get();
        return view('index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $storeData = $request->validate([
         'name' => 'required',
         'email' => 'required|email|unique:users',
         'password' => 'required',
         'company' => 'required',
         'department' => 'required',
         'salary' => 'required|numeric',
       ]); 
       if($request->input('password'))
         $storeData['password'] = Hash::make($request->input('password'));
       try {
                DB::beginTransaction();

                 $user = User::create([
                   'name' => $request->name,
                   'email' => $request->email,
                   'password' => Hash::make($request->password),
                 ]);
                 $user->userProfile()->create([
                    'company' => $request->company,
                    'department' => $request->department,
                    'salary' => $request->salary,
                 ]);
                DB::commit();
               return redirect('user')->with('success', 'User has been created!');
                
            } catch (\Exception $e) {
                
                DB::rollBack();
                return back()->withErrors(['message'=>$e->getMessage()]);
            }
       
       
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
        $user = User::with('userProfile')->findOrFail($id);
        return view('edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $userData = $request->validate([
          'name' => 'required',
         'company' => 'required',
         'department' => 'required',
         'salary' => 'required|numeric',
        ]);
        try {
                DB::beginTransaction();
                $user = User::findOrFail($id);
                 $user->update([
                   'name' => $request->name,
                 ]);
                 $user->userProfile()->updateOrCreate(
                    [
                        'user_id' => $id,
                    ],
                    [
                    'company' => $request->company,
                    'department' => $request->department,
                    'salary' => $request->salary,
                 ]);
                DB::commit();
               return redirect('user')->with('success', 'User detail has been updated!');
                
            } catch (\Exception $e) {
                
                DB::rollBack();
                return back()->withErrors(['message'=>$e->getMessage()]);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/user')->with('success', 'User has been deleted!');
    }
}
