<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Components\ImportDataClient;
class Schedule extends Component
{
    public $name = 'Vlad';
    public $ok = false;
    public $greeting = 'Goodbye';



    public function render()
    {
        return view('livewire.schedule');
    }
}
$import = new ImportDataClient();
$response = $import->client->request('GET', '');
$data = json_decode($response->getBody());

foreach ($data as $key=> $item){

    echo '<pre>';
    for ($i = 0; $i < count($item); $i++) {
        $departmentname[$i] = $item[$i]->departmentname;
    }}
