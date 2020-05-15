<?php

namespace App\Http\Controllers;

use App\Notifications\EmailNotification;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function loginIndex(){
        if(Auth::check()){
            return redirect('dashboard');
        }
        return view('login.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
        return redirect('/');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('admin.index');
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

        $request->validate([
            'nik' => 'required|unique:users,nik',
            'nik_kk' => 'required|unique:users,nik_kk',
            'name' => 'required|unique:users,name',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        User::create([
            'nik' => $request->nik,
            'nik_kk' => $request->nik_kk,
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'kode_verifikasi' => $verificationCode
        ]);

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
        
        return redirect('dashboard');
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
