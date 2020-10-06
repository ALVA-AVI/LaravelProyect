<?php

namespace App\Http\Controllers;

use App\Departament;
use App\District;
use App\GrupoPolitico;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Validator;

class GrupoPoliticoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $comites = GrupoPolitico::orderBy('id','DESC')->with('departament')->paginate(8);
        //dd($comites->all());
        return view('admin.comite.index',compact('comites'));
    }
    public function create(){
        $departaments = Departament::orderBy('name','ASC')->get()->pluck('name','id');
        $provinces = Province::orderBy('name','ASC')->get()->pluck('name','id');
        $districts = District::orderBy('name','ASC')->get()->pluck('name','id');
        return view('admin.comite.comite',compact('departaments','provinces','districts'));
    }
    public function store(Request $request)
    {
        //
        $request->validate([
            'titulo'=>'required|max:180',
            'departament_id'=>'required',
            'descripcion'=>'required|max:300',
            'archivo'=>'file|mimes:pdf',
            'fecha'=>'required|date'
        ]);
        if($request->hasFile('archivo')){
            $file = $request->file('archivo');
            $file_name = time().$file->getClientOriginalName();
            $urlfile = $file->storePubliclyAs('/Comites',$file_name);
        }

        $request->departament_id  = $request->departament_id< 10? "0".$request->departament_id:$request->departament_id;
        $request->province_id  = ($request->province_id< 1000)? "0".$request->province_id:$request->province_id;
        $request->district_id  =  ($request->district_id != null && $request->district_id > 0)?"0".$request->district_id:null;
//        dd($request->district_id);

        $comite = new GrupoPolitico();
        $comite->titulo = e($request->titulo);
        $comite->departament_id = e($request->departament_id);
        $comite->province_id = $request->province_id != null ?e($request->province_id):null;
        $comite->district_id = $request->district_id != null ? e($request->district_id):null;
        $comite->descripcion = e($request->descripcion);
        $comite->fecha = e($request->fecha);
        $comite->archivo = e($urlfile);
        $comite->save();
        return redirect()->route('comites.create')->with('info',OK_IST);

    }
    public function show($id)
    {
        //
    }
    public function edit($id){
        //
        $departaments = Departament::orderBy('name','ASC')->pluck('name','id');
        $comite = GrupoPolitico::where('id',$id)->firstOrFail();
        return view('admin.comite.comite',compact('comite','departaments'));
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }

    public function getProvince(Request $request){
        if($request->ajax()){
            $request->id < 10 ? $id = "0".$request->id : $id = $request->id;  
            $provinces = Province::where('departament_id',$id)->get();
            foreach ($provinces as $row) {
                $data[$row->id] = $row->name;
            }
            return response()->json($data);
        }
    }
    public function getDistrict(Request $request){
        if($request->ajax()){
            $districts = District::where('province_id',$request->province_id)
                ->where('departament_id',$request->departament_id)->get();
            foreach ($districts as $row) {
                $data[$row->id] = $row->name;
            }
            return response()->json($data);
        }
    }
}
