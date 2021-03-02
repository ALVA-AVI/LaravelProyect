<?php

namespace App\Http\Controllers;

use App\Candidato;
use App\Departament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidatoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index(){
        $candidatos=Candidato::orderBy('id','DESC')->paginate(8);
        return view('admin.candidato.index',compact('candidatos'));
    }
    public function create(){
        $departaments = Departament::orderBy('name','ASC')->get()->pluck('name','id');
        return view('admin.candidato.candidato',compact('departaments'));
    }
    public function store(Request $request){
        $request->validate([
            'titulo'=>'required|max:180',
            'departament_id'=>'required',
            'descripcion'=>'required|max:300',
            'archivo'=>'file|mimes:pdf',
            'fecha'=>'required|date'
        ]);
        //$request->departament_id  = $request->departament_id< 10? "0".$request->departament_id:$request->departament_id;
        if($request->hasFile('archivo')){
            $file = $request->file('archivo');
            $file_name = time().$file->getClientOriginalName();
            $urlfile = $file->storePubliclyAs('/Candidato',$file_name);
        }
        //dd($urlfile);
        $candidato = new Candidato();
        $candidato->titulo = e($request->titulo);
        $candidato->departament_id = e($request->departament_id);
        $candidato->descripcion = e($request->descripcion);
        $candidato->fecha = e($request->fecha);
        $candidato->archivo = e($urlfile);
        $candidato->save();
        return redirect()->route('candidatos.create')->with('info',OK_IST);
    }
    /*public function show(Candidato $candidato){
        //
    }*/
    public function edit($id){
        $departaments = Departament::orderBy('name','ASC')->get()->pluck('name','id');
        $candidato = Candidato::where('id',$id)->firstOrFail();
        return view('admin.candidato.candidato',compact('candidato','departaments'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo'=>'required|max:180',
            'departament_id'=>'required',
            'descripcion'=>'required|max:300',
            'archivo'=>'file|mimes:pdf',
            'fecha'=>'required|date'
        ]);
        $candidato = Candidato::findOrFail($id);
        //dd($candidato->archivo);
        $urlfile = $candidato->archivo;
        if ($request->hasFile('archivo')) {
            //$archi = explode('/',$candidato->archivo);
            Storage::disk('public')->delete($urlfile);
            $urlfile = "";
        }
        if($request->hasFile('archivo')){
            $file = $request->file('archivo');
            $file_name = time().$file->getClientOriginalName();
            $urlfile = $file->storePubliclyAs('/Candidato',$file_name);
        }
        //$request->departament_id  = $request->departament_id< 10? "0".$request->departament_id:$request->departament_id;
        $candidato->titulo = e($request->titulo);
        $candidato->departament_id = e($request->departament_id);
        $candidato->descripcion = e($request->descripcion);
        $candidato->fecha = e($request->fecha);
        $candidato->archivo = e($urlfile);
        $candidato->save();
        return redirect()->route('candidatos.index')->with('info',OK_UPT);
    }
    public function destroy($id){
        $candidato = Candidato::findOrFail($id)->delete();
        return back()->with('info',OK_DEL);
    }
}
