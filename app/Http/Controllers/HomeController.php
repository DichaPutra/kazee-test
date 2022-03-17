<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $UsersData = User::all();
        return view('home', ['UsersData' => $UsersData]);
    }

    public function createUserForm()
    {
        return view('createUser');
    }

    public function createUser(Request $request)
    {
        // Validate Data
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ])->validate();

        // Insert DB
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('home')->with('message', 'Sukses! User telah berhasil ditambahkan');
    }

    public function updateUserForm($uid)
    {
        $userData = User::where('id', $uid)->first();
        return view('updateUser', ['userdata' => $userData]);
    }

    public function updateUser(Request $request)
    {
        // Validate Data
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ])->validate();

        // update user
        $user = User::find($request->uid);
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect()->route('home')->with('message', 'Sukses! User telah berhasil diupdate');
    }

    public function deleteUser($uid)
    {
        $user = User::find($uid);
        $user->delete();
        return redirect()->back()->with('message', 'Sukses! User telah berhasil dihapus');
    }

}
