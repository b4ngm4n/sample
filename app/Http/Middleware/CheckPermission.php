<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user = User::where('uuid', auth()->user()->uuid)->first();

        if (!$user || !$user->hasPermission($permission)) {
            // Cek apakah request dari json
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Unauthorized. Kamu tidak dapat izin untuk halaman ini', 
                    'required_permission' => $permission
                ], 403);
            }

            abort(403, 'Unauthorized. Kamu tidak dapat izin untuk halaman ini');
        }

        return $next($request);
    }
}
