@php
use App\Models\Agencia;
$agencias = Agencia::all();
@endphp
<x-native-select wire:model="agencia">
    <option value="">...</option>
        @foreach($agencias as $item)
            <option value="{{ $item->codigo }}">{{ $item->descripcion }}</option>
        @endforeach
</x-native-select>