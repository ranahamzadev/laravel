<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;



class RegistrationController extends Controller
{
    public function showRegister(){

    return view('auth.register');

}
    public function showLogin(){

    return view('auth.login');

}
    public function register(Request $request){
        $validated=$request->validate([
            'email'=>'required|unique:users|email',
            'name'=>'required',
            'password'=>'required|confirmed|min:3',
        ]);
        $user =User::create($validated); 
        Auth::login($user);
        return redirect()->route('profiles.index');


}
    public function login(Request $request){
      $validated=$request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if (Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect()->route('profiles.index');
        }
        throw ValidationException::withMessages([
            'credentials' => 'Sorry, Incorrect credentials.'
        ]);

}
   public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('show.login');

}
}
