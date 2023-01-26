<div wire:init="init">
    @if ($loadData)
        <div id="JourneyCount" wire:ignore>
            <h6 class="mb-0">{{$JournesEndedSum}}</h6>
        </div>
    @else
    <h6 class="mb-0"><span id="JournesEndedSum">0</span></h6>
    @endif
</div>