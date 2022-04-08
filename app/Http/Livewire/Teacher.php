<?php

namespace App\Http\Livewire;

use App\Components\ImportDataClient;
use Livewire\Component;

class Teacher extends Component
{
    public $departcheck ;
    public $departmentname = [];
    public $subdepcheck;
    public $teachidcheck;
    public $teachid = [];
    public $subdep = [];
    public $check;
    public $testhuk = '';
    public $groupsearch;
    public $full_teachid = [];
    public $full_teachidcheck = [];
  //  protected $rules = [
  //      'full_teachid' =>'array'
  //  ];

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

    public function updatedTeachidcheck()
    {
        $this->check = ''; // очистка cообщения Нет занятий
        $this->full_teachidcheck = []; // очистка массива перед выводом новой инфы
        $this->full_teachid = []; // очистка массива перед выводом новой инфы
        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'readTeacher.php?dep='.$this->departcheck.'&subdep='.$this->subdepcheck.'&teachid='.$this->teachidcheck.'&date=07.04.2022&period=180');
        $this->full_teachid = json_decode($response->getBody(),true);

       // $validatedData = $this->validate();

        $this->full_teachid = array_values( $this->full_teachid);

        if($this->full_teachid['0'] === 'Нет занятий'){
            $this->check = $this->full_teachid['0'];}else{
            $this->full_teachidcheck = $this->full_teachid  ;}

        // readStudent.php?os=android&dep='.$this->departcheck.'&form='.$this->formcheck.'&group='.$this->groupscheck.'&date=29.03.2022

        $this->testhuk = 'функция сработала';

    }

    public function updated()
    {
        $this->teachid = []; // очистка массива перед выводом новой инфы
        $import = new ImportDataClient();
        $response_subdep = $import->client->request('GET', 'readTeacher.php?dep='.$this->departcheck);
        $data2 = json_decode($response_subdep->getBody(),true);
        $response_teacher = $import->client->request('GET', 'readTeacher.php?dep='.$this->departcheck.'&subdep='.$this->subdepcheck);
        $data3 = json_decode($response_teacher->getBody(),true);

//var_dump($_POST);
        $this->data2 = array_values( $data2);
        foreach ($this->data2 as $key => $item) {
            $this->subdep[$item['id']] = $item['name'];
        }

        $this->data3 = array_values( $data3);
        foreach ($this->data3 as $key => $item) {
            $this->teachid[$item['id']] = $item['fullname'];
        }

//        foreach ($data3 as $key => $item) {
//            for ($i = 0; $i < count($item); $i++) {
//                $this->teachid[$item[$i]->id] = $item[$i]->teachid;
//            }
//        }
    }

    public function render()
    {
        return view('livewire.teacher');
    }
}
