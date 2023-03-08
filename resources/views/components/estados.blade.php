@php
use App\Models\Estado;
$estados = Estado::all();
@endphp
<x-native-select wire:model="agencia">
    <option value="">...</option>
        @foreach($estados as $item)
            <option value="{{ $item->codigo }}">{{ $item->descripcion }}</option>
        @endforeach
</x-native-select>