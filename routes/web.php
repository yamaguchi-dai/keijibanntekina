<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','top@get');
Route::get('/top','top@get');




//認証画面へ遷移
Route::get('auth/twitter', function(){
    return Socialite::driver('twitter')->redirect();
});
/** 認証後コールバック関数*/
Route::get('auth/twitter/callback', 'Auth\AuthController@handleProviderCallback');

/**ログアウト処理 セッション破棄 */
Route::get('logout','user@logout');

//メッセージ一覧ページ
Route::get('user','user@get');

//urlを呟く
Route::get('tweet_user_url','user@tweet_user_url');

/**
 * メッセージ投稿用ページ
 */
Route::get('send/{user_id}','send@get');
Route::post('send/{user_id}','send@post');