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

<center><h4>{{ $check }}</h4></center>

    <table class="table table-bordered table-striped">
        @for($i = 0; $i < count($full_teachidcheck); $i++)
            <tr>
                <td>{{ $full_teachidcheck[$i]['date'] }} {{ $full_teachidcheck[$i]['weekday'] }}
                    @if ($full_teachidcheck[$i]['online'] === '1')занятия онлайн
                    @elseif ($full_teachidcheck[$i]['online'] === '0')
                        ауд.{{ $full_teachidcheck[$i]['room'] }} {{ $full_teachidcheck[$i]['area'] }}@endif
                <td>{{ $full_teachidcheck[$i]['pairid'] }} пара
                <td>{{ $full_teachidcheck[$i]['timestart'] }}-{{ $full_teachidcheck[$i]['timeend'] }}
                <td>{{ $full_teachidcheck[$i]['edworkkind'] }}
                <td>@if ($full_teachidcheck[$i]['subgroup'] === '1'){{ $full_teachidcheck[$i]['subgroup'] }}
                    подгруппа @endif @if ( $full_teachidcheck[$i]['subgroup'] === '2'){{ $full_teachidcheck[$i]['subgroup'] }}
                    подгруппа @endif{{ $full_teachidcheck[$i]['dis'] }}
                <td>гр. {{ $full_teachidcheck[$i]['groups'] }}
        @endfor
        <tr>
    </table>
</div>
<?php
//echo ($this->full_teachidcheck[0]['weekday']);
// print_r($full_teachidcheck);

?>
{{--@error('title')--}}
{{--<div class="alert alert-danger">{{ $message }}</div>--}}
{{--@enderror--}}

{{--        @foreach($full_teachidcheck as  $sfull)--}}
{{--            @foreach($sfull as  $full)--}}
{{--                <tr>--}}
{{--                <td>преподаватель {{$full['teacher']}}</td>--}}
{{--                <td>дата {{$full['timestart']}}</td>--}}
{{--                </tr>--}}
{{--        @endforeach--}}
{{--        @endforeach--}}
