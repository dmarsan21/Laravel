<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Mail;

use App\Message;

use Carbon\Carbon;

use App\Http\Requests;

use App\Events\MessageWasReceived;

class MessagesController extends Controller
{
    
    function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $messages = DB::table('messages')->get(); aca se usa Query Builder

        $messages = Message::with(['user', 'note', 'tags'])->get(); //Aca se usa eloquent
        
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $message = Message::create($request->all());

        // if (auth()->check()) {
        //     auth()->user()->messages()->save($message);
        // }

        $message->user_id = auth()->id();
        $message->save();

        event(new MessageWasReceived($message));

        

        //Redireccionar
        return redirect()->route('mensajes.create')->with('info', 'Hemos recibido tu mensaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        // $message = DB::table('messages')->where('id', $id)->first();
        $message = Message::findOrFail($id);

        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $message = DB::table('messages')->where('id', $id)->first();
        $message = Message::findOrFail($id);

        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Actualizar con query builder
        // DB::table('messages')->where('id', $id)->update([
        //     "nombre" => $request->input('nombre'),
        //     "email" => $request->input('email'),
        //     "mensaje" => $request->input('mensaje'),
        //     "updated_at" => Carbon::now(),
        // ]);

        //Actualizar con eloquent
        Message::findOrFail($id)->update($request->all());
        

        //Redireccionamos
        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar el mensaje Query builder
        // DB::table('messages')->where('id', $id)->delete();

        Message::findOrFail($id)->delete();

        //Redireccionar
        return redirect()->route('mensajes.index');
    }
}
