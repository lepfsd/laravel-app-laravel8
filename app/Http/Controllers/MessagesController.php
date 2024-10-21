<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Mail\MessageReceived;
use App\Models\Message;
use App\Events\MessageWasReceived;

class MessagesController extends Controller
{
    public function store()
    {
        $msg = request()->validate([
            "nombre" => "required",
            "email" => "required|email",
            //'subject' => 'required',
            "mensaje" => "required|min:3",
        ]);
        //Mail::to('lepfsd00@gmail.com')->queue(new MessageReceived($msg));
        $mensaje = new Message($msg);
        $mensaje->save();
        MessageWasReceived::dispatch($mensaje);
        return back()->with("status", "recibimos tu msj, te responderemos");
    }

    public function index()
    {
        $key = "messages.page." . request("page", 1);
        //usando remember
        $messages = Cache::remember($key, 50, function () {
            return Message::latest()->paginate(10);
        });
        // if(Cache::has($key)) {
        //     $messages = Cache::get($key);
        // } else {
        //     $messages = Message::latest()->paginate(10);
        //     Cache::put($key, $messages, 50);
        // }

        return view("messages.index", compact("messages"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Message::findOrFail($id)->delete();
        Cache::flush();
        return redirect()
            ->route("messages.index")
            ->with("status", "el mensaje ha sido borrado con exito");
    }
}
