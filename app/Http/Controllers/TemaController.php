<?php

namespace App\Http\Controllers;

use App\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(){
        $temas = Tema::orderBy('id','DESC')->paginate(6);
        return view('admin.tema.index',compact('temas'));
    }
    public function create()
    {
        return view('admin.tema.tema');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:5'
        ]);
        $tema = new Tema();
        $tema->name = e($request->name);
        $tema->save();
        return redirect()->back()->with('info',OK_IST);
    }
    public function show(Tema $tema){
        //
    }
    public function edit($id)
    {
        //
        $tema = Tema::where('id',$id)->firstOrFail();
        return view('admin.tema.tema',compact('tema'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required|min:5'
        ]);
        $tema = Tema::findOrFail($id);
        $tema->name = e($request->name);
        $tema->save();
        return redirect()->route('temas.index')->with('info',OK_UPT);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tema = Tema::findOrFail($id)->delete();
        return back()->with('info',OK_DEL);
    }
}
