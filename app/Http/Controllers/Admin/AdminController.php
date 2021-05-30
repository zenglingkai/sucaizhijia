<?php

namespace App\Http\Controllers\Admin;

use App\Services\Admin\AdminService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    //管理员列表
    public function index()
    {

        $AdminService = new AdminService();
        $data = $AdminService->getAdminList();

        $roles = $data;

        return view('admin.index', compact('data', 'roles'));
    }

    //管理员编辑页面
    public function edit(Request $request, $id)
    {
        $data = Admin::with('roles')->findOrFail($id);
        $roles = Role::get();
        return view('admin.admin.edit', compact('data', 'roles'));
    }

    //管理员更新
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        //进行验证
        $this->validate($request, [
            'mobile' => 'required|unique:admin,mobile' . $admin->id,
            'name' => 'required'
        ]);
        $admin->mobile = $request->get('mobile');
        $admin->name = $request->get('name');
        $admin->save();
        $admin->roles()->sync($request->get('roles'));

        return redirect()->route('admin.admin.index')->with('msg', '编辑成功');
    }

    //添加管理员验证
    public function store(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6|max:18',
            'mobile' => 'required|unique:admins,mobile',
            'name' => 'required'
        ]);
        $admin = Admin::create([
            'password' => bcrypt($request->get('password')),
            'mobile' => $request->get('mobile'),
            'name' => $request->get('name'),

        ]);


        $admin->roles()->sync($request->get('roles'));
        return back()->with('msg', '添加成功!');
    }

    //管理员详情
    public function show($id)
    {
        $data = Admin::findOrFail($id);
        return view('admin.admin.show', compact('data'));

    }

    //删除管理员
    public function destroy($id)
    {
        $data = Admin::findOrFail($id);
        if ($data->hasRole('admin')) {
            return back()->withErrors('msg', '不能删除管理员');
        }
        $data->roles()->detach();
        $data->delete();
        return back()->with('msg', '删除成功!');
    }

}
