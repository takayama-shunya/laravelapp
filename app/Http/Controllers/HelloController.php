<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(Request $request)
    {       
        return view('hello.index');

    }



    public function other() {

        return view('welcome');
    }

    public function post(Request $request)
    {
        $msg = $request->msg;
        $date = [
            'msg' => 'こんには' . $msg .  'さん！',       ];
        // return view('hello.index', $date);
        return view('hello.index', ['msg'=>$request->msg]);

    }
}

