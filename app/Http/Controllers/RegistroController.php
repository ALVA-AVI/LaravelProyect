<?php

namespace App\Http\Controllers;

use App\Category;
use App\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegistroController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index() {
        $registros = Registro::orderBy('id','DESC')->paginate(10);
        return view('admin.registro.index',compact('registros'));
    }
    public function create() {
        $categorias = Category::orderBy('name','ASC')->pluck('name','id');
        return view('admin.registro.create', compact('categorias'));
    }
    public function store(Request $request) {
        $request->validate([
            'titulo'=>'required|min:5|max:200',
            'category_id'=>'required',
            //'user_id'=>'required'
            'iso'=>'min:2',
            'resumen'=>'max:250',
            'fecha'=>'required|date',
            'image'=>'image|mimes:jpeg,jpg,png',
            'archivo'=>'file|mimes:pdf'
        ]);
        $urlimage['url'] = "";
        if($request->hasFile('image')){
            $imagen = $request->file('image');
            $nombre = time().$imagen->getClientOriginalName();
            $ruta = public_path().'/images/';
            $imagen->move($ruta,$nombre);
            $urlimage['url'] = '/images/'.$nombre;
        }
        $urlfile = "";
        if($request->hasFile('archivo')){
            $file = $request->file('archivo');
            $file_name = time().$file->getClientOriginalName();
            $urlfile = $file->storePubliclyAs('/Documentos',$file_name);
        }
        $registro = new Registro();
        $registro->category_id = e($request->category_id);
        $registro->titulo = e($request->titulo);
        $registro->contexto = e($request->contexto);
        $registro->resumen = e($request->resumen);
        $registro->archivo = e($urlfile);
        $registro->iso = e($request->iso);
        $registro->fecha = e($request->fecha); //e($request->iso);
        $registro->save();
        $registro->image()->create($urlimage);
        return redirect()->route('registros.index')->with('info',OK_IST);
    }
    public function show($id) {
        //$categorias = Category::orderBy('name','ASC')->pluck('name','id');
        $registro = Registro::where('id',$id)->with('category','image')->firstOrFail();
        return view('admin.registro.show',compact('registro'));
    }
    public function edit($id) {
        $categorias = Category::orderBy('name','ASC')->pluck('name','id');
        $registro = Registro::where('id',$id)->firstOrFail();
        $registro != "" ? $msg = OK_LST : $msg = NOT_LISTED;
        return view('admin.registro.edit',compact('registro','categorias'))->with('info',$msg);
    }
    public function update(Request $request, $id)  {
        $request->validate([
            'titulo'=>'required|min:5|max:100',
            'category_id'=>'required',
            'iso'=>'required|min:2',
            'resumen'=>'required|max:250',
            'fecha'=>'required|date',
            'image'=>'image|mimes:jpeg,jpg,png',
            'archivo'=>'file|mimes:pdf'
        ]);
        if($request->hasFile('image')){
            $imagen = $request->file('image');
            $nombre = time().$imagen->getClientOriginalName();
            $ruta = public_path().'/images/';
            $imagen->move($ruta,$nombre);
            $urlimage['url'] = '/images/'.$nombre;
        }
        $urlfile = "";
        $registro = Registro::findOrFail($id);
        if($request->hasFile('archivo')){
            if($registro->archivo != "" || $registro->archivo != null){
                $documento = explode('/',$registro->archivo);
                Storage::disk('public')->delete($documento[0].'/'.$documento[1]);
            }
        }
        if($request->hasFile('archivo')){
            $file = $request->file('archivo');
            $file_name = time().$file->getClientOriginalName();
            $urlfile = $file->storeAs('/Files',$file_name);
        }
        
        $registro->category_id = e($request->category_id);
        $registro->titulo = e($request->titulo);
        $registro->contexto = e($request->contexto);
        $registro->resumen = e($request->resumen);
        $registro->archivo = $urlfile!=""? e($urlfile):$registro->archivo;
        $registro->iso = e($request->iso);
        $registro->fecha = $request->fecha; //e($request->iso);
        $registro->save();
        if ($request->hasFile('image')) {
            $registro->image()->delete($urlimage);
        }
        if ($request->hasFile('image')) {
            $registro->image()->create($urlimage);
        }
        return redirect()->route('registros.index')->with('info',OK_UPT);
    }
    public function destroy($id) {
        $registro = Registro::findOrFail($id)->delete();
        return back()->with('info',OK_DEL);
    }
}
