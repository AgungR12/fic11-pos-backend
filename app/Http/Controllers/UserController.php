<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::when($request->input('name'), function($query, $name){
            return $query->where('name', 'like', '%'.$name.'%');
        })->orderBy('id','desc')->paginate(5);
        return view('pages.users.index', ['users' => $users]);
    }

    public function create()
    {
        $role = Role::select('level')->get();
        return view('pages.users.create', ['role' => $role]);
    }

    public function store(UserCreateRequest $request)
    {
        // $request->validate([
        //     'name' => 'required|max:100|min:3',
        //     'email' => 'required|email|unique:users,email',
        //     'phone' => 'required',
        //     'roles' => 'required|in:admin,staff','user',
        //     'password' => 'required|min:8',
        //     // 'password_confirmation' => 'required|same:password'
        // ]);

        if($request->input('password') != $request->input('password_confirmation')){
            toast('Password and password confirmation do not match', 'error')->position('top')->autoClose(5000);
            return redirect()->back();
        }

        $data = $request->all();
        $data['name'] = $request->input('firstname') . ' '. $request->input('endname');
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        if($data['roles'] == ''){
            toast('Role has not been selected')->position('top')->autoClose(5000);
            return redirect()->back();
        }
        // dd($user);
        toast('User successfully created','success')->position('top')->autoClose(5000);
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.users.edit',['user' => $user]);
    }

    public function update(UserEditRequest $request, User $user)
    {

        $data = $request->all();
        $user->update($data);
        // dd($user);
        toast('User successfully updated', 'success')->position('top')->autoClose(5000);
        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        toast('User successfully deleted', 'success')->position('top')->autoClose(5000);
        return redirect()->route('user.index');
    }
}
