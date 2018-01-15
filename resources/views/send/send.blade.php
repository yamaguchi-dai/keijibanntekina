@extends('layouts.app')
@section('title', '質問を投げる')
@push('scripts')
<script></script>
@endpush


@section('content')

<div class="row">
    <h2>@ {{$user_id}}へ匿名でメッセージを送る</h2>
</div>
<div class="row">
    <div class="card grey lighten-4">
        <div class="row">
            <form action="/send/{{$user_id}}" method="post" class="col s12">
                 {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="textarea1" class="materialize-textarea" name="textarea"></textarea>
                        <label for="textarea1">Textarea</label>
                    </div>
                </div>
                <input type="submit">
            </form>
        </div>
    </div>
</div>


  
        


@endsection
