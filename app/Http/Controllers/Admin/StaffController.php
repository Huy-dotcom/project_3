<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Admin::where('role',1)->get();
        return view('admin.staffs.list', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staffs.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkEmailExist = Admin::where('email', $request->email)->exists();
        if ($checkEmailExist) {
            return redirect()->back()->withInput()->with("invalid","Email này đã tồn tại trong hệ thống, xin vui lòng đổi email khác");
        }
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 1
        ]);
        return redirect()->route('staff.list')->with("success","Thêm thành công");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Admin::find($id);
        return view('admin.staffs.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $staff = Admin::find($id);
        $staff->name = $request->name;
        $staff->email = Admin::where('email', $request->email)->exists() ? $staff->email : $request->email;
        $staff->password = $staff->password == $request->password ? $request->password : bcrypt($request->password);
        $staff->save();
        return redirect()->route('staff.list')->with("success","Cập nhật thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Admin::find($id);
        $staff->delete();
        return redirect()->route('staff.list')->with("success","Xóa thành công");
    }
}