<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use App\Models\ExtracurricularCategory;
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

        $extracurricularCategories = ExtracurricularCategory::where('is_active', true)
            ->whereHas('extracurriculars', fn ($query) => $query->where('is_active', true))
            ->orderBy('order_number')
            ->get();

        $extracurriculars = Extracurricular::with('category')
            ->where('is_active', true)
            ->whereHas('category', fn ($query) => $query->where('is_active', true))
            ->orderBy('order_number')
            ->get();

        return view('kesiswaan', compact('period', 'extracurricularCategories', 'extracurriculars'));
    }
}
