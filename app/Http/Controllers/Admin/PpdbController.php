<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function index()
    {
        return view('admin.ppdb.index', [
            'spmbMenuEnabled' => SiteSetting::isSpmbMenuEnabled(),
        ]);
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'spmb_menu_enabled' => ['nullable', 'boolean'],
        ]);

        SiteSetting::setValue(
            SiteSetting::SPMB_MENU_ENABLED,
            $request->boolean('spmb_menu_enabled')
        );

        return redirect()
            ->route('admin.ppdb.index')
            ->with('success', 'Pengaturan menu SPMB berhasil disimpan.');
    }
}
