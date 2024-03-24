<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class AccountController extends Controller
{
    public function index()
    {
        $account = Account::all();
        return view('admin.pages.account.index', compact('account'));
    }

    public function create()
    {
        return view('admin.pages.account.create');
    }

    public function store(Request $request)
    {
        $account = new Account();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',

            'status' => 'required',
        ]);
        // $request->image = $this->imageUpload($request);

        $account->password = Hash::make($request->password);
        $account->name = $request->name;
        $account->email = $request->email;
        $account->role = $request->role;
        $account->status = $request->status;

        if ($account->save()) {
            Session::flash('message', 'thêm tài khoản thành công');
        } else {
            Session::flash('message', 'thêm tài khoản thất bại');
        }
        return redirect()->route('admin.account.index');
    }

    public function show(Account $accounts)
    {
        return view('admin.pages.account.show', compact('accounts'));
    }

    public function edit(Account $accounts)
    {
        return view('admin.pages.account.edit', compact('accounts'));
    }

    public function update(Request $request, Account $accounts)
    {

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'status' => 'required',

        ]);

        if ($accounts->update($data)) {
            Session::flash('message', 'Cập nhật thành công!');
        } else
            Session::flash('message', 'Cập Nhật Thất Bại!');
        return redirect()->route('admin.account.index');
    }

    public function destroy(Account $accounts)
    {
        // Storage::delete($accounts->avatar);
        $accounts->delete();

        return redirect()->route('admin.account.index');
    }
    public function search(Request $request)
    {
        $account = Account::where([['name', 'like', '%' . $request->namesearch . '%']])
            ->orwhere([['email', 'like', '%' . $request->namesearch . '%']])
            ->paginate(5);
        return View('admin.pages.account.index', ['account' => $account]);
    }
}
