<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class WallController extends Controller
{
    public function post(Request $request)
    {
        $message = Message::create([
            'body' => $request->message,
        ]);
        // $message2 = new Message;
        // $message2->body = $request->message;
        // $message2->save();

        return redirect()->route('dashboard');
    }

    public function show(Message $message)
    {
        return view('messages.show', [
            'message' => $message
        ]);
    }

    public function update(Request $request, Message $message)
    {
        $message->update([
            'body' => $request->body,
        ]);

        return redirect()->route('messages.show', ['message' => $message]);
    }

    public function delete(Message $message)
    {
        $message->delete();

        return redirect()->route('dashboard');
    }
}
