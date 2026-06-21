<?php

namespace App\Http\Controllers;

use App\Models\OsisPeriod;

class KesiswaanController extends Controller
{
    public function index()
    {
        $period = OsisPeriod::with(['members' => function ($query) {
            $query->orderBy('order_number');
        }])
            ->where('is_active', true)
            ->first();

        if (!$period) {
            $period = OsisPeriod::with(['members' => function ($query) {
                $query->orderBy('order_number');
            }])->latest()->first();
        }

        return view('kesiswaan', compact('period'));
    }
}
