<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\ToolMan;

class SetUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user) {
            session(['role' => $user->role]);
            session(['idUser' => $user->id]);

            // Retrieve and store 'jurusan' in session
            if ($user->role == 'Siswa') {
                $siswa = Siswa::where('id_user', $user->id)->first();
                if ($siswa) {
                    session(['jurusan' => $siswa->jurusan]);
                }
            } elseif ($user->role == 'Toolman') {
                $toolMan = ToolMan::where('id_user', $user->id)->first();
                if ($toolMan) {
                    session(['jurusan' => $toolMan->jurusan]);
                }
            }
        }

        return $next($request);
    }
}
