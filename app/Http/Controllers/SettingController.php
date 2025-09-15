<?php
// app/Http/Controllers/SettingController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        $title = 'Pengaturan Desa';
        $settings = Setting::allSettings();
        return view('admin.settings', compact('settings', 'title'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'struktur_organisasi' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // validasi logo
        ]);

        $keys = [
            'nama_desa',
            'alamat_desa',
            'visi',
            'misi',
            'sambutan_kepala',
            'sejarah',
        ];

        foreach ($keys as $key) {
            Setting::set($key, $request->input($key));
        }

        // handle struktur_organisasi image
        if ($request->hasFile('struktur_organisasi')) {
            $file = $request->file('struktur_organisasi');
            $path = $file->store('uploads', 'public');

            // hapus file lama
            $oldPath = Setting::get('struktur_organisasi');
            if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }

            Setting::set('struktur_organisasi', $path);
        }

        // handle logo image
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = $file->store('uploads', 'public');

            // hapus file lama logo
            $oldLogoPath = Setting::get('logo');
            if ($oldLogoPath && Storage::disk('public')->exists($oldLogoPath)) {
                Storage::disk('public')->delete($oldLogoPath);
            }

            Setting::set('logo', $path);
        }

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
