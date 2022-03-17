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
        $this->validator($request->all())->validate();
        
//        dd($request->name);
        User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
        ]);


        return redirect()->route('home')->with('message', 'Sukses! User telah berhasil ditambahkan');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function updateUser()
    {
        
    }

    public function deleteUser($uid)
    {
        $user = User::find($uid);
        $user->delete();
        return redirect()->back()->with('message', 'Sukses! User telah berhasil dihapus');
    }

}
