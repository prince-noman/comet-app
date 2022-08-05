<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller {
    /**
     * Show admin login page
     */
    public function showLoginPage() {
        return view( 'admin.pages.login' );
    }

    /**
     * admin login
     */
    public function login( Request $request ) {

        //validation
        $this->validate( $request, [
            'auth'     => 'required',
            'password' => 'required',
        ] );

//Try to login
        if ( Auth::guard( 'admin' )->attempt( ['email' => $request->auth, 'password' => $request->password] ) ) {
            return redirect()->route( 'admin.dashboard' );
        } else {
            return redirect()->route( 'admin.login' )->with( 'warning', 'Incorrect Credentials.' );
        }

    }

}