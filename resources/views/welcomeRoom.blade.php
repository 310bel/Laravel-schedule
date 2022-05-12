@extends('layouts.appschedule')

@section('content')

    @php
        use App\Components\ImportDataClient;
        $import = new ImportDataClient();
//$response = $import->client->request('GET', 'readTeacher.php?dep=11200');
//$data = json_decode($response->getBody(),true);

                $response = $import->client->request('GET', 'readRoom.php?date=05.05.2022');
        $full_room = json_decode($response->getBody(),true);

$full_room = array_values( $full_room);

   //     if(isset($this->full_teachid['0'])){
    //        $check = $this->full_teachid['0'];}else{
     //       $this->full_teachid = $full_teachid  ;
   //     }

      //  for ($i = 0; $i < count($data->schedule); $i++) {
      //      $this->full_schedule[] = (array)$data->schedule[$i];
      //  }

      //  echo ($this->full_schedule[0]['weekday']);

echo '<pre>';

//print_r($full_room);
echo '</pre>';
//print_r($data2);

//foreach ($data as $key=> $item){

//echo '<pre>';
//for ($i = 0; $i < count($item); $i++) {
//$departmentname[$i] = $item[$i]->departmentname;
//}}
//print_r($item); // вывод
//foreach ($data2 as $key=> $item){

//for ($i = 0; $i < count($item); $i++) {
//$group[$i] = $item[$i]->group;
//}
//print_r($item[0]->departmentname); // вывод свойства у обьекта $item[0] (параметр true у json_decode нету)
//print_r($item); // вывод
/*echo '<pre>';
print_r($data3);
echo '<pre>';
print_r($data2);
echo '<pre>';
print_r($data);
*///print_r($group);

//print_r($item2['groups']); // вывод элемента из ассоциативного массива вложенного в другой(нужно будет добавить вложеный цикл         foreach ($item as $item2) {}
//echo '</pre>';
//print_r($item[0]->teacher); // вывод свойства у обьекта $item[0] (параметр true у json_decode нету)



// dd($item);

    @endphp


    <div class="container">
        <div class="card-header">
            <nav role='navigation' class="transformer-tabs">
                <ul class="nav nav-tabs" id="myTab" style="margin-bottom: 20px;">
                    <li class="nav-item ">
                        <a class="nav-link " href="Student" data-toggle="tab">Расписание занятий студентов</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="Teacher" data-toggle="tab">Расписание преподавателей</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active" href="room" data-toggle="tab">Расписание занятий в аудиториях</a>
                    </li>
                </ul>
           </nav>
            @livewire('room')
        </div>
    </div>


            <div class="container" style="margin-top: 25px;">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="d-sm-none"> <!-- Для мобильных-->
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li id="week" data-val="prevWeek" class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fas fa-arrow-circle-left"></i>
                                        </a>
                                    </li>
                                    <li id="week" data-val="thisWeek" class="page-item">
                                        <a class="page-link" href="#">Текущая неделя</a>
                                    </li>
                                    <li id="week" data-val="nextWeek" class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="d-none d-sm-inline-block d-md-none">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li id="week" data-val="prevWeek" class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fas fa-arrow-circle-left"></i>Пред. неделя
                                        </a>
                                    </li>
                                    <li id="week" data-val="thisWeek" class="page-item">
                                        <a class="page-link" href="#">Текущая неделя</a>
                                    </li>
                                    <li id="week" data-val="nextWeek" class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fas fa-arrow-circle-right"></i>След. неделя
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="stbl">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @livewireScripts

        </body>

        <footer class="container">
            <span class="transformer-tabs">
                <a href="http://www.bsu.edu.ru/bsu/structure/detail.php?ID=2263">Ресурс департамента образовательной политики</a>
                <br>Разработка и техническая поддержка: E-mail:
                <a href="mailto:DekanatAdm@bsu.edu.ru?subject=ИнфоБелГУ 2013">DekanatAdm@bsu.edu.ru</a>
            </span>
            </div>
        </footer>


        </html>


@endsection


