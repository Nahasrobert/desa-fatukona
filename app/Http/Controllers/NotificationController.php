<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeluar;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markAsRead($id)
    {
        $notif = SuratKeluar::where('id_surat', $id)
            ->where('created_by', Auth::id())
            ->firstOrFail();

        $notif->is_read = true;
        $notif->save();

        return response()->json(['success' => true]);
    }
}
