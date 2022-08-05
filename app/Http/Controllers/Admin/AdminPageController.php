<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminPageController extends Controller {
    /**
     * Show admin dashboard
     */
    public function showDashboard() {
        return view( 'admin.pages.dashboard' );
    }
}