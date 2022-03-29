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
    <pre>
Группа>{{$groupscheck}}< Тип переменной {{gettype($groupscheck)}}
Форма обуч>{{$formcheck}}<
Факультет>{{$departcheck}}< Тип переменной {{gettype($departcheck)}}
{{$data}}
        @foreach($group as $key=> $item)
<tr>
<td> {{$key}} {{$item}}</td>
</tr>
        @endforeach

    <?
    //var_dump($_POST);
    //вот  {{implode(',',$groupscheck)}} тут
    //print_r($data);
    ?>

</div>
