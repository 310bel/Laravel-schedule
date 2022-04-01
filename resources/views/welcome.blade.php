@extends('layouts.app')

@section('content')

    @php
        use App\Components\ImportDataClient;
        $import = new ImportDataClient();
$response = $import->client->request('GET', 'readStudent.php?os=android&dep=11200&form=2&group=12001801&date=29.03.2022&period=5');
$data = json_decode($response->getBody());

        for ($i = 0; $i < count($data->schedule); $i++) {
            $this->full_schedule[] = (array)$data->schedule[$i];
        }

      //  echo ($this->full_schedule[0]['weekday']);

echo '<pre>';

print_r($data);
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


    {{--
        <title>Событие onchange</title>
        <p>Набирите произвольный текст и уберите фокус с элемента:</p>
        <input type = "text" name = "testInput" id = "testInput" onchange = "testFunction()">
        <p id = "info2" ></p>
        <script>
            function testFunction() {
                var x = document.getElementById("testInput").value;
                document.getElementById("info2").innerHTML = "Вы набрали следующий текст: " + x;
            }
        </script>
    --}}

    <!-- breadcrumb -->

    <div class="container" style="margin-top: 25px;">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="http://dekanat.bsu.edu.ru/">В начало</a></li>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Расписание занятий</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- -->

    <div class="container">
        <div class="row justify-content-center">
            <nav role='navigation' class="transformer-tabs">
                <ul class="nav nav-tabs" id="myTab" style="margin-bottom: 20px;">
                    <li class="nav-item active">
                        <a class="nav-link active" href="#home" data-toggle="tab">Расписание занятий студентов</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#profile" data-toggle="tab">Расписание преподавателей</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#messages" data-toggle="tab">Расписание занятий в аудиториях</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div id='content' class="tab-content">
        <!----------------------------------------------------------------------------------------------------------------->
        <!-- РАСПИСАНИЕ СТУДЕНТОВ   --------------------------------------------------------------------------------------->
        <!----------------------------------------------------------------------------------------------------------------->


        <div class="tab-pane fade show in active" id="home">
            <!--        <center><font size="5" color="green"> Уважаемые студенты! Расписание находится в стадии формирования.</font></center><br>
            -->        <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        @livewire('schedule')





                        {{--
                                                <select class="form-control" name="facultys" onchange="document.location=this.options[this.selectedIndex].value" style="max-width: 434px;">
                                                    <option>Выберите факультет</option>

                                                    <? foreach ($departmentname as $key=> $item) {
                                                        echo '<option value=' . $key . '>'.$item.'</option>';
                                                        //    echo '<option value=' . $key . '>'. $key ." ". $item.'</option>';
                                                        //    $aa = $_POST["facultys"];
                                                    }
                                                    //print_r($_POST);
                                                    ?>


                                                </select>
                        --}}
                    </div>
                </div>
            </div>


            <div class="container" >
                <div class="row justify-content-center">
                    <div class="col-md-5" style="margin-top: 25px;">
                        <select class="form-control"  id="groupList" name="groups[]" onchange="loadSchedule(this)" style="max-width: 434px;">
                            <option value="0">Для отображения списка групп выберите факультет</option>
                        </select>
                    </div>

                    <div class="offset-md-2" style="margin-top: 25px;"></div>

                    <div class="col-md-2" style="margin-top: 25px;">
                        <input type="tel" autocorrect="off" pattern="\d [0-9]" class="form-control grpsrch" id="groupsearch" type="text" placeholder="Введите группу" style="height: 30px;">
                    </div>

                    <div class="col-md-3" style="margin-top: 25px;">
                        <button class="btn btn-outline-info" id="btnsearch" type="button">Поиск</button>
                        <!--                            01001803-->
                        {{--
                                            <script>
                                                function someFunc2() {
                                                    var newtime = <?echo $newTime?>;
                                                    if (document.getElementById("groupsearch").value == '')
                                                        return false;
                                                    else loadSchedule2(document.getElementById("groupsearch").value, newtime);
                                                }
                                                document.getElementById("btnsearch").onclick = someFunc2;
                                            </script>
                        --}}
                    </div>
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
                        <!--
                        <div class="d-none d-md-block">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li id="week" data-val="prevWeek" class="page-item"><a class="page-link" href="#"><i
                                                    class="fas fa-arrow-circle-left"></i> Предыдущая неделя</a></li>
                                    <li id="week" data-val="thisWeek" class="page-item"><a class="page-link" href="#">Текущая
                                            неделя</a></li>
                                    <li id="week" data-val="nextWeek" class="page-item"><a class="page-link" href="#">Следующая
                                            неделя <i class="fas fa-arrow-circle-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>-->

                    </div>
                </div>
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

        <footer class="row">
            <div class="container" style="margin-top: 20px;">
            <span class="transformer-tabs">
                <a href="http://www.bsu.edu.ru/bsu/structure/detail.php?ID=2263">Ресурс департамента образовательной политики</a>
                <br>Разработка и техническая поддержка: E-mail:
                <a href="mailto:DekanatAdm@bsu.edu.ru?subject=ИнфоБелГУ 2013">DekanatAdm@bsu.edu.ru</a>
            </span>
            </div>
        </footer>


        </html>


@endsection


