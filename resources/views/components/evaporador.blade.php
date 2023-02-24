@php
use App\Models\Qr;
$qrs = Qr::all();
@endphp
<x-native-select wire:model="qrEvaporador" class="w-24">
    <option value="">...</option>
        @foreach($qrs as $item)
            <option value="{{ $item->codigo }}">{{ $item->codigo }}</option>
        @endforeach
</x-native-select>