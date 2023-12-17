<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Admin;
use App\Models\Page;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Admin::paginate(8);
        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.employees.create');
    }


    public function store(Request $request)
    {

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        if ($admin->save()) {
            Alert::success('', 'تم إضافة الموظف بنجاح');
            return redirect()->route('employees/index');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
        }
    }

    public function show(Request $request)
    {
        # code...
    }
    public function edit(Request $request, $id)
    {
        $employee = Admin::find($id);
        return view('admin.employees.edit', compact('employee'));
    }
    public function update(Request $request, $id)
    {
        $employee = Admin::find($id);
        $employee->name = $request->name;
        $employee->username = $request->username;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password);
        if ($employee->save()) {
            Alert::success('', 'تم تعديل المعلومات بنجاح');
            return redirect()->route('employees/index');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
        }
    }
    public function destroy(Request $request, $id)
    {
        $employee = Admin::find($id);
        if ($employee->delete()) {
            Alert::success('', 'تم حذف الموظف بنجاح');
            return redirect()->route('employees/index');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
        }
    }

    public function showPermission(Request $request, $id)
    {
        $employee = Admin::find($id);
        $pages = Page::all();
        return view('admin.employees.changePermission', compact('employee', 'pages'));
    }

    public function changePermission(Request $request, $id)
    {
        $pages = Page::all();
        $employee=Admin::find($id);
        foreach($pages as $page)
        {
            $employee->pages()->detach($page->id);
            if($request->has($page->id))
            {
                $employee->pages()->attach($page->id, ['permission' => 1]);

            }
        }
        if ($employee) {
            Alert::success('', 'تم تعديل الصلاحيات بنجاح');
            return redirect()->route('employees/index');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
        }
    }

    public function editProfile(Request $request)
    {
        $employee = auth()->guard('admin')->user();
        return view('admin.employees.editProfile', compact('employee'));
    }
    public function updateProfile(Request $request)
    {
        $admin = Admin::find(auth()->guard('admin')->user()->id);
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);

        $admin->save();
        if ($admin->save()) {
            Alert::success('', 'تم تعديل المعلومات بنجاح');
            return redirect()->route('admin/home');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
        }
    }
}
