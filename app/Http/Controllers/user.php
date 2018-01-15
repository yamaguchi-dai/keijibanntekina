<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Thujohn\Twitter\Facades\Twitter;

class user extends Controller {

    /**
     * Auth後処理セッションにAuth情報がない場合、認証画面へリダイレクトをかける　
     * @param Request $request リクエストパラメーター
     * @return type
     */
    public function get(Request $request) {

        //セッションにログイン情報が存在しない場合認証画面へリダイレクト
        if (!$request->session()->has('twitter_user')) {
            return redirect('auth/twitter');
        }

        $twitter_user_info = $request->session()->get('twitter_user');

        Log::info(print_r($twitter_user_info, true));

        //セッションからuser_id取得
        $user_id = $twitter_user_info->nickname;

        //投稿された設問を全取得
        $question_list = DB::table('t_question')->where('user_id', $user_id)->get();

        //DBに格納
        DB::table('user_log')->insert(
                [
                    'user_id' => $user_id,
                    'ip' => $request->getClientIp(),
                ]
        );


        return view('user/user', [
            'user_url' => env('APP_URL') . 'send/' . $user_id,
            'question_list' => $question_list]);
    }

    /**
     * 自分のURLを呟く
     */
    public function tweet_user_url(Request $request) {
        //セッションにログイン情報が存在しない場合認証画面へリダイレクト
        if (!$request->session()->has('twitter_user')) {
            return redirect('auth/twitter');
        }
        $twitter_user_info = $request->session()->get('twitter_user');
        //tokenSecret
        // 一度アクセストークンとアクセストークンシークレットを空にする処理
        Twitter::reconfig(['token' => '', 'secret' => '']);

        $request_token = [
            'token' => $twitter_user_info->token,
            'secret' => $twitter_user_info->tokenSecret,
        ];
        // ttwitter.phpの配列をマージ
        Twitter::reconfig($request_token);
        $tweet = $twitter_user_info->name."に匿名でメッセージを送ろう!!\n http://yamaguppy.cf/send/" . $twitter_user_info->nickname;

        try {
            Twitter::postTweet([
                'status' => $tweet
            ]);
        } catch (\Exception $e) {
            Log::info('エラーここから');

            Log::info('エラーここまで');
            return redirect('user');
        }
        Log::info(print_r($twitter_user_info, true));
        return redirect('user');
    }

    public function logout(Request $request) {
        $request->session()->flush();

        return redirect('/');
    }

}
