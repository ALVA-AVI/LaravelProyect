<?php

namespace App\Http\Controllers;

use App\Mail\MessageRecived;
use App\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactaController extends Controller
{
    //
    public function contacta(){
        $temas = Tema::orderBy('name','ASC')->pluck('name','id');
        return view('web.contacta.index',compact('temas'));
    }
    public function senMail(Request $request){
        $mssg = request()->validate([
            'tema'=>'required',
            'nombre'=>'required',
            'apellido'=>'required|min:5',
            'correo'=>'required|email',
            'contexto'=>'min:10',
            'celular'=>'required|max:9',
        ]);
        $idtema = $mssg['tema'];
        $tema = Tema::where('id',$idtema)->firstOrFail();
        $mssg['tema'] = $tema->name;
        //config('mail.from.address')
        $enviado = Mail::to('pruebaproducciontesting@gmail.com')->queue(new MessageRecived($mssg));
        return back()->with('info',OK_ENVIADO);
        /*if($enviado){
            return back()->with('info',OK_ENVIADO);
        }else{
            return back()->with('info',NOT_ENVIADO);
        }*/
    }
}
