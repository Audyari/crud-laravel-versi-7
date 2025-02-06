<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class TestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Memeriksa apakah parameter 'membership' ada dalam permintaan
        if (! $request->has('membership') || $request->input('membership') !== 'true') {

            // Jika tidak ada, redirect ke halaman '/gagal' dengan pesan
            return redirect('/gagal');
        }

        // echo $request->url();
        // echo '<br>';
        // echo "<pre>";
        // echo "hasil : ";
        // echo var_dump($request->all());
        // echo "</pre>";
        // Jika ada, lanjutkan ke permintaan berikutnya

        $response = $next($request);
        
        // echo "<pre>";
        // echo "hasil : ";
        // echo var_dump($response);
        // echo "</pre>";
       
        return $response;
    }
}