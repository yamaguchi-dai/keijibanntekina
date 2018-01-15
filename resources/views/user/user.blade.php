@extends('layouts.app')
@section('title', '質問一覧')
@push('scripts')
<script></script>
@endpush


@section('content')
<div class="row" >
    <span>
        みんなに教えてあげて
    </span>
    <a href="tweet_user_url"class="waves-effect waves-light btn-large">リンク付きで呟く</a>
</div>

@foreach($question_list as $question)
<div class="row" >
    <div class="card grey lighten-4" style="min-height: 300px;padding: 30px;word-wrap: break-word;">
        {{$question->question}}
    </div>
</div>
@endforeach
@endsection
