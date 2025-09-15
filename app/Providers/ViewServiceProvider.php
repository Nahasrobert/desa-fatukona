<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SuratKeluar;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Pastikan user sudah login sebelum ambil notif
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $userId = Auth::id();

                $notifCount = SuratKeluar::where('created_by', $userId)
                    ->where('is_read', false)
                    ->count();

                $notifications = SuratKeluar::where('created_by', $userId)
                    ->where('is_read', false)
                    ->orderBy('created_at', 'desc')
                    ->limit(5)
                    ->get();

                $view->with('notifCount', $notifCount)
                    ->with('notifications', $notifications);
            }
        });
    }
}
