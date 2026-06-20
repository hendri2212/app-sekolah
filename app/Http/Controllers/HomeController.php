<?php

namespace App\Http\Controllers;

use App\Models\SchoolProfile;

class HomeController extends Controller
{
    public function index()
    {
        $schoolProfile = SchoolProfile::first();
        $schoolAge = $schoolProfile && $schoolProfile->established_year
            ? now()->year - (int) $schoolProfile->established_year
            : 0;

        return view('dashboard', compact('schoolProfile', 'schoolAge'));
    }
}
