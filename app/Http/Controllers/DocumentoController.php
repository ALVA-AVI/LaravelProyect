<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departament;
use App\District;
use App\Province;
use Barryvdh\DomPDF\Facade as PDF;

class DocumentoController extends Controller
{
    //
    public function formulario(){
        $region = Departament::orderBy('name','ASC')->pluck('name','id');
        return view('web.afiliacion.frmafiliar',compact('region'));
    }
    public function province(Request $request){
        if($request->ajax()){
            $provinces = Province::where('departament_id',$request->region)->get();
            foreach ($provinces as $row) {
                $data[$row->id] = $row->name;
            }
            return response()->json($data);
        }
    }
    public function districts(Request $request){
        if($request->ajax()){
            $districts = District::where('province_id',$request->province)
                ->where('departament_id',$request->region)->get();
            foreach ($districts as $row) {
                $data[$row->id] = $row->name;
            }
            return response()->json($data);
        }
    }
    public function registro(Request $request){
        $request->validate([
            'nombre'=>'required',
            'apellidopat'=>'required',
            'apellidomat'=>'required',
            'dni'=>'required|size:8',
            'fechanac'=>'required|date',
            'estacivil'=>'required',
            'sexo'=>'required',
            'ubigeonac'=>'required',
            'region'=>'required',
            'province'=>'required',
            'district'=>'required',
            'avenida'=>'required',
            'nro'=>'required',
            'sector'=>'required',
            'phone'=>'required',
            'correo'=>'required|email',
            'fecha_afiliacion'=>'required',
            'photo'=>'required|image|dimensions:min_width=320,min_height=450|mimes:jpeg,png',
        ]);
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $file_name = time().str_replace(' ','',$file->getClientOriginalName());
            $urlfile = $file->storePubliclyAs('/ficha_photo',$file_name);
        }
        $id = $request->district < 100000?"0".$request->district:$request->district;
        $ubigeo = District::join('provinces','districts.province_id','=','provinces.id')->join('departaments','districts.departament_id','=','departaments.id')
        ->select('departaments.name as region','provinces.name as provincia','districts.name as distrito')->where('districts.id',$id)->firstOrFail();
        $data = compact('ubigeo','request','urlfile');
        $pdf = PDF::loadView('web.afiliacion.afiliacion',$data);
        $pdf->setPaper('a4','letter');
        return $pdf->stream();
    }
}
