<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class AccountController extends Controller
{
    public function index()
    {
        $account = User::all();
        return view('admin.pages.account.index', compact('account'));
    }

    public function create()
    {
        return view('admin.pages.account.create');
    }

    public function store(Request $request)
    {
        $account = new User();
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'role' => 'required',
            'avatar' => 'nullable',
            'status' => 'required',
        ]);
        // $request->image = $this->imageUpload($request);
        $account->name = $request->name;
        $account->password = Hash::make($request->password);
        $account->email = $request->email;
        $account->role = $request->role;
        $account->status = $request->status;
        if ($request->avatar == null) $imageName = $account->avatar;
        else
            $account->avatar = $request->file('avatar')->store('public/account');

        if ($account->save()) {
            Session::flash('message', 'thêm tài khoản thành công');
        } else {
            Session::flash('message', 'thêm tài khoản thất bại');
        }
        return redirect()->route('admin.account.index');
    }

    public function show(User $accounts)
    {
        return view('admin.pages.account.show', compact('accounts'));
    }

    public function edit(User $accounts)
    {
        return view('admin.pages.account.edit', compact('accounts'));
    }

    public function update(Request $request, User $accounts)
    {

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'status' => 'required',

        ]);
        if ($request->avatar == null) $imageName = $accounts->avatar;
        else {
            if ($accounts->avatar != null) {
                Storage::delete($accounts->avatar);
                $data['avatar'] = $request->file('avatar')->store('public/account');
            } else
                $data['avatar'] = $request->file('avatar')->store('public/account');
        }
        if ($accounts->update($data)) {
            Session::flash('message', 'Cập nhật thành công!');
        } else
            Session::flash('message', 'Cập Nhật Thất Bại!');
        return redirect()->route('admin.account.index');
    }

    public function destroy(User $accounts)
    {
        // Storage::delete($accounts->avatar);
        $accounts->delete();

        return redirect()->route('admin.account.index');
    }
    public function search(Request $request)
    {
        $account = User::where([['name', 'like', '%' . $request->namesearch . '%']])
            ->orwhere([['email', 'like', '%' . $request->namesearch . '%']])
            ->paginate(5);
        return View('admin.pages.account.index', ['account' => $account]);
    }
}
