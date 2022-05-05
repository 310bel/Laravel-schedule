<?php

namespace App\Http\Livewire;

use App\Components\ImportDataClient;
use Livewire\Component;

class Room extends Component
{
    public $komplexcheck ;
    public $departmentname = [];
    public $corpus = [];
    public $komplex = [];
    public $subdepcheck;
    public $teachidcheck;
    public $teachid = [];
    public $check;
    public $room;
    public $testhuk = '';
    public $groupsearch;
    public $full_teachid = [];
    public $full_teachidcheck = [];

    public function boot()
    {
        $import = new ImportDataClient();
        $response_departmentname = $import->client->request('GET', 'readRoom.php?date=05.05.2022');
        $data = json_decode($response_departmentname->getBody(),true);

        $this->data = array_values($data);
        foreach ($this->data as $key => $item) {
            $this->komplex[$item['id']] = $item['name'];
        }
    }

    public function updatedRoomcheck()
    {
        $this->check = ''; // очистка cообщения Нет занятий
        $this->full_teachidcheck = []; // очистка массива перед выводом новой инфы
        $this->full_teachid = []; // очистка массива перед выводом новой инфы
        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'readRoom.php?area=' . $this->komplexcheck);
        $this->full_teachid = json_decode($response->getBody(), true);

        $this->full_teachid = array_values($this->full_teachid);

        if ($this->full_teachid['0'] === 'Нет занятий') {
            $this->check = $this->full_teachid['0'];
        } else {
            $this->full_teachidcheck = $this->full_teachid;
        }

        $this->testhuk = 'функция сработала';
    }

    public function updated()
    {
        $this->teachid = []; // очистка массива перед выводом новой инфы
        $import = new ImportDataClient();
        $response_subdep = $import->client->request('GET', 'readRoom.php?area=' . $this->komplexcheck);
        $data2 = json_decode($response_subdep->getBody(),true);
        $response_teacher = $import->client->request('GET', 'readRoom.php?area=' . $this->komplexcheck.'&build='. $this->corpuscheck.'&date=04.05.2022');
        $data3 = json_decode($response_teacher->getBody(),true);

//var_dump($_POST);
        $this->data2 = array_values($data2);
        foreach ($this->data2 as $key => $item) {
            $this->corpus[$item['id']] = $item['name'];
        }

        $this->data3 = array_values($data3);
        foreach ($this->data3 as $key => $item) {
            $this->room[$item['id']] = $item['name'];
        }
    }

    public function render()
    {
        return view('livewire.room');
    }
}
