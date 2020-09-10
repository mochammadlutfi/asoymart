<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
// use App\Utils\BusinessUtil;

use App\Models\Bisnis;
use App\Models\Outlet;

class CheckIfMitra
{
    /**
     * Checks if session data is set or not for a user. If data is not set then set it.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('web')->check()) {
            if (auth()->user()->hasAnyRole('Mitra')) {
                return redirect()->route('mitra.beranda');
            }
            return $next($request);
        }
        return redirect()->route('login');

        // $user = Auth::guard('web')->user();
        // if ( $user->hasAnyRole(['Mitra']) ) {
            // if (!$request->session()->has('mitra')) {
            //     $mitra_session = ['id' => $user->id,
            //                     'nama' => $user->surname,
            //                     'username' => $user->username,
            //                     'email' => $user->email,
            //                     ];
            //     $bisnis = Bisnis::findOrFail($user->bisnis_id);
            //     $bisnis_session = ['bisnis_id' => $bisnis->id,
            //                     'nama' => $bisnis->nama,
            //                     'outlet_id' => $bisnis->outlet_pusat->id,
            //                     'outlet' => $bisnis->outlet_pusat->nama,
            //                     ];
            //     $request->session()->put('mitra', $mitra_session);
            //     $request->session()->put('bisnis', $bisnis_session);
            // }
            // return redirect()->route('mitra.beranda');
        // }
        // return redirect()->route('login');
    }
}
