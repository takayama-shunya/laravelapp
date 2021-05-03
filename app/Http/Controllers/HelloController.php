<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index($id='zero') {

        $date = [
            'msg'=>'これはコントローラーから渡されたメッセージです。',
            'id'=>$id
        ];
        return view('hello.index', $date);

    }

    public function other() {

        return view('welcome');
    }
}

