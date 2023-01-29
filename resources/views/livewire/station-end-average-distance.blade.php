<span wire:init="init">
    @if ($loadData)
        <h6>{{$journeyEnded}} (m)</h6>
    @else
    <span id="AverageEnded">0</span>
    @endif
</span>