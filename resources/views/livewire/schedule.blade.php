<div>

    <select wire:model="departcheck">

        <option>Выберите факультет</option>

        @foreach ($departmentname as $key=> $item)
            <option value={{$key}}>{{$item}}</option>
        @endforeach

    </select>

    <select wire:model="formcheck" >

        <option>Форма обучения</option>

        @foreach ($form as $key=> $item)
            <option value={{$key}}>{{$item}}</option>
        @endforeach

    </select>

    <select wire:model="groupscheck" >

        <option>Выберите группу</option>

        @foreach ($group as $key=> $item)
            <option value={{$key}}>{{$item}}</option>
        @endforeach

    </select>
    <pre>
    это из контроллера группа>{{$groupscheck}} <
    это из контроллера форма обуч>{{$formcheck}} <
    это из контроллера факультет>{{$departcheck}} <
<? echo " ".gettype($departcheck)." факультет ";
    print_r($departcheck);
    echo " ".gettype($groupscheck)." группа ";
    print_r($groupscheck);
    //var_dump($_POST);
    //вот  {{implode(',',$groupscheck)}} тут
    //print_r($data3);
    ?>

</div>
