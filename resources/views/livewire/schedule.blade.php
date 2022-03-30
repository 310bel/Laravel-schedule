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
        {{$testhuk}}
Группа>{{$groupscheck}}< Тип переменной {{gettype($groupscheck)}}
Форма обуч>{{$formcheck}}<
Факультет>{{$departcheck}}< Тип переменной {{gettype($departcheck)}}



        @foreach($teacher as $key=> $teachers)
<tr>
    <td>преподаватель</td>
<td>{{$key}}{{$item}}</td>
</tr>
        @endforeach

        @foreach($date as $key=> $dates)
            <tr>
    <td>дата</td>
<td>{{$key}}</td>
</tr>
    @endforeach

    <?
    //var_dump($_POST);
    //вот  {{implode(',',$groupscheck)}} тут
    //print_r($data);
    ?>

</div>
