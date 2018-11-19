<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\User;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // ログインユーザーがアクセスできる権限一覧を返す
    protected function getAccessibleRoles()
    {
        $roles = [
            'system',
            'admin',
            'user',
            'editor',
        ];
        return array_slice($roles, array_search(Auth::user()->role, $roles));
    }

    public function index()
    {
        $users = User::whereIn('role', $this->getAccessibleRoles())->get();
        return view('dashboard.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('dashboard.users.create', ['roles' => $this->getAccessibleRoles()]);
    }

    public function store(UserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('dashboard.users.index')
            ->with('flash', 'Nice! You completed registration new user successfully.');
    }

    public function edit($id = null) 
    {
        if ($id === null) {
            $id = Auth::id();
        }
        $user = User::findOrFail($id);
        return view('dashboard.users.edit', ['user' => $user, 'roles' => $this->getAccessibleRoles()]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'nickname' => 'nullable|string|max:255',
            'role' => 'required',
            'email' => 'required|email|string|max:255|unique:users,email,'.$id,
            'twitter' => 'nullable|url',
            'facebook' => 'nullable|url',
        ]);
            
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->nickname = $request->nickname;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->sns_links = json_encode([
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
        ]);

        $user->save();

        return redirect()->route('dashboard.users.index')
        ->with('flash', 'Nice! You completed updating user information successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('dashboard.users.index');
    }
}
