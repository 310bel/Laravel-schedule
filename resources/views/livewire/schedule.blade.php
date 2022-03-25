<div>

    <select wire:model="departcheck">

        <option>Выберите факультет</option>

        @foreach ($departmentname as $key=> $item)
            <option value={{$key}}>{{$item}}</option>
        @endforeach

    </select>

    <select wire:model="groupscheck">

        <option>Выберите группу</option>

        @foreach ($group as $key=> $item)
            <option value={{$key}}>{{$item}}</option>
        @endforeach

    </select>

<? echo " ".gettype($departcheck)." факультет ";
    print_r($departcheck);
    echo " ".gettype($groupscheck)." группа ";
    print_r($groupscheck);
    var_dump($_POST);

    ?>

</div>
