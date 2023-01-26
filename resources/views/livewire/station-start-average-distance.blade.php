<span wire:init="init">
    @if ($loadData)
        <h6>{{$journeyStarted}} (m)</h6>
    @else
    <span id="AverageStarted">0</span>
    @endif
</span>