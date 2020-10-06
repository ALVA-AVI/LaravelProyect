<?php

namespace App\Http\Controllers;

use App\Carrusel;
use App\Category;
use Illuminate\Http\Request;

class CarruselController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        //
        $carrusel = Carrusel::OrderBy('id','DESC')->with('category','image')->paginate(15);
        return view('admin.banner.index',compact('carrusel'));
    }

    public function create(){
        //
        $category = Category::orderBy('name','ASC')->pluck('name','id');
        return view('admin.banner.create',compact('category'));
    }

    public function store(Request $request){
        //
        //dd($request->all());
        $request->validate([
            'titulo'=>'required|max:60',
            'category_id'=>'required',
            'resena'=>'max:255',
            'linkref'=>'required',
            'image'=>'required|image|dimensions:min_width=600,max_width=2400,min_height=300,max_height=1300|mimes:jpeg,jpg,png'
        ]);
        if($request->hasFile('image')){
            $imagen = $request->file('image');
            $nombre = time().$imagen->getClientOriginalName();
            $ruta = public_path().'/images/banner/';
            $imagen->move($ruta,$nombre);
            $urlimage['url'] ='/images/banner/'.$nombre;
        }
        $carrusel = new Carrusel();
        $carrusel->titulo = e($request->titulo);
        $carrusel->category_id = e($request->category_id);
        $carrusel->resena = e($request->resena);
        $carrusel->linkref = e($request->linkref);
        $carrusel->save();
        $carrusel->image()->create($urlimage);
        return redirect()->route('banners.index')->with('info',OK_IST);
    }


    public function show($id){
        //
        $carrusel = Carrusel::where('id',$id)->with('category','image')->firstOrFail();
        return view('admin.banner.show',compact('carrusel'));
    }

    public function edit($id){
        $category = Category::orderBy('id','ASC')->pluck('name','id');
        $carrusel = Carrusel::where('id',$id)->with('category','image')->firstOrFail();
        return view('admin.banner.edit',compact('carrusel','category'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'titulo'=>'required|max:60',
            'category_id'=>'required',
            'resena'=>'max:255',
            'linkref'=>'required',
            'image'=>'image|dimensions:min_width=600,max_width=2400,min_height=300,max_height=1300|mimes:jpeg,jpg,png'
        ]);
        if($request->hasFile('image')){
            $imagen = $request->file('image');
            $nombre = time().$imagen->getClientOriginalName();
            $ruta = public_path().'/images/banner/';
            $imagen->move($ruta,$nombre);
            $urlimage['url'] = '/images/banner/'.$nombre;
        }
        $carrusel = Carrusel::findOrFail($id);
        $carrusel->category_id = e($request->category_id);
        $carrusel->titulo = e($request->titulo);
        $carrusel->resena = e($request->resena);
        $carrusel->linkref = e($request->linkref);
        $carrusel->save();
        if ($request->hasFile('image')) {
            $carrusel->image()->delete($urlimage);
        }
        if ($request->hasFile('image')) {
            $carrusel->image()->create($urlimage);
        }
        return redirect()->route('banners.index')->with('info',OK_UPT);
    }
    public function destroy($id){
        //
        $registro = Carrusel::findOrFail($id)->delete();
        return back()->with('info',OK_DEL);
    }
}
