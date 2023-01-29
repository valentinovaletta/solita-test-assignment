<div wire:init="init">
    @if ($loadData)
        <div id="JourneyCount" wire:ignore>
            <h6 class="mb-0">{{$JournesStartedSum}}</h6>
        </div>
    @else
    <h6 class="mb-0"><span id="JournesStartedSum">0</span></h6>
    @endif
</div>