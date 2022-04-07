<div>
    <div class="container">
                <select wire:model="departcheck" class="form-select form-select-sm min-width"
                        aria-label=".form-select-sm example" style="margin-bottom: 5px;width: auto">
                    <option>Выберите факультет</option>

                    @foreach ($departmentname as $key=> $item)
                        <option value={{$key}}>{{$item}}</option>
                    @endforeach

                </select>

                <select wire:model="subdepcheck" class="form-select form-select-sm min-width"
                        aria-label=".form-select-sm example" style="margin-bottom: 5px;width: auto;">

                    <option>Кафедра</option>

                    @foreach ($subdep as $key=> $item)
                        <option value={{$key}}>{{$item}}</option>
                    @endforeach

                </select>

                <select wire:model="teachidcheck" class="form-select form-select-sm" aria-label=".form-select-sm example"
                        style="margin-bottom: 5px;width: auto;">

                    <option>Преподаватель</option>

                    @foreach ($teachid as $key=> $item)
                        <option value={{$key}}>{{$item}}</option>
                    @endforeach

                </select>
    </div>

{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-2">--}}
{{--                <input wire:model="groupsearch" class="form-control form-control-sm" type="text"--}}
{{--                       placeholder="Введите преподавателя" aria-label=".form-control-sm example "--}}
{{--                       style="margin-bottom: 5px;width: 200px">--}}
{{--            </div>--}}
{{--            <div class="col">--}}
{{--                <button wire:click="groupsearchclick" class="btn btn-outline-secondary btn-sm">Поиск</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <pre>
        {{$testhuk}}
</pre>
    @switch(gettype($full_teachid) === 'string')
        @case(1)
        First case...
        @break

        @default
    <table class="table table-bordered table-striped">
{{--        @if (gettype($full_teachid) === string)--}}
        @for($i = 0; $i < count($full_teachid); $i++)
            <tr>
                <td>{{ $full_teachid[$i]['date'] }} {{ $full_teachid[$i]['weekday'] }}
                    @if ($full_teachid[$i]['online'] === '1')занятия онлайн
                    @elseif ($full_teachid[$i]['online'] === '0')
                        ауд.{{ $full_teachid[$i]['room'] }} {{ $full_teachid[$i]['area'] }}@endif
                <td>{{ $full_teachid[$i]['pairid'] }} пара
                <td>{{ $full_teachid[$i]['timestart'] }}-{{ $full_teachid[$i]['timeend'] }}
                <td>{{ $full_teachid[$i]['edworkkind'] }}
                <td>@if ($full_teachid[$i]['subgroup'] === '1'){{ $full_teachid[$i]['subgroup'] }}
                    подгруппа @endif @if ( $full_teachid[$i]['subgroup'] === '2'){{ $full_teachid[$i]['subgroup'] }}
                    подгруппа @endif{{ $full_teachid[$i]['dis'] }}
                <td>гр. {{ $full_teachid[$i]['groups'] }}
{{--                @elseif Нет занятий--}}
{{--                @endif--}}
        @endfor
        <tr>
    </table>
    @endswitch
</div>
<?php
//echo ($this->full_teachid[0]['weekday']);
// print_r($full_teachid);
?>

{{--        @foreach($full_teachid as  $sfull)--}}
{{--            @foreach($sfull as  $full)--}}
{{--                <tr>--}}
{{--                <td>преподаватель {{$full['teacher']}}</td>--}}
{{--                <td>дата {{$full['timestart']}}</td>--}}
{{--                </tr>--}}
{{--        @endforeach--}}
{{--        @endforeach--}}
