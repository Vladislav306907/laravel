<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\TranslationEvent;

class SendController extends Controller
{
    public function index(){
    	return view('send');
    }
    public function handle(Request $request)
    {
        event(new TranslationEvent(
            $request->id,
            $request->message)
        );
        return view('send');
    }
}
