<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){
        return view('auth/login');
    }
    public function register(){
        return view('auth/register');
    }
    public function proses_login(Request $request) {
        $input = $request->all();
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required|min:6|max:30'
        ]);
        

        if(Auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password']))) {
            if (Auth()->user()->status_akun == 'active') {
                // $request->session()->regenerate();
                if(Auth()->user()->role == 'admin') {
                    $user = Auth::user();
                    // Menampilkan id user yang telah login
                    $id = Auth::id();
                    return redirect()->intended('dashboard');
                } else if  (Auth()->user()->role == ''){
                    return redirect('/')->with('fail','Your account has not been leveled by admin.');
                } else {
                    return redirect('/')->with('fail','Input proper email or password.');
                }
            } else if (Auth()->user()->status_akun == 'pending') {
                return redirect('/')->with('fail','Your account has not been activated by admin.');
            } else {
                return redirect('/')->with('fail','Your account is blocked immediately contact admin.');
            }
        } else {
            return redirect('/')->with('fail','Input proper email or password.');
        }
    }
    public function prosesregister(Request $request){
        $request->validate([
            'username'=>'required|unique:users',
            'nama_lengkap'=>'required',
            'jenis_kelamin'=>'required',
            'alamat'=>'required',
            'nomor_tlp'=>'required|min:12|max:13',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:30'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        $user->nomor_tlp = $request->nomor_tlp;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res){
            return redirect('/')->with('success','You have registered successfluly');
        } else {
            return back()->with('fail','Smothing wrong');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();
        return redirect('/')->with('success','Logged out successfully.');
        // return redirect('/');
    }
}
