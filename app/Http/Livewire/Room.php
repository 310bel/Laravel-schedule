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
    public $corpuscheck;
    public $roomcheck;
    public $teachid = [];
    public $check;
    public $room= [];
    public $testhuk = '';
    public $groupsearch;
    public $full_teachid = [];
    public $full_teachidcheck = [];

    public function boot()
    {
        $this->date_today = date('d.m.Y', time());
        $import = new ImportDataClient();
        $response_departmentname = $import->client->request('GET', 'readRoom.php?date='.$this->date_today);
        $data = json_decode($response_departmentname->getBody(),true);

        $this->data = array_values($data);
        foreach ($this->data as $key => $item) {
            $this->komplex[$item['id']] = $item['name'];
        }
    }

    public function updatedRoomcheck()
    {
        $this->date_today = date('d.m.Y', time());
        $this->check = ''; // очистка cообщения Нет занятий
        $this->full_teachidcheck = []; // очистка массива перед выводом новой инфы
        $this->full_teachid = []; // очистка массива перед выводом новой инфы
        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'readRoom.php?area=' . $this->komplexcheck.'&build='. $this->corpuscheck.'&room='. $this->roomcheck.'&date='.$this->date_today);
        $this->full_teachid = json_decode($response->getBody(), true);

        $this->full_teachid = array_values($this->full_teachid); // заново индексирует возвращаемый массив числовыми индексами

        if ($this->full_teachid['0'] === 'Нет занятий') {
            $this->check = $this->full_teachid['0']; // то check = Нет занятий
        } else {
            $this->full_teachidcheck = $this->full_teachid;
        }
    }

    public function updated()
    {
        $this->date_today = date('d.m.Y', time());
        $this->teachid = []; // очистка массива перед выводом новой инфы
        $import = new ImportDataClient();
        $response_komplexcheck = $import->client->request('GET', 'readRoom.php?area=' . $this->komplexcheck);
        $data2 = json_decode($response_komplexcheck->getBody(),true);
        $response_corpuscheck = $import->client->request('GET', 'readRoom.php?area=' . $this->komplexcheck.'&build='. $this->corpuscheck.'&date='.$this->date_today);
        $data3 = json_decode($response_corpuscheck->getBody(),true);

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
