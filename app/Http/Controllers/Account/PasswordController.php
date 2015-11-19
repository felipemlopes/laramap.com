<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
    public function change_password(Request $request) {
        if ($request->user()) {
            $request->user()->password = bcrypt($request->get('password'));
            $request->user()->save();

            alert()->success('Your password was successfully changed', 'Alright!');
            return redirect()->intended('account/profile');
        }
    }
}
