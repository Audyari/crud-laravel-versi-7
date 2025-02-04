<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{

    public static function getDataFromAPI()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/users');
        $data = json_decode($response->getBody()->getContents(), true);

        return $data;
    }



    public static $data = [
        ['nama' => 'Asep',
        'alamat' => 'Jl. ABC No. 123',
        'hobi' => [
            'berenang',
            'membaca'
        ]],
        ['nama' => 'Budi',
        'alamat' => 'Jl. XYZ No. 456',
        'hobi' => [
            'main game',
            'makan'
        ]],
        ['nama' => 'Cici',
        'alamat' => 'Jl. PQR No. 789',
        'hobi' => [
            'nonton',
            'main game'
        ]]
    ];
   
    protected static function test() {
        return 'ini data dari model';
    }

     
    protected static function getData()
    {
        return [
            [
                'nama' => 'Asep',
                'alamat' => 'Jl. ABC No. 123',
                'hobi' => [
                    'berenang',
                    'membaca'
                ]
            ],
            [
                'nama' => 'Budi',
                'alamat' => 'Jl. XYZ No. 456',
                'hobi' => [
                    'main game',
                    'makan'
                ]
            ],
            [
                'nama' => 'Cici',
                'alamat' => 'Jl. PQR No. 789',
                'hobi' => [
                    'nonton',
                    'main game'
                ]
            ]
        ];
    }

    protected static function getData2() {
        $cole = collect(self::getData());
        $cole = $cole->reject(function($item) {
            return !in_array('makan', $item['hobi']);
        });
        return $cole;
    }

    protected static function getData3() {
       $data = collect(self::getDataFromAPI());
       $data->push('Asep');
       return $data;
    }

    
   
   
}
