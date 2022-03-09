<?php

namespace App\Components;

use GuzzleHttp\Client;

class ImportDataClient
{
public $client;

    /**
     * @param $client
     */
    public function __construct()
    {
        $this->client = new Client([
            // Base URI is used with relative requests https://reqres.in/api/
            'base_uri' => 'https://dekanat.bsu.edu.ru/blocks/bsu_api/bsu_schedule/readStudent.php?os=android&dep=1112',
            // You can set any number of default request options.
            'timeout'  => 2.0,
           // 'verify' => false,
        ]);
    }
}
