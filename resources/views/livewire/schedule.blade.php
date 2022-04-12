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
            <div class="col-2">
                <input wire:model="groupsearch" class="form-control form-control-sm" type="text"
                       placeholder="Введите № группы" aria-label=".form-control-sm example "
                       style="margin-bottom: 5px;width: 200px">
            </div>
            <div class="col">
                <button wire:click="groupsearchclick" class="btn btn-outline-secondary btn-sm">Поиск</button>
            </div>
        </div>
    </div>

    <pre>
        {{ $check }}
        {{$testhuk}}
Группа>{{$groupscheck}}< Тип переменной {{gettype($groupscheck)}}
Форма обуч>{{$formcheck}}<
Факультет>{{$departcheck}}< Тип переменной {{gettype($departcheck)}}
</pre>
    <table class="table table-bordered table-striped">
        @for($i = 0; $i < count($full_schedulecheck); $i++)
            <tr>
                <td>{{ $full_schedulecheck[$i]['date'] }} {{ $full_schedulecheck[$i]['weekday'] }}
                    @if ($full_schedulecheck[$i]['online'] === '1')занятия онлайн
                    @elseif ($full_schedulecheck[$i]['online'] === '0')
                        ауд.{{ $full_schedulecheck[$i]['room'] }} {{ $full_schedulecheck[$i]['area'] }}@endif
                <td>{{ $full_schedulecheck[$i]['pairnumber'] }} пара
                <td>{{ $full_schedulecheck[$i]['timestart'] }}-{{ $full_schedulecheck[$i]['timeend'] }}
                <td>{{ $full_schedulecheck[$i]['edworkkind'] }}
                <td>@if ($full_schedulecheck[$i]['subgroup'] === '1'){{ $full_schedulecheck[$i]['subgroup'] }}
                    подгруппа @endif @if ( $full_schedulecheck[$i]['subgroup'] === '2'){{ $full_schedulecheck[$i]['subgroup'] }}
                    подгруппа @endif{{ $full_schedulecheck[$i]['dis'] }}
                <td>{{ $full_schedulecheck[$i]['pos'] }}
                <td>{{ $full_schedulecheck[$i]['teacher'] }}
        @endfor
        <tr>
    </table>
</div>
<?php
    //echo ($this->full_schedulecheck[0]['weekday']);
      // print_r($full_schedulecheck);
        ?>

{{--        @foreach($full_schedulecheck as  $sfull)--}}
{{--            @foreach($sfull as  $full)--}}
{{--                <tr>--}}
{{--                <td>преподаватель {{$full['teacher']}}</td>--}}
{{--                <td>дата {{$full['timestart']}}</td>--}}
{{--                </tr>--}}
{{--        @endforeach--}}
{{--        @endforeach--}}
