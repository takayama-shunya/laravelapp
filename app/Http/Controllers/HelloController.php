<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    
    public function index(Request $request)
    {
       $items = DB::table('people')->get();
       return view('hello.index', ['items' => $items]);
    }

    public function show(Request $request)
    {
       $id = $request->id;
       $item = DB::table('people')->where('id', $id)->first();
       return view('hello.show', ['item' => $item]);
    }    

    public function add(Request $request)
    {
       return view('hello.add');
    }
    
    public function create(Request $request)
    {
       $param = [
           'name' => $request->name,
           'mail' => $request->mail,
           'age' => $request->age,
       ];
       DB::table('people')->insert($param);
       return redirect('/hello');
    }
    
    public function edit(Request $request)
    {
        $item = DB::table('people')
            ->where('id', $request->id)->first();
        return view('hello.edit', ['form' => $item]);
    }

    public function update(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')
            ->where('id', $request->id)
            ->update($param);
        return redirect('/hello');
    }
    

    public function del(Request $request)
    {
       $item = DB::table('people')
           ->where('id', $request->id)->first();
       return view('hello.del', ['form' => $item]);
    }
    
    public function remove(Request $request)
    {
       DB::table('people')
           ->where('id', $request->id)->delete();
       return redirect('/hello');
    }

    
   public function post(Request $request)
  {
   $rules = [
       'name' => 'required',
       'mail' => 'email',
       'age' => 'numeric',
   ];
   $messages = [
       'name.required' => '名前は必ず入力して下さい。',
       'mail.email'  => 'メールアドレスが必要です。',
       'age.numeric' => '年齢は整数で記入下さい。',
       'age.min' => '年齢はゼロ歳以上で記入下さい。',
       'age.max' => '年齢は200歳以下で記入下さい。',
   ];
   $validator = Validator::make($request->all(), $rules, $messages);

   $validator->sometimes('age', 'min:0', function($input){
       return !is_int($input->age);
   });
   $validator->sometimes('age', 'max:200', function($input){
       return !is_int($input->age);
   });

   if ($validator->fails()) {
       return redirect('/hello')
           ->withErrors($validator)
           ->withInput();
   }
   return view('hello.index', ['msg'=>'正しく入力されました！']);
  }

   public function other() 
   {
      return view('welcome');
   }

}

