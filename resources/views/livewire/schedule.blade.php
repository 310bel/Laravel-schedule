<div>
    <h6>{{$name}}!</h6>
    <select wire:model="departcheck">

        <option>Выберите факультет</option>

        @foreach ($departmentname as $key=> $item)

            <option value={{$key}}>{{$item}}</option>

        @endforeach

    </select>

<? echo gettype($departcheck);
    print_r($departcheck);
    ?>

</div>
