<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AktaKelahiranController extends Controller
{
    public function index(){
        return view('user.akta_kelahiran.index');
    }

    public function create(){
        return view('user.akta_kelahiran.create');
    }
}
