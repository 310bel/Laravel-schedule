
<div>
   <h2>{{$greeting}}, {{$name}}!</h2>
    <input wire:model="name" type="text">
    <input wire:model="ok" type="checkbox">
    <select wire:model="greeting">
        <option>Hello</option>
        <option>Goodbye</option>
        <option>Adios</option>
    </select>

    @if ($ok)
        <h2>Schow is true!</h2>
    @endif
</div>
