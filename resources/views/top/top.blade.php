@extends('layouts.app')
@section('title', 'TOPページ')
@push('scripts')
<script></script>
@endpush


@section('content')

<h1>YAMASA</h1>
<hr>
<div class="row">
    無料で使える匿名掲示板です。
    誹謗中傷はだめ絶対。スクショして気軽に使ってください。<br>
    <a href="/user" class="col s12 waves-effect waves-light btn-large" style="font-size: 30px;">
      あなた専用の掲示板を作成する
    </a>
    <br>
    
    
    <hr>
    僕宛はこちら。<br>
    <a href="http://yamaguppy.cf/send/yamaguppy31">やまぐっぴーに匿名でメッセージを送る</a>
</div>


  
        


@endsection
