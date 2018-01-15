<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller {

    /**
     * Twitterからの遷移
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request) {
        $user = Socialite::driver('twitter')->user();    
        $request->session()->put('twitter_user', $user);
        return redirect('user');
    }

}
