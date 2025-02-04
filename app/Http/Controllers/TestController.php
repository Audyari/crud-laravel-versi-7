<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;

class TestController extends Controller
{
    public function index()
    {
        $data = [
            'data1' => Test::getDataFromAPI(),
            'data2' => Test::getData(),
            'data3' => Test::getData2(),
            'data4' => Test::getData3(),
        ];

        return view('test', $data);
    }
}
