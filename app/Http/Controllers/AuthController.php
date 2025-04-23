<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function notAuth() {
        return view('auth.not-auth');
    }

    public function login() {
        return view("auth.login");
    }

    public function storeLogin(Request $request) {
        if (empty($request->email) or empty($request->password)) {
            return redirect()->route("login")->with("error", "Morate da popunite sva polja!");
        }

        if (Auth::attempt($request->only("email", "password"))) {
            // login je uspeo 
            return redirect()->route("blog.list");
        }

        // ako Auth::attemp nije prosao onda prikazi gresku 
        return redirect()->route("login")->with("error", "Nepostojeci podaci za logovanje.");
    }

    public function logout() {
        Auth::logout();
        return redirect()->route("login");
    }

    public function register() {
        return view("auth.register");
    }

    public function storeRegister(Request $request) {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:6",
        ]);
        // dd($request->name, $request->email, $request->password);
        // ako je validacija prosla onda mozemo da kreiramo korisnika 

        $userRole = Role::where('name', 'user')->first();

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role_id" => $userRole->id,
        ]);

        return redirect()->route("login")->with("success", "Registracija je prosla uspesno! Sada se ulogujte!");
    }
}
