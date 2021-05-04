<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index() {

        $date = [
            'msg'=>'名前を入力して下さい。',
        ];
        return view('hello.index', $date);

    }

    public function other() {

        return view('welcome');
    }

    public function post(Request $request)
    {
        $msg = $request->msg;
        $date = [
            'msg' => 'こんには' . $msg .  'さん！',       ];
        return view('hello.index', $date);
    }
}

