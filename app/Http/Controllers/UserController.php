<?php

namespace App\Http\Controllers;

use App\Notifications\EmailNotification;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function loginIndex(){
        if(Auth::check()){
            return redirect('redirect');
        }
        return view('login.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('redirect');
        }
        return redirect('/')->with('failed', 'Username atau password anda salah');
    }

    public function dashboard(){
        return view('user.index');
    }

    public function redirectTo()
    {
        
        if (Auth::check()) {
            if(Auth::user()->hasRole('admin')){
                return redirect('admin');
            }
            if(Auth::user()->hasRole('operator')){
                return redirect('operator');
            }
            if(Auth::user()->hasRole('kasie')){
                return redirect('kasie');
            }
            if(Auth::user()->hasRole('kabid')){
                return redirect('kabid');
            }
            if(Auth::user()->hasRole('kadis')){
                return redirect('kadis');
            }
            if(Auth::user()->hasRole('Operator Loket')){
                return redirect('operator-loket');
            }
            return redirect('dashboard-user');
        }

        return redirect('/');
    }
    
    public function registerIndex(){
        if (Auth::check()) {
            return view('admin.index');
        }
    
        return view('login.register');
    }

    public function register(Request $request){

        $verificationCode = Str::random(6);
        $userRole = Role::where('name' , 'User')->first();

        $request->validate([
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'kode_verifikasi' => $verificationCode
        ]);

        $user->roles()->attach($userRole);

        return redirect('/notifikasi');
    }

    public function verifikasiIndex(){
        return view('login.verifikasi');
    }

    public function verifikasi(Request $request){
        $kodeUser = Auth::user()->kode_verifikasi;
        $userId = Auth::user()->id;

        $request->validate([
            'kode_verifikasi' => [
                'required',
                function ($attribute, $value, $fail) use ($kodeUser) {
                    if ($value != $kodeUser ) {
                        $fail('Kode Verifikasi Salah');
                    }
                },
                'min:6'
            ],
        ]);
        
        User::where('id', $userId)
            ->update([
                'remember_token' => 1,
            ]);
        
        return redirect('dashboard-user');
    }

    public function notification(){
    
        $user = User::all()->last();

        $details = [

            'greeting' => 'Hello '. $user->name,

            'body' => 'Ini kode verifikasi anda ',

            'kode' => $user->kode_verifikasi,

            'thanks' => 'Terima kasih sudah mendaftar di Disdukcapil Balikpapan',

            'actionText' => 'Kunjungi Website Kami',

            'actionURL' => url('http://capil.balikpapan.go.id/'),


        ];

        $user->notify(new EmailNotification($details));

        return redirect('/thanks');

    }
}
