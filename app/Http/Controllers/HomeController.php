<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

    public function createUser()
    {
        
    }

    public function updateUser()
    {
        
    }

    public function deleteUser($uid)
    {
        $user = User::find($uid);
        $user->delete();
        return $this->index();
    }

}
