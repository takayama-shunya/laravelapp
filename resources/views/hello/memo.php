@section('content')
  <p>ここが本文のコンテンツです。</p>
   <ul>
   @each('components.item', $data, 'item')
   </ul> -->

  @include('components.message', ['msg_title'=>'OK', 
      'msg_content'=>'サブビューです。']) -->

   @component('components.message')
       @slot('msg_title')
       CAUTION!
       @endslot

       @slot('msg_content')
       これはメッセージの表示です。
       @endslot
   @endcomponent -->
  @endsection




<html>
<head>
   <title>Hello/Index</title>
   <style>
   body {font-size:16pt; color:#999; }
   h1 { font-size:50pt; text-align:right; color:#f6f6f6;
       margin:-20px 0px -30px 0px; letter-spacing:-4pt; }
   </style>
</head> 
<<body>
  <h1>Blade/Index</h1>
   <p>&#064;foreachディレクティブの例</p>
   <ol> 
   <@foreach($data as $item)
   <li>{{$item}}
   @endforeach
   @for ($i = 1;$i < 100;$i++)
   @if ($i % 2 == 1)
       @continue
   @elseif ($i <= 10)
   <li>No, {{$i}}
   @else
       @break
   @endif
   @endfor
   </ol>
   <form method="POST" action="/hello">
      @csrf
      <input type="text" name="msg">
      <input type="submit">
   </form>

   <p>&#064;forディレクティブの例</p>
   @foreach ($data as $item)
   @if ($loop->first)
   <p>※データ一覧</p><ul>
   @endif
   <li>No,{{$loop->iteration}}. {{$item}}</li>
   @if ($loop->last)
   </ul><p>――ここまで</p>
   @endif
   @endforeach
</body>
</html>


@section('content')
   <p>ここが本文のコンテンツです。</p>
   <p>Controller value<br>'message' = {{$message}}</p>
   <p>ViewComposer value<br>'view_message' = {{$view_message}}</p>
@endsection
