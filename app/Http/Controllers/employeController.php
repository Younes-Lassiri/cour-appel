<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class employeController extends Controller
{
    public function signupBladeEpmploye(){
        return view('addEmploye');
    }

    public function signUpEpmploye(Request $request){
        $request->validate([
            'employe_name' => 'required|regex:/^[\p{Arabic}a-zA-Z\s]+$/u',
            'employe_email' => 'required|email',
            'employe_password' => 'required|min:8|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]+$/|confirmed',
        ]);
        
    
        $hashedPassword = Hash::make($request->employe_password);
    
        $newEmploye = [
            'admin_name' => $request->employe_name,
            'email' => $request->employe_email,
            'role' => 'employe',
            'status' => 'not approved',
            'password' => $hashedPassword,
        ];
    
        $admin = Admin::create($newEmploye);
    
        return redirect()->route('adminBlade')->with('add','تم إظافة الحساب بنجاح');
    }
}
