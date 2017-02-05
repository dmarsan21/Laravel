<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('example', ['except' => ['home']]);
    }   

    public function home()
    {
    	return view('home');
    }

    

    // public function mensajes(CreateMessageRequest $request)
    // {
    //     $data = $request->all(); //devuelve un array

    //     //Guardar en base de datos

    //     // redirección
    //     return back()->with('info', 'Tu mensaje ha sido enviado correctamente');
        
    // }

    public function saludo($nombre = "Invitado")
    {
    	$html = "<h2>Contenido html</h2>";
    	$script = "<script>alert('Problema XSS - Cross Site Scripting!')</script>";

    	$consolas = [
    	"Play Station 4",
    	"Xbox One",
    	"Wii U"
    	];


    	return view('saludo', compact('nombre', 'html', 'script', 'consolas'));
    }
}
