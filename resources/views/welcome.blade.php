@extends('layouts.app')

@section('content')

    @php
//        use App\Components\ImportDataClient;
//        $import = new ImportDataClient();
//$response = $import->client->request('GET', 'readStudent.php?os=android&dep=11200&form=2&group=12002101&date=12.04.2022&period=180');
//$data = json_decode($response->getBody());

//        for ($i = 0; $i < count($data->schedule); $i++) {
//            $this->full_schedule[] = (array)$data->schedule[$i];
//        }

//    $response2 = $import->client->request('GET', 'readStudent.php?os=android&group=12001890&date=12.04.2022&period=5');
//$data2 = json_decode($response2->getBody(),true);

//$data2 = array_values( $data2);

     //   for ($i = 0; $i < count($data2->schedule); $i++) {
    //        $this->full_schedule2[] = (array)$data2->schedule[$i];
    //    }



//echo '<pre>';

//echo $date = date('d.m.Y', time());

//print_r($data);
//print_r($data2);
//print_r($this->full_schedule);
//print_r($this->full_schedule2);
//echo '</pre>';
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
                    <li class="nav-item active">
                        <a class="nav-link active" href="/" data-toggle="tab">Расписание занятий студентов</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Teacher" data-toggle="tab">Расписание преподавателей</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="room" data-toggle="tab">Расписание занятий в аудиториях</a>
                    </li>
                </ul>
           </nav>
            @livewire('schedule')
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


