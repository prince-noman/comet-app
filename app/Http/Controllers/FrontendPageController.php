<?php

namespace App\Http\Controllers;

class FrontendPageController extends Controller {
    /**
     * Show Home Page
     */
    public function showHomePage() {
        return view( 'frontend.pages.home' );
    }

}
