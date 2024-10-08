<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;
use App\Models\Message;
use App\Events\MessageWasReceived;

class MessagesController extends Controller
{
    public function store() {

        $msg = request()->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            //'subject' => 'required',
            'mensaje' => 'required|min:3',
        ]);
        //Mail::to('lepfsd00@gmail.com')->queue(new MessageReceived($msg));
        $mensaje = new Message($msg);
        //$mensaje->save();
        MessageWasReceived::dispatch($mensaje);
        return back()->with('status', 'recibimos tu msj, te responderemos');
    }

    
    public function index() {
        $messages = Message::latest()->paginate(10);
        return view('messages.index', compact('messages'));
    }
}
