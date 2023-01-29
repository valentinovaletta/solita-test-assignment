<div wire:init="init">
    @if ($loadData)
        <div id="JourneyCount" wire:ignore>
            <h6 class="mb-0">{{$JourneyCount}}</h6>
        </div>
    @else
    <h6 class="mb-0"><span id="time">0</span></h6>
    @endif
</div>

<script>
window.onload = function () {

    const elem = document.getElementById('time');
    var intervalId = null;
    let i = 0;

    intervalId = setInterval(myCallback, 100);
    function myCallback()
    {
        elem.innerHTML = i+=Math.round(Math.random()*10000, 1);

        if(i >= 1000000) {
            clearInterval(intervalId);
        }

    }


};
</script>
