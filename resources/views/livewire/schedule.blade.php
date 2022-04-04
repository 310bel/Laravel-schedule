<div>

    <select wire:model="departcheck">

        <option>Выберите факультет</option>

        @foreach ($departmentname as $key=> $item)
            <option value={{$key}}>{{$item}}</option>
        @endforeach

    </select>

    <select wire:model="formcheck">

        <option>Форма обучения</option>

        @foreach ($form as $key=> $item)
            <option value={{$key}}>{{$item}}</option>
        @endforeach

    </select>

    <select wire:model="groupscheck">

        <option>Выберите группу</option>

        @foreach ($group as $key=> $item)
            <option value={{$key}}>{{$item}}</option>
        @endforeach

    </select>
    <input wire:model="groupsearch" type="text">
    <button wire:click="groupsearchclick">Поиск</button>
    <pre>
        {{$groupsearch}}
        {{$testhuk}}
Группа>{{$groupscheck}}< Тип переменной {{gettype($groupscheck)}}
Форма обуч>{{$formcheck}}<
Факультет>{{$departcheck}}< Тип переменной {{gettype($departcheck)}}
</pre>
<table>
        @for($i = 0; $i < count($full_schedule); $i++)
            <tr>

            <td>{{ $full_schedule[$i]['date'] }} {{ $full_schedule[$i]['weekday'] }}
                @if ($full_schedule[$i]['online'] === '1')занятия онлайн
                @elseif ($full_schedule[$i]['online'] === '0')ауд.{{ $full_schedule[$i]['room'] }} {{ $full_schedule[$i]['area'] }}@endif<td>
            <td>{{ $full_schedule[$i]['pairnumber'] }} пара<td>
            <td>{{ $full_schedule[$i]['timestart'] }}-{{ $full_schedule[$i]['timeend'] }}<td>
            <td>{{ $full_schedule[$i]['edworkkind'] }}<td>
            <td>@if ($full_schedule[$i]['subgroup'] === '1'){{ $full_schedule[$i]['subgroup'] }}подгруппа @endif @if ( $full_schedule[$i]['subgroup'] === '2'){{ $full_schedule[$i]['subgroup'] }}подгруппа @endif{{ $full_schedule[$i]['dis'] }}<td>
            <td>{{ $full_schedule[$i]['pos'] }}<td>
            <td>{{ $full_schedule[$i]['teacher'] }}<td>
            <tr>
        @endfor
        </table>
<?php
    //echo ($this->full_schedule[0]['weekday']);
      // print_r($full_schedule);
        ?>
</div>
{{--        @foreach($full_schedule as  $sfull)--}}
{{--            @foreach($sfull as  $full)--}}
{{--                <tr>--}}
{{--                <td>преподаватель {{$full['teacher']}}</td>--}}
{{--                <td>дата {{$full['timestart']}}</td>--}}
{{--                </tr>--}}
{{--        @endforeach--}}
{{--        @endforeach--}}
