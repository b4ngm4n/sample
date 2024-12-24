<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission): Response
    {
        // Cek apakah user memiliki izin untuk mengakses halaman ini
        if (Gate::denies('permission', $permission)) {
            // Jika user mengakses halaman ini melalui ajax/json
            if ($request->wantsJson()) {
                // Kembalikan response json dengan kode 403 dan pesan kesalahan
                return response()->json([
                    'message' => 'Unauthorized. Kamu tidak dapat izin untuk halaman ini', // pesan kesalahan
                    'required_permission' => $permission, // izin yang dibutuhkan
                ], 403); // kode status 403
            }

            // Jika user mengakses halaman ini secara langsung, maka kembalikan kode 403 dan pesan kesalahan
            abort(403, 'Unauthorized. Kamu tidak dapat izin untuk halaman ini'); // pesan kesalahan
        }

        return $next($request);
    }
}
