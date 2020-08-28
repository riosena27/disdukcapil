<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('user.profil.index', [
            'user' => $user
        ]);
    }

    public function update(User $user, Request $request){
        $user->name = $request->name;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->tempat_lahir = $request->tempat_lahir;

        if($request->filled('password')){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect('profil')->with('success', 'Profil anda berhasil diubah');
    }
}
