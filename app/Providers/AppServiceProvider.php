<?php

namespace App\Providers;

use App\Auth\PelajarUserProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Auth::provider('pelajar-eloquent', function ($app, array $config) {
            return new PelajarUserProvider($app['hash'], $config['model']);
        });

        View::composer('*', function ($view) {
            $authUser = Auth::guard('pelajar')->check()
                ? Auth::guard('pelajar')->user()
                : Auth::guard('web')->user();

            $namaUser  = $authUser?->nama ?? $authUser?->name ?? 'Pengguna';
            $firstName = explode(' ', trim($namaUser))[0];
            $namaParts = explode(' ', trim($namaUser));
            $inisial   = strtoupper(
                substr($namaParts[0], 0, 1) .
                    (isset($namaParts[1]) ? substr($namaParts[1], 0, 1) : substr($namaParts[0], 1, 1))
            );

            $unreadCount = 0;
            $unreadPengumuman = collect();
            if (Auth::guard('pelajar')->check()) {
                $pelajarId = Auth::guard('pelajar')->id();
                $unreadPengumuman = \App\Models\DataPengumuman::aktif()
                    ->whereDoesntHave('pelajars', function ($q) use ($pelajarId) {
                        $q->where('pelajar_id', $pelajarId);
                    })
                    ->orderBy('jadwal_tayang', 'desc')
                    ->limit(5)
                    ->get();
                $unreadCount = $unreadPengumuman->count();
            }

            $view->with([
                'authUser'  => $authUser,
                'namaUser'  => $namaUser,
                'firstName' => $firstName,
                'inisial'   => $inisial,
                'roleUser'  => Auth::guard('pelajar')->check() ? 'Pelajar' : 'Administrator',
                'unreadCount'  => $unreadCount,
                'unreadPengumuman'  => $unreadPengumuman,
            ]);
        });
    }
}
