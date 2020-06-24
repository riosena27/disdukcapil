<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    
    public function index(){
        
        $user = User::whereHas('roles', function (Builder $query) {
            $query->where('name', '!=', 'User');
        })->paginate(5);
        return view('admin.index', [
            'user' => $user
        ]);
    }

    public function create(){
        $userRole = Role::where('name', '!=', 'User')->get();

        return view('admin.create', [
            'userRole' => $userRole
        ]);
    }

    public function store(Request $request) {
        
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $user = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->roles()->sync($request->role);
        return redirect('admin')->with('success', $request->name.' berhasil ditambahkan');
    }

    public function delete(User $user){
        $user->roles()->detach();
        $user->delete();
        return back()->with('delete', $user->name.' berhasil dihapus');
    }

    public function edit(User $user){
        $userRole = Role::where('name', '!=', 'User')->get();

        return view('admin.edit', [
            'user' => $user,
            'userRole' => $userRole
        ]);
    }

    public function update(User $user, Request $request){
        
        $user->roles()->sync($request->role);

        $request->validate([
            'name' => 'required|unique:users,name,' . $user->id . 'id',
            'email' => 'required|unique:users,email,' . $user->id . 'id',
        ]);

        User::where('id', $user->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

        

        return redirect('admin')->with('update', 'Data '.$user->name.' berhasil diubah');
    }
}
