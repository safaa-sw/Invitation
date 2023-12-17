<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titles= Title::paginate(8);
        return view('admin.titles.index',compact('titles'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.titles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* $title= new Title();
        
        $title->name = $request->name;
        $title->lang = $request->lang;

        $title->save();*/
        $title= Title::create($request->all());

        if ($title->save()) {
            Alert::success('','تم إضافة اللقب بنجاح');
            return redirect()->route('titles.index');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function show(Title $title)
    {
        return view('admin.titles.show',compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function edit(Title $title)
    {
        return view('admin.titles.edit',compact('title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Title $title)
    {
        $title = Title::findOrFail($title->id);
        $title->name = $request->name;
        $title->lang = $request->lang;
        $title->save();

        if ($title->save()) {
            Alert::success('','تم تعديل اللقب بنجاح');
            return redirect()->route('titles.index');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function destroy(Title $title)
    {
        $title=Title::find($title->id);
        if ($title->delete()) {
            Alert::success('','تم حذف اللقب بنجاح');
            return redirect()->route('titles.index');
        } else {
            Alert::error('', 'خطأ ، يرجى المحاولة لاحقاً');
        }
    }
}
