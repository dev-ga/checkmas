@php
use App\Models\Ot;
$ots = Ot::where('statusOts', '3')->where('tecRes_email', Auth::user()->email)->get();
@endphp
<x-native-select wire:model="nro_ot" class="focus:ring-check-blue focus:border-check-blue">
    <option value="">...</option>
        @foreach($ots as $item)
            <option value="{{ $item->otUid }}">{{ $item->otUid }}</option>
        @endforeach
</x-native-select>