<?php

namespace App\Http\Controllers;

use App\Models\PersonClass;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PersonClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personClasses= PersonClass::paginate(8);
        return view('admin.personclasses.index',compact('personClasses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.personclasses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* $personclass= new personClass();
        
        $personclass->name = $request->name;
        $personclass->color = $request->color;

        $personclass->save();*/
        $personclass= PersonClass::create($request->all());

        if ($personclass->save()) {
            Alert::success('','تم إضافة الفئة بنجاح');
            return redirect()->route('personclasses.index');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PersonClass  $personClass
     * @return \Illuminate\Http\Response
     */
    public function show(PersonClass $personClass)
    {
        return view('admin.personclasses.show',compact('personClass'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PersonClass  $personClass
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonClass $personclass)
    {
        return view('admin.personclasses.edit',compact('personclass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PersonClass  $personClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonClass $personclass)
    {
        $personclass = PersonClass::findOrFail($personclass->id);
        $personclass->name = $request->name;
        $personclass->color = $request->color;
        $personclass->save();

        if ($personclass->save()) {
            Alert::success('','تم تعديل الفئة بنجاح');
            return redirect()->route('personclasses.index');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PersonClass  $personClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonClass $personclass)
    {
        $personclass=PersonClass::find($personclass->id);
        if ($personclass->delete()) {
            Alert::success('','تم حذف الفئة بنجاح');
            return redirect()->route('personclasses.index');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
        }
    }
}
