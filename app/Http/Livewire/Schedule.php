<?php

namespace App\Http\Livewire;

use App\Components\ImportDataClient;
use Livewire\Component;

class Schedule extends Component
{
    public $departcheck ;
    public $departmentname = [];
    public $groupscheck;
    public $formcheck;
    public $group = [];
    public $form = [];
    public $test;
    public $data = 'ffffff';

    public function boot()
    {
        $import = new ImportDataClient();
        $response_departmentname = $import->client->request('GET', '');
        $data0 = json_decode($response_departmentname->getBody());

        foreach ($data0 as $key => $item) {
            for ($i = 0; $i < count($item); $i++) {
                $this->departmentname[$item[$i]->id] = $item[$i]->departmentname;
            }
        }
    }

    public function updated()
    {

        $import = new ImportDataClient();
        $response_groups = $import->client->request('GET', 'readStudent.php?os=android&dep='.$this->departcheck.'&form='.$this->formcheck);
        $data2 = json_decode($response_groups->getBody());
        $response_form = $import->client->request('GET', 'readStudent.php?os=android&dep='.$this->departcheck);
        $data3 = json_decode($response_form->getBody());
        $response = $import->client->request('GET', 'readStudent.php?os=android&dep='.$this->departcheck.'&form='.$this->formcheck.'&group=');
        $data = json_decode($response->getBody());



//var_dump($_POST);
        foreach ($data2 as $key => $item) {
            for ($i = 0; $i < count($item); $i++) {
                $this->group[$item[$i]->group] = $item[$i]->group;
            }
        }

        foreach ($data3 as $key => $item) {
            for ($i = 0; $i < count($item); $i++) {
                $this->form[$item[$i]->id] = $item[$i]->formname;
            }
        }
    }

    public function render()
    {
        return view('livewire.schedule');
    }
}

/*$import = new ImportDataClient();
$response = $import->client->request('GET', '');
$data = json_decode($response->getBody());

foreach ($data as $key=> $item){

    echo '<pre>';
    for ($i = 0; $i < count($item); $i++) {
        $departmentname[$i] = $item[$i]->departmentname;
    }}
var_dump($this->departmentname);
changeSetting
hydrate
        // $test = $this->groupscheck;
        //print_r($groupscheck);
        //$test = '11200';
        //  $this->test2 = serialize($departcheck);
        // $this->departcheck = serialize($departcheck);
        //echo (string)$departcheck;

*/
