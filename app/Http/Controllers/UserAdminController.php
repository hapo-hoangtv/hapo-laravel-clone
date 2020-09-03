<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserAdminController extends Controller
{
    public function index()
    {
        $users = User::paginate(config('variable.paginate'));
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function uploadImageAvatar($image) {
        $avatar = uniqid(). "_" .$image->getClientOriginalName();
        $image->storeAs(config('variable.link'), $avatar);
        return $avatar;
    }

    public function store(UserRequest $request)
    {
        $avatar = null;
        if ($request->hasFile('avatar')) {
            $avatar = $this->uploadImageAvatar($request->file('avatar'));
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'avatar' => $request->avatar,
            'role_id' => $request->role_id
        ]);
        return redirect('admin/users')->with('message', __('messages.success.add'));
    }
        
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('admin.users.edit', compact('users'));
    }

    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        $users = User::find($id);
        if ($request->hasFile('avatar')) {
            $image = $users->avatar;
            Storage::delete(config('variable.link').$image);
            $avatar = $this->uploadImageAvatar($request->file('avatar'));
            $data['avatar'] = $avatar;
        }
        $users->update($data);
        return redirect('admin/users')->with('message', __('messages.success.edit'));
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('admin/users');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $users = User::where('name', 'like', '%' . $search . '%')->paginate(2);
        return view('admin.users.index', compact(['search', 'users']));
    }
}
