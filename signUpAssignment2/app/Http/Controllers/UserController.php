<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('signUp');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request->all());
      /*  $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // max size 2MB
        ]); */
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('images', $imageName);
       
        $user=new User;
        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birtdate = $request->birthday;
        $user->address = $request->address;
        $user->password = $request->password; 
        $user->image_name=$imageName;

        $user->save();

        return redirect()->route('user.create')->with('success', 'user registered successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
