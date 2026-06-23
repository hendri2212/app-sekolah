<?php

namespace App\Http\Controllers;

use App\Models\SchoolProfile;

class ProfileController extends Controller
{
    public function index()
    {
        $schoolProfile = SchoolProfile::first();

        return view('profile', compact('schoolProfile'));
    }
}
