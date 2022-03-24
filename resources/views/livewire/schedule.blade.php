
<div>
    <h2>{{implode(',',$departmentname)}}, {{$name}}!</h2>
    <input wire:model="name" type="text">
    <input wire:model="ok" type="checkbox">
    <select wire:model="departcheck">
        <option>Выберите факультет</option>

        <? foreach ($departmentname as $key=> $item) {
            echo '<option value=' . $key . '>'.$item.'</option>';

            //    echo '<option value=' . $key . '>'. $key ." ". $item.'</option>';
            //    $aa = $_POST["facultys"];
        }
        print_r($item);
        //echo($departcheck);
        ?>


    </select>

<? echo gettype($departcheck);
    print_r($departcheck);
    ?>
    @if ($ok)
        <h2>Schow is true!</h2>
    @endif
</div>
