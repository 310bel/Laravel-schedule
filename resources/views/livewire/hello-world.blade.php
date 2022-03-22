    @php
use App\Http\Livewire;
    @endphp
<div>
   <h2>Привет, {{$name}}!</h2>
    <input wire:model="name" type="text">
    <input wire:model="ok" type="checkbox">
</div>
