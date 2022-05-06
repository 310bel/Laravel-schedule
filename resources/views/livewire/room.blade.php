<div>
    <div class="container">
        <select wire:model="komplexcheck" class="form-select form-select-sm min-width"
                aria-label=".form-select-sm example" style="margin-bottom: 5px;width: auto">
            <option>Выберите комплекс</option>

            @php
                $i = ''
            @endphp
            @foreach ($komplex as $key=> $item)

                <option {{$i}} value={{$key}}>{{$item}}</option>
            @endforeach

        </select>

        <select wire:model="corpuscheck" class="form-select form-select-sm min-width"
                aria-label=".form-select-sm example" style="margin-bottom: 5px;width: auto">
            <option>Выберите корпус</option>

            @php
                $i = ''
            @endphp
            @foreach ($corpus as $key=> $item)

                <option {{$i}} value={{$key}}>{{$item}}</option>
            @endforeach

        </select>

        <select wire:model="roomcheck" class="form-select form-select-sm min-width"
                aria-label=".form-select-sm example" style="margin-bottom: 5px;width: auto;">

            <option>Выберите аудиторию</option>

            @foreach ($room as $key=> $item)
                <option value={{$key}}>{{$item}}</option>
            @endforeach

        </select>

    </div>


    <div class="container">
            <div class="row">
                <div class="col-2">
                    <input wire:model="groupsearch" class="form-control form-control-sm" type="text"
                           placeholder="Введите № аудитории" aria-label=".form-control-sm example "
                           style="margin-bottom: 5px;width: 200px">
                </div>
                <div class="col">
                    <button wire:click="groupsearchclick" class="btn btn-outline-secondary btn-sm">Поиск</button>
                </div>
            </div>
        </div>

    <pre>
        {{ $check }}
</pre>

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
// print_r($full_teachidcheck);
?>

