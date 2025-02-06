<?php

namespace App\Http\Middleware;

use Closure;

class CekIP
{
      // Daftar IP yang diizinkan
      protected $allowedIPs = [
        '192.168.1.100',  // Ganti dengan IP yang diizinkan
        '111.222.333.444', // Ganti dengan IP yang diizinkan
        '127.0.0.1', // Ganti dengan IP yang diizinkan
       
    ];

    public function handle($request, Closure $next)
    {
        // Mengambil alamat IP dari permintaan
        if (!in_array($request->ip(), $this->allowedIPs)) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return $next($request);
    }
}