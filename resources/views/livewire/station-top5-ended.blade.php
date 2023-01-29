<span wire:init="init">
    @if ($loadData)

        @foreach($top5ended as $i=>$station)
        <p>{{++$i}}) <a href="/station/{{$station->departure_station_id}}">{{$station->departure_station_name}}</a> ({{$station->count}})</p>
        @endforeach

    @else
    <span><h6>~</h6></span>
    @endif
</span>