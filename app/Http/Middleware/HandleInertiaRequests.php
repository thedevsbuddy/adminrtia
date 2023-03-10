<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use Inertia\Middleware;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'layouts.app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {

        $roles = Cache::remember(
            key: 'roles',
            ttl: config('adminr.cache_remember_time'),
            callback: fn () => Role::with('permissions')->get()
        );
        $permissions = Cache::remember(
            key: 'permissions',
            ttl: config('adminr.cache_remember_time'),
            callback: fn () => Permission::with('roles')->get()
        );

        return array_merge(parent::share($request), [
            'currentRoute' => Route::currentRouteName(),
            'auth.id' => auth()->id(),
            'auth.user' => auth()->user(),
            'splash.success' => session()->get('success'),
            'splash.error' => session()->get('error'),
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }
}
