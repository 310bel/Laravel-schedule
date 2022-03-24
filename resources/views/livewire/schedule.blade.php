<div>
    <h6>{{implode(',',$departmentname)}}, {{$name}}!</h6>
    <input wire:model="name" type="text">
    <input wire:model="ok" type="checkbox">
    <select wire:model="departcheck">

        <option>Выберите факультет</option>

        @foreach ($departmentname as $item)
            @for ($i = 0; $i < count($departmentname); $i++)




            <option value="{{$iddepartmentname[$i]}}" >{{$item}}</option>
                @endfor
        @endforeach





    </select>

<? echo gettype($departcheck);
    print_r($departcheck);
    //    echo '<option value=' . $key . '>'. $key ." ". $item.'</option>';
    //    $aa = $_POST["facultys"];
    //print_r($item);
    //echo($departcheck);

    ?>
    @if ($ok)
        <h2>Schow is true!</h2>
    @endif
</div>
