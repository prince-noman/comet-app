<?php

namespace App\Http\Controllers;

use App\Models\Slider;

class FrontendPageController extends Controller {
    /**
     * Show Home Page
     */
    public function showHomePage() {
        $sliders = Slider::where( 'status', true )->latest()->get();
        return view( 'frontend.pages.home', [
            'sliders' => $sliders,
        ] );
    }

    /**
     * Show Contact Page
     */
    public function showContactPage() {
        return view( 'frontend.pages.contact' );
    }

}