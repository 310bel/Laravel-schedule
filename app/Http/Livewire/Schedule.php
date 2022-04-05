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
    public $date = [];
    public $timestart = [];
    public $timeend = [];
    public $data;
    public $testhuk = 'ffffff';
    public $full_schedule = [];
    public $groupsearch;

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

    public function updatedGroupscheck()
    {
        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'readStudent.php?os=android&dep=11200&form=2&group=12001803&date=04.04.2022&period=5');
        $data = json_decode($response->getBody());

        // readStudent.php?os=android&dep='.$this->departcheck.'&form='.$this->formcheck.'&group='.$this->groupscheck.'&date=29.03.2022

        $this->testhuk = 'функция сработала';

//        foreach ($data as $key => $item) {
//            for ($i = 0; $i < count($item); $i++) {
//                $this->teacher2[$i] = $item[$i]->teacher;
//                $this->date[$i] = $item[$i]->date;
//            }
//        }
        $this->full_schedule = []; // очистка массива перед выводом новой инфы
        for ($i = 0; $i < count($data->schedule); $i++) {
            $this->full_schedule[] = (array)$data->schedule[$i];
        }
    }

    public function updated()
    {

        $import = new ImportDataClient();
        $response_groups = $import->client->request('GET', 'readStudent.php?os=android&dep='.$this->departcheck.'&form='.$this->formcheck);
        $data2 = json_decode($response_groups->getBody());
        $response_form = $import->client->request('GET', 'readStudent.php?os=android&dep='.$this->departcheck);
        $data3 = json_decode($response_form->getBody());


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

    public function groupsearchclick()
    {
        $this->testhuk = $this->groupsearch;
        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'readStudent.php?os=android&dep=11200&form=2&group=' . $this->groupsearch . '&date=04.04.2022&period=5');
        $data = json_decode($response->getBody());

        $this->full_schedule = []; // очистка массива перед выводом новой инфы
        for ($i = 0; $i < count($data->schedule); $i++) {
            $this->full_schedule[] = (array)$data->schedule[$i];
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
