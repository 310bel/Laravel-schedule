<?php

namespace App\Http\Livewire;

use App\Components\ImportDataClient;
use Livewire\Component;

class Teacher extends Component
{
    public $departcheck ;
    public $departmentname = [];
    public $subdepcheck;
    public $formcheck;
    public $teachid = [];
    public $subdep = [];
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
        $response = $import->client->request('GET', 'readTeacher.php?dep='.$this->departcheck);
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
        $response_teacher = $import->client->request('GET', 'readTeacher.php?dep='.$this->departcheck.'&subdep='.$this->subdepcheck);
        $data2 = json_decode($response_teacher->getBody());
        $response_subdep = $import->client->request('GET', 'readTeacher.php?dep=11200');
        $data3 = json_decode($response_subdep->getBody());


//var_dump($_POST);
//        foreach ($data3 as $key => $item) {
//            for ($i = 0; $i < count($item); $i++) {
//                $this->subdep[$item[$i]->id] = $item[$i]->name;
//            }
//        }

        foreach ($data2 as $key => $item) {
            for ($i = 0; $i < count($item); $i++) {
                $this->teachid[$item[$i]->id] = $item[$i]->teachid;
            }
        }
    }

    public function render()
    {
        return view('livewire.teacher');
    }
}
