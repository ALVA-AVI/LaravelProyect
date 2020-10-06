<?php

namespace App\Http\Controllers;

use App\Carrusel;
use App\Category;
use App\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    //
    public function index(){
        $carrusel = Carrusel::orderBy('id','DESC')->with('category','image')->get();
        $categoria = Category::orderBy('name','ASC')->paginate(6);
        $noticia = Registro::orderBy('id','DESC')->join('categories','registros.category_id','=','categories.id')
        ->select('registros.*')->where('categories.module','=','1')->with('category','image')->first();
        return view('index',compact('noticia','categoria','carrusel'));
    }
    public function home(){
        $noticias = Registro::orderBy('id','DESC')->get();
        return view('web.noticias.index',compact('noticias'));
    }
    public function show($id){
        $noticia = Registro::where('id',$id)->orderBy('id','DESC')->with('category','image')->firstOrFail();
        $noticias = Registro::orderBy('id','DESC')->get();
        return view('web.noticias.show',compact('noticia','noticias'));
    }
    public function files($id){
        $file = Registro::where('id',$id)->orderBy('id','DESC')->with('category','image')->firstOrFail();
        $files = Registro::orderBy('id','DESC')->with('category','image')->get();
        return view('web.files.documents',compact('file','files'));
    }
    /*public function slug($slug){
        $registros = [];
        $categoria = Category::where('slug',$slug)->firstOrFail();
        $response = Registro::orderBy('id','DESC')->with('category','image')->paginate(15);
        foreach ($response as $row => $value) {
            if($row->category->slug == $categoria->slug){
                $registros = $row;
            }
        }
        dd($registros->all());
        //return view();
    }
    public function NotFound(){
       return view('web.404.index');
    }*/

    public function modulo($idmodulo){
        if($idmodulo == 2){
            $documentos = Registro::orderBy('id','DESC')->with('category')->get();
            return view('web.files.index',compact('documentos'));
        }
        if($idmodulo == 3){
            //$documentos = Registro::orderBy('id','DESC')->with('category')->get();
            return redirect()->back();
        }
    }
}
