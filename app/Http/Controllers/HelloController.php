<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index() {

        // $date = [
        //     // 'msg'=>'名前を入力して下さい。',
        // ];
        // $data = ['one', 'two', 'three', 'four', 'five'];
        
   $data = [
    ['name'=>'山田たろう', 'mail'=>'taro@yamada'],
    ['name'=>'田中はなこ', 'mail'=>'hanako@flower'],
    ['name'=>'鈴木さちこ', 'mail'=>'sachico@happy']
        ];
    return view('hello.index', ['message'=>'Hello!']);
    // return view('hello.index', ['data'=>$data]);
        // return view('hello.index', ['msg'=>'']);

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

