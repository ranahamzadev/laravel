<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles=Profile::paginate(10);
        return view('profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation=$request->validate([
            'name'=>'required',
            'skill'=>'required',
            'bio'=>'required',
        ]);
        Profile::create($validation);
        return redirect()->route('profiles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $profile)
    {
      $profile = Profile::findOrFail($profile);
    return view('profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $profile)
    {
        $profile = Profile::findOrFail($profile);
        return view('profiles.update',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $profile)
    {
        $validation=$request->validate([
            'name'=>'required',
            'skill'=>'required',
            'bio'=>'required',
        ]);
         $profile = Profile::findOrFail($profile);
        $profile->update($validation);
        return redirect()->route('profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $profile)
    {
        $profile = Profile::findOrFail($profile);
         $profile->delete();
         return redirect()->route('profiles.index');
    }
}
