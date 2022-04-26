<div>
    <div class="container">
        <div class="row">

            <div class="col-md-auto">
                <select wire:model="departcheck" class="form-select form-select-sm min-width"
                        aria-label=".form-select-sm example" style="margin-bottom: 5px;width: auto">
                    <option>Выберите факультет</option>

                    @foreach ($departmentname as $key=> $item)
                        <option value={{$key}}>{{$item}}</option>
                    @endforeach

                </select>
            </div>

            <div class="col-md-auto">
                <select wire:model="formcheck" class="form-select form-select-sm min-width"
                        aria-label=".form-select-sm example" style="margin-bottom: 5px;width: auto;">

                    <option>Форма обучения</option>

                    @foreach ($form as $key=> $item)
                        <option value={{$key}}>{{$item}}</option>
                    @endforeach

                </select>
            </div>

            <div class="col-md-auto">
                <select wire:model="groupscheck" class="form-select form-select-sm" aria-label=".form-select-sm example"
                        style="margin-bottom: 5px;width: auto;">

                    <option>Выберите группу</option>

                    @foreach ($group as $key=> $item)
                        <option value={{$key}}>{{$item}}</option>
                    @endforeach

                </select>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <input wire:model="groupsearch" class="form-control form-control-sm" type="text"
                       placeholder="Введите № группы" aria-label=".form-control-sm example "
                       style="margin-bottom: 5px">
            </div>
            <div class="col">
                <button wire:click="groupsearchclick" class="btn btn-outline-secondary btn-sm">Поиск</button>
            </div>
        </div>
    </div>
    <pre>
     <center><h3>{{ $check }}</h3></center>
</pre>
    <table class="table table-bordered table-striped">
        @for($i = 0; $i < count($full_schedule); $i++)
            <tr>
                <td>{{ $full_schedule[$i]['date'] }} {{ $full_schedule[$i]['weekday']}}
                    @if($full_schedule[$i]['online'] === '1'), занятия онлайн
                    @elseif ($full_schedule[$i]['online'] === '0')
                        ауд.{{ $full_schedule[$i]['room'] }} {{ $full_schedule[$i]['area'] }}@endif
                <td>{{ $full_schedule[$i]['pairnumber'] }} пара
                <td>{{ $full_schedule[$i]['timestart'] }}-{{ $full_schedule[$i]['timeend'] }}
                <td>{{ $full_schedule[$i]['edworkkind'] }}
                @if ($full_schedule[$i]['subgroup'] === 'null') @elseif ($full_schedule[$i]['subgroup'])({{$full_schedule[$i]['subgroup']}})@endif
                {{ $full_schedule[$i]['dis'] }}
                <td>@if ($full_schedule[$i]['pos'] === 'null') @elseif ($full_schedule[$i]['pos']){{$full_schedule[$i]['pos']}}@endif {{ $full_schedule[$i]['teacher'] }}
        @endfor
        <tr>
    </table>
</div>
<?php
    //echo ($this->full_schedule[0]['weekday']);
      // print_r($full_schedule);
        ?>

{{--        @foreach($full_schedule as  $sfull)--}}
{{--            @foreach($sfull as  $full)--}}
{{--                <tr>--}}
{{--                <td>преподаватель {{$full['teacher']}}</td>--}}
{{--                <td>дата {{$full['timestart']}}</td>--}}
{{--                </tr>--}}
{{--        @endforeach--}}
{{--        @endforeach--}}

{{--        {{$testhuk}}--}}
{{--Группа>{{$groupscheck}}< Тип переменной {{gettype($groupscheck)}}--}}
{{--Форма обуч>{{$formcheck}}<--}}
{{--Факультет>{{$departcheck}}< Тип переменной {{gettype($departcheck)}}--}}
