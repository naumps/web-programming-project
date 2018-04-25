<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin,admin');
    }

    public function create(){

        return view('users.create_user');
    }

    public function index(){
        $users = User::all();
        return view('users.index',compact('users'));
    }

    public function edit(User $user){

        $roles = ['admin','editor','subscriber','user'];
        return view('users.edit',compact('user','roles'));
    }

    public function update(User $user){
        $post = request()->validate([
            'name' =>'required',
            'email'=>'required|email',
            'role'=>'',
        ]);
        $post['role']=request()->get('role')[0];
        $user->update($post);
        return redirect(route('users'));

    }
    public function store(Request $request){


        $validatedUser = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required'
        ]);
        $validatedUser['password'] = bcrypt($validatedUser['password']);
        User::create($validatedUser);

        return redirect('movies');
    }

    public function show(User $user){
        $movies = $user->movies;

        return view('master',compact('movies'));
    }
}
