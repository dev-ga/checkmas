@php
use App\Models\Qr;
$qrs = Qr::where('asignado', 0)->get();
@endphp
<x-native-select wire:model="qrConden" class="w-24">
    <option value="">...</option>
        @foreach($qrs as $item)
            <option value="{{ $item->codigo }}">{{ $item->codigo }}</option>
        @endforeach
</x-native-select>