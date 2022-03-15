@extends('layouts.app')

@section('content')

    @php
        use App\Components\ImportDataClient;
        $import = new ImportDataClient();
        $response = $import->client->request('GET', '');
        $data = json_decode($response->getBody()->getContents());

        $kitchen = array("Spoons"=>"Spoons", "Knifes"=>"Knifes", "Plates"=>"Plates", "Plates2"=>"Spoons");

        foreach ($data as $item) {
echo '<pre>';
print_r($item);
echo '</pre>';}

/*foreach($data as $brand => $item)
{
foreach($item  as  $inner_key => $value)
{
echo "[$brand][$inner_key] = $value";
}
}*/
// dd($item);

    @endphp

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
                    <select class="form-control" name="facultys" onchange="loadGroups(this)" style="max-width: 434px;">
                        <option>Выберите факультет</option>

                                                <? foreach ($kitchen as $item) {
                                                    echo '<option >'.$item.'</option>';
                                                } ?>

                    </select>
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





    <p>
        Выберете группу
        <select name="formGender">
            <option value="">Select...</option>
            <option value="M">Male</option>

            <option value="F">Female</option>
        </select>
    </p>


@endsection

