<?php

namespace App\Http\Livewire;

use App\Components\ImportDataClient;
use Livewire\Component;

class Schedule extends Component
{
    public $departcheck = [];
    public $departmentname = [];
    public $groupscheck = [];
    public $group = [];
    public $test ;

    public function mount()
    {
        $import = new ImportDataClient();
        $response = $import->client->request('GET', '');
        $data = json_decode($response->getBody());

        foreach ($data as $key => $item) {
            for ($i = 0; $i < count($item); $i++) {
                $this->departmentname[$item[$i]->id] = $item[$i]->departmentname;
            }
        }
    }

/*    public function groupscheck($groupscheck){

        $groupscheck = 'rgrgrgrgrgrgrgrgrgrgrgrgrg';
        }*/


/*    public function groupscheck($groupscheck){
        $this->test = $groupscheck;
//session(['UserName'=>$this->groupscheck]);
    }*/

    public function hydrate($departcheck)
    {

       // $test = $this->groupscheck;
        //print_r($groupscheck);
        $test = '11200';
       // $groupscheck = 'rgrgrgrgrgrgrgrgrgrgrgrgrg';
        $import = new ImportDataClient();
        $response_groups = $import->client->request('GET', 'readStudent.php?os=android&dep='.$departcheck.'&form=2');
        $data2 = json_decode($response_groups->getBody());

        foreach ($data2 as $key => $item) {
            for ($i = 0; $i < count($item); $i++) {
                $this->group[$item[$i]->group] = $item[$i]->group;
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

*/
