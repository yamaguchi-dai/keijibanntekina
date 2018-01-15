<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class top extends Controller {

    public function get() {
        return view('top/top');
    }

}
