<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class EmployeeController extends Controller
{
    public function index()

    {
        $user = User::all();
        return view('admin.pages.employee.index', compact('user'));
    }
    public function create()
    {
        return view('admin.pages.employee.create');
    }
    public function store(Request $request)
    {
        $employee = new User();
        $this->validate($request, [
            'user_name' => 'required',
            'user_cccd' => 'required',
            'user_email' => 'required',
            'user_gender' => 'required',
            'user_phone' => 'required',
            'user_avatar' => 'nullable',
            'user_address' => 'required',
            'user_birthday' => 'required',
            'user_datestart' => 'required',
            'user_birthday' => 'required',
            'user_position' => 'required',

        ]);
        // $request->image = $this->imageUpload($request);
        $employee->user_name = $request->user_name;
        $employee->user_cccd = $request->user_cccd;
        $employee->user_email = $request->user_email;
        $employee->user_gender = $request->user_gender;
        $employee->user_phone = $request->user_phone;
        // $employee->user_avatar = null;
        $employee->user_address = $request->user_address;
        $employee->user_birthday = $request->user_birthday;
        $employee->user_datestart = $request->user_datestart;
        $employee->user_position = $request->user_position;


        if ($employee->save()) {
            Session::flash('message', 'thêm tài khoản thành công');
        } else {
            Session::flash('message', 'thêm tài khoản thất bại');
        }
        return redirect()->route('admin.employee.index');
    }

    public function edit(User $user)
    {
        return view('admin.pages.employee.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {

        $data = $request->validate([
            'user_name' => 'required',
            'user_cccd' => 'required',
            'user_email' => 'required',
            'user_gender' => 'required',
            'user_phone' => 'required',
            'user_avatar' => 'nullable',
            'user_address' => 'required',
            'user_birthday' => 'required',
            'user_datestart' => 'required',
            'user_birthday' => 'required',
            'user_position' => 'required',
        ]);



        if ($user->update($data)) {
            Session::flash('message', 'Cập nhật thể loại thành công');
        } else {
            Session::flash('message', 'Cập nhật thể loại thất bại');
        }
        return redirect()->route('admin.employee.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.employee.index');
    }

    public function search(Request $request)
    {
        $user = User::where([['user_name', 'like', '%' . $request->namesearch . '%']])
            ->orwhere([['user_email', 'like', '%' . $request->namesearch . '%']])
            ->paginate(5);
        return View('admin.pages.employee.index', ['user' => $user]);
    }
}
