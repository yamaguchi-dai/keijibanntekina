<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class send extends Controller {

    public function get($user_id) {
        if (!$user_id) {
            //トップページにでも持ってくか
        }

        return view('send/send', [
            'user_id' => $user_id
        ]);
    }

    public function post(Request $req, $user_id) {

        $post_user_id = '';

        if ($req->session()->has('twitter_user')) {
            $twitter_user_info = $req->session()->get('twitter_user');
            //セッションからツイッターIDを取得<-ないかも
            $post_user_id = $twitter_user_info->nickname;
        }


        //DBに格納
        DB::table('t_question')->insert(
                [
                    'user_id' => $user_id,
                    'question' => $req->input('textarea'),
                    'ip' => $req->getClientIp(),
                    'post_user_id' => $post_user_id
                ]
        );
        //完了ページをresponseとして返す。
        return view('send/send_complete');
    }

}
