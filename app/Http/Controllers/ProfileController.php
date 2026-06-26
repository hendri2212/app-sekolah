<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\SchoolProfile;

class ProfileController extends Controller
{
    public function index()
    {
        $schoolProfile = SchoolProfile::first();
        $facilities = Facility::where('is_active', true)
            ->orderBy('order_number')
            ->orderBy('name')
            ->get();

        return view('profile', compact('schoolProfile', 'facilities'));
    }
}
